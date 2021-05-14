<?php

namespace App\View\Components;

use App\Tag;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\Component;

class PaginateLayout extends Component
{
    /**
     * @var Post
     */
    public $posts;
    public $tags;
    public $title;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(LengthAwarePaginator $posts, $title)
    {
        //
        $this->posts = $posts;
        $this->tags = Tag::all();
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.paginate-layout');
    }
}
