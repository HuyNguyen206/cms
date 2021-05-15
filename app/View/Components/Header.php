<?php

namespace App\View\Components;

use App\Category;
use App\Setting;
use Illuminate\View\Component;

class Header extends Component
{
    public $categories;
    public $siteName;
    public $categoryId;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($categoryId)
    {
        //
        $this->categories = Category::latest()->take(4)->get();
        $this->siteName = Setting::firstOrFail()->site_name;
        $this->categoryId = $categoryId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.header');
    }
}
