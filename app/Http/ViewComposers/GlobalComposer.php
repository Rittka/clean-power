<?php

namespace App\Http\ViewComposers;

use LaravelLocalization;
use Illuminate\View\View;

class GlobalComposer
{
    public function compose(View $view){
        $dir = LaravelLocalization::getCurrentLocaleDirection();
        $lang = LaravelLocalization::getCurrentLocale();
        $left = ($dir=='ltr')? 'left':'right';
        $right = ($dir=='ltr')? 'right':'left';
        // $ar = trans('main.ar');
        // $en = trans('main.en');

        $view->with(compact('lang', 'dir', 'left', 'right'));
    }
}

?>