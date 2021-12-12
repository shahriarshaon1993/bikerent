<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MenuBuilderController extends Controller
{
    /**
     * Menu builder view all
     *
     * @param  mixed $id
     * @return void
     */
    public function index($id)
    {
        Gate::authorize('app.menus.index');
        $menu = Menu::findOrFail($id);
        return view('backend.menus.builder', compact('menu'));
    }

    /**
     * Menu item order
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function itemOrder(Request $request, $id)
    {
        Gate::authorize('app.menus.index');
        $menuItemOrder = json_decode($request->get('order'));
        $this->orderMenu($menuItemOrder, null);
    }

    /**
     * Store menu item by order
     *
     * @param  mixed $menuItems
     * @param  mixed $parantId
     * @return void
     */
    private function orderMenu(array $menuItems, $parantId)
    {
        foreach ($menuItems as $index => $item) {
            $menuItem = MenuItem::findOrFail($item->id);
            $menuItem->update([
                'order' => $index + 1,
                'parent_id' => $parantId
            ]);

            if (isset($item->children)) {
                $this->orderMenu($item->children, $menuItem->id);
            }
        }
    }

    /**
     * Menu item create
     *
     * @param  mixed $id
     * @return void
     */
    public function itemCreate($id)
    {
        Gate::authorize('app.menus.create');
        $menu = Menu::findOrFail($id);
        return view('backend.menus.item.form', compact('menu'));
    }

    /**
     * Menu item store
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function itemStore(Request $request, $id)
    {
        Gate::authorize('app.menus.create');
        $this->validate($request, [
            'type' => 'required|string',
            'divider_title' => 'nullable|string',
            'title' => 'nullable|string',
            'url' => 'nullable|string',
            'target' => 'nullable|string',
            'icon_class' => 'nullable|string',
        ]);

        $menu = Menu::findOrFail($id);

        $menu->menuItems()->create([
            'type' => $request->get('type'),
            'divider_title' => $request->get('divider_title'),
            'title' => $request->get('title'),
            'url' => $request->get('url'),
            'target' => $request->get('target'),
            'icon_class' => $request->get('icon_class'),
        ]);

        notify()->success('Menu item added', 'Added');
        return redirect()->route('app.menus.builder', $menu->id);
    }

    /**
     * Menu item edit
     *
     * @param  mixed $id
     * @return void
     */
    public function itemEdit($id, $itemId)
    {
        Gate::authorize('app.menus.edit');
        $menu = Menu::findOrFail($id);
        $menuItem = MenuItem::where('menu_id', $menu->id)->findOrFail($itemId);
        return view('backend.menus.item.form', compact('menu', 'menuItem'));
    }

    /**
     * Menu item update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function itemUpdate(Request $request, $id, $itemId)
    {
        Gate::authorize('app.menus.create');
        $this->validate($request, [
            'type' => 'required|string',
            'divider_title' => 'nullable|string',
            'title' => 'nullable|string',
            'url' => 'nullable|string',
            'target' => 'nullable|string',
            'icon_class' => 'nullable|string',
        ]);

        $menu = Menu::findOrFail($id);
        $menuItem = MenuItem::where('menu_id', $menu->id)->findOrFail($itemId)->update([
            'type' => $request->get('type'),
            'divider_title' => $request->get('divider_title'),
            'title' => $request->get('title'),
            'url' => $request->get('url'),
            'target' => $request->get('target'),
            'icon_class' => $request->get('icon_class'),
        ]);

        notify()->success('Menu item updated', 'Updated');
        return back();
    }

    /**
     * Menu item delete method
     *
     * @param  mixed $id
     * @param  mixed $itemId
     * @return void
     */
    public function itemDestroy($id, $itemId)
    {
        Gate::authorize('app.menus.destroy');
        Menu::findOrFail($id)->menuItems()->findOrFail($itemId)->delete();
        notify()->success('Menu item deleted', 'Deleted');
        return back();
    }
}
