<?php

use App\Models\Category;

if (!function_exists('menuHelper')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function menuHelper()
    {
        return Category::with('subcategory')->whereNull('parent_id')->get();
    }
}
