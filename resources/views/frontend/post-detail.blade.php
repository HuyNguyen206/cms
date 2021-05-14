@extends('frontend.layout.app-frontend')
@section('title')
    {{$post->title}}
@endsection
@section('content')
    <div class="stunning-header stunning-header-bg-lightviolet">
        <div class="stunning-header-content">
            <h1 class="stunning-header-title">{{$post->title}}</h1>
        </div>
    </div>
    <div class="container">
        <div class="row medium-padding120">
            <main class="main">
                <div class="col-lg-10 col-lg-offset-1">
                    <article class="hentry post post-standard-details">

                        <div class="post-thumb">
                            @if($post->image)
                                <img src="{{$post->image}}" alt="seo">
                            @endif
                        </div>

                        <div class="post__content">


                            <div class="post-additional-info">

                                <div class="post__author author vcard">
                                    Posted by

                                    <div class="post__author-name fn">
                                        <a href="#" class="post__author-link">{{$post->user->name}}</a>
                                    </div>

                                </div>

                                <span class="post__date">

                                <i class="seoicon-clock"></i>

                                <time class="published" datetime="2016-03-20 12:00:00">
                                   {{$post->created_at->toFormattedDateString()}}
                                </time>

                            </span>

                                <span class="category">
                                <i class="seoicon-tags"></i>
                                        <a href="{{route('categories.posts', $post->category->id)}}">{{$post->category->name }} </a>
                            </span>

                            </div>

                            <div class="post__content-info">

                                <p class="post__subtitle">{{$post->description}}
                                </p>

                                <div>
                                    {!! $post->content !!}
                                </div>

                                <div class="widget w-tags">
                                    <div class="tags-wrap">
                                        <a href="{{route('categories.posts', $post->category->id)}}"
                                           class="w-tags-item">{{$post->category->name}}</a>
                                        {{--                                        @foreach($post->tags as $tag)--}}
                                        {{--                                        <a href="{{route('tags.posts', $tag->id)}}" class="w-tags-item">{{$tag->name}}</a>--}}
                                        {{--                                        @endforeach--}}
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="socials">Share:
                            <a href="#" class="social__item">
                                <i class="seoicon-social-facebook"></i>
                            </a>
                            <a href="#" class="social__item">
                                <i class="seoicon-social-twitter"></i>
                            </a>
                            <a href="#" class="social__item">
                                <i class="seoicon-social-linkedin"></i>
                            </a>
                            <a href="#" class="social__item">
                                <i class="seoicon-social-google-plus"></i>
                            </a>
                            <a href="#" class="social__item">
                                <i class="seoicon-social-pinterest"></i>
                            </a>
                        </div>

                    </article>

                    <div class="blog-details-author">

                        <div class="blog-details-author-thumb">
                            @if(optional($post->user->profile)->avatar)
                                <img src="{{asset('storage/'.$post->user->profile->avatar)}}" style="width: 100px; height: 100px; border-radius: 50%" alt="Author">
                            @else
                                <img src="{{Gravatar::src($post->user->email)}}" alt="">
                            @endif
                        </div>

                        <div class="blog-details-author-content">
                            <div class="author-info">
                                <h5 class="author-name">{{$post->user->name}}</h5>
                                <p class="author-info">{{$post->user->email}}</p>
                            </div>
                            <div class="text">{!! optional($post->user->profile)->about !!}
                            </div>
                            <div class="socials">

                                <a href="#" class="social__item">
                                    <img src="{{asset('app/svg/circle-facebook.svg')}}" alt="facebook">
                                </a>

                                <a href="#" class="social__item">
                                    <img src="{{asset('app/svg/twitter.svg')}}" alt="twitter">
                                </a>

                                <a href="#" class="social__item">
                                    <img src="{{asset('app/svg/google.svg')}}" alt="google">
                                </a>

                                <a href="#" class="social__item">
                                    <img src="{{asset('app/svg/youtube.svg')}}" alt="youtube">
                                </a>

                            </div>
                        </div>
                    </div>

                    <div class="pagination-arrow">
                        @if($previousPost = $post->previousPost())
                        <a href="{{route('posts.detail', $previousPost->getPostParam())}}" class="btn-prev-wrap">
                            <svg class="btn-prev">
                                <use xlink:href="#arrow-left"></use>
                            </svg>
                            <div class="btn-content">
                                <div class="btn-content-title">Previous Post</div>
                                <p class="btn-content-subtitle">{{$previousPost->title}}</p>
                            </div>
                        </a>
                        @endif
                        @if($nextPost = $post->nextPost())
                        <a href="{{route('posts.detail', $nextPost->getPostParam())}}" class="btn-next-wrap">
                            <div class="btn-content">
                                <div class="btn-content-title">Next Post</div>
                                <p class="btn-content-subtitle">{{$nextPost->title}}</p>
                            </div>
                            <svg class="btn-next">
                                <use xlink:href="#arrow-right"></use>
                            </svg>
                        </a>
                        @endif
                    </div>

                    <div class="comments">

                        <div class="heading text-center">
                            <h4 class="h1 heading-title">Comments</h4>
                            <div class="heading-line">
                                <span class="short-line"></span>
                                <span class="long-line"></span>
                            </div>
                            <div id="disqus_thread"></div>
                        </div>
                    </div>

                    <div class="row">

                    </div>


                </div>

                <!-- End Post Details -->

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
                                @foreach($post->tags as $tag)
                                    <a href="{{route('tags.posts', $tag->id)}}" class="w-tags-item">{{$tag->name }}</a>
                                @endforeach
                            </div>
                        </div>
                    </aside>
                </div>

                <!-- End Sidebar-->

            </main>
        </div>
    </div>
@endsection

@section('script')
{{--    <script src="{{asset('js/embed.js')}}"></script>--}}
    <script>

        /**
         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */

        var disqus_config = function () {
            this.page.url = "{{route('posts.detail', $post->getPostParam())}}";  // Replace PAGE_URL with your page's canonical URL variable
            this.page.identifier = "{{$post->getPostParam()}}"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };
        (function() { // DON'T EDIT BELOW THIS LINE
            var d = document, s = d.createElement('script');
            s.src = 'https://http-cms-com.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();
    </script>

    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by
            Disqus.</a></noscript>
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-608e56495ef6a28a"></script>

@endsection
