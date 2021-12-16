<?php

namespace App\Http\Controllers;

use App\Models\Bike;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\FuncCall;

class UserProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile()
    {
        return view('frontend.profile.index');
    }

    public function editProfile()
    {
        return view('frontend.profile.edit');
    }

    public function updateProfile(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'avatar' => 'nullable'
        ]);

        // Get login user
        $user = Auth::user();

        // Update user info
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'occupation' => $request->occupation,
            'phone' => $request->phone,
            'dateOfBirth' => $request->dateOfBirth,
            'gender' => $request->gender,
        ]);

        // Image upload
        if ($request->hasFile('avatar')) {
            $user->addMedia($request->avatar)->toMediaCollection('avatar');
        }
        notify()->success('Profile updated', 'Success');
        return back();
    }

    public function editSecurity()
    {
        return view('frontend.profile.password');
    }

    public function passwordUpdate(Request $request)
    {
        $this->validate($request, [
            'current_password' => 'required',
            'password' => 'required|confirmed'
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->current_password, $hashedPassword)) {
            if (!Hash::check($request->password, $hashedPassword)) {
                Auth::user()->update([
                    'password' => Hash::make($request->password)
                ]);
                Auth::logout();
                return redirect()->route('login');
            } else {
                notify()->warning('New password cannot be the same as old password.', 'Warning');
            }
        } else {
            notify()->error('Current password not match.', 'Error');
        }
        return redirect()->back();
    }

    public function product()
    {
        $userId = Auth::id();
        $bikes = Bike::where('status', true)->where('user_id', $userId)->get();
        return view('frontend.profile.product', compact('bikes'));
    }

    public function productCreate()
    {
        $brands = Brand::select('id', 'name')->get();
        $parentCategories = Category::select('id', 'name')
                    ->with('subcategory')
                    ->whereNull('parent_id')
                    ->get();
        return view('frontend.profile.product.create', compact('brands', 'parentCategories'));
    }

    public function productStore(Request $request)
    {
        $bike = Bike::create([
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'title' => $request->title,
            'model' => $request->model,
            'price_per_day' => $request->price_per_day,
            'discount_price' => $request->discount_price,
            'description' => $request->description,
            'status' => $request->filled('status'),
        ]);

        // upload images
        if ($request->hasFile('bike_image')) {
            $fileName = rand() . time() . '.' . $request->file('bike_image')->extension();
            $bike->addMedia($request->file('bike_image'))
                ->usingFileName($fileName)
                ->toMediaCollection('bike_image');
        }
        notify()->success('Product created successfully.', 'Added');
        return back();
    }

    public function productDestroy($slug)
    {
        Bike::where('slug', $slug)->where('user_id', Auth::id())->delete();
        notify()->success('Product delete successfully.', 'Deleted');
        return back();
    }

    public function available($slug)
    {
        Bike::where('slug', $slug)->update([
            'booked_status' => true
        ]);

        return back();
    }

    public function booked($slug)
    {
        Bike::where('slug', $slug)->update([
            'booked_status' => false
        ]);

        return back();
    }
}
