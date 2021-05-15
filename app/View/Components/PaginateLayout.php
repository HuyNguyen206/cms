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
    private $object;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($object = null, LengthAwarePaginator $posts)
    {
        //
        $this->posts = $posts;
        $this->tags = Tag::all();
        $this->object = $object;
        $search = request()->query('search');
        if ($object != null) {
            $this->title = $search ? 'Search result for:' . $search : $object->name;
        } else {
            $this->title = 'Search result for:' . $search;
        }

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
