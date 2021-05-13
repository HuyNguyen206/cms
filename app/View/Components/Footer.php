<?php

namespace App\View\Components;

use App\Setting;
use Illuminate\View\Component;

class Footer extends Component
{
    public $setting;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
        $this->setting = Setting::firstOrFail();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.footer');
    }
}
