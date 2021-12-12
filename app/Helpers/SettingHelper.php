<?php

use App\Models\Setting;

if (!function_exists('setting')) {

    /**
     * setting for setting operation
     *
     * @param  mixed $name
     * @param  mixed $default
     * @return void
     */
    function setting($name, $default = null)
    {
        return Setting::getByName($name, $default);
    }
}
