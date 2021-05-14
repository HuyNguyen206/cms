<div class="stunning-header stunning-header-bg-lightviolet">
    <div class="stunning-header-content">
        <h1 class="stunning-header-title">{{$title}}</h1>
    </div>
</div>
<div class="container">
    <div class="row medium-padding120">
        <main class="main category-page">

            <div class="row">
                <div class="case-item-wrap">
                    @foreach($posts as $post)
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="case-item">
                                @if($post->image)
                                    <div class="case-item__thumb">
                                        <img src="{{$post->image}}" alt="our case">
                                    </div>
                                @endif
                                <h6 class="case-item__title"><a href="{{route('posts.detail', $post->getPostParam())}}">{{$post->title}}</a></h6>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    {!! $posts->appends(request()->all())->links() !!}
                </div>
            </div>

            <!-- End Post Details -->
            <br>
            <br>
            <br>
            <!-- Sidebar-->

            <div class="col-lg-12">
                <aside aria-label="sidebar" class="sidebar sidebar-right">
                    <div class="widget w-tags">
                        <div class="heading text-center">
                            <h4 class="heading-title">ALL BLOG TAGS</h4>
                            <div class="heading-line">
                                <span class="short-line"></span>
                                <span class="long-line"></span>
                            </div>
                        </div>

                        <div class="tags-wrap">
                            @foreach($tags as $tag)
                                <a href={{route('tags.posts', $tag->id)}} class="w-tags-item">{{$tag->name}}</a>
                            @endforeach
                        </div>
                    </div>
                </aside>
            </div>

            <!-- End Sidebar-->

        </main>
    </div>
</div>
