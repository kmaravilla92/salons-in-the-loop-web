<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

class GlobalComposer
{
    public function __construct()
    {
        
    }
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('laravel_user', session('sitl.user'));
    }
}