<div class="col-md-4 col-xl-3">
    <div class="sidebar px-4 py-md-0">
        <h6 class="sidebar-title">Search</h6>
        <form class="input-group" action="" method="GET">
            <input type="text" value="{{request()->query('search')}}" class="form-control" name="search" placeholder="Search">
            <div class="input-group-addon">
                <button class="input-group-text"><i class="ti-search"></i></button>
            </div>
        </form>

        <hr>

        <h6 class="sidebar-title">Categories</h6>
        <div class="row link-color-default fs-14 lh-24">
            @foreach($categories as $cat)
                <div class="col-6"><a class="@if(isset($category) && $cat->id == $category->id) category-active @endif" href="{{route('categories.posts', $cat->id)}}">{{$cat->name}}</a></div>
            @endforeach
        </div>

        <hr>

        <h6 class="sidebar-title">Tags</h6>
        <div class="gap-multiline-items-1">
            @foreach($tags as $t)
                <a class="badge badge-secondary @if(isset($tag) && $t->id == $tag->id) tag-active @endif"  href="{{route('tags.posts', $t->id)}}">{{$t->name}}</a>
            @endforeach
        </div>

        <hr>

        <h6 class="sidebar-title">About</h6>
        <p class="small-3">TheSaaS is a responsive, professional, and multipurpose SaaS, Software,
            Startup and WebApp landing template powered by Bootstrap 4. TheSaaS is a powerful and super
            flexible tool for any kind of landing pages.</p>


    </div>
</div>

@section('css')
    <style>
        .tag-active{
            color: #757575;
            background-color: #cbd2db;
        }
        .category-active{
            color: #50a1ff !important;
            text-decoration: none;
            outline: none;
        }
    </style>
@endsection
