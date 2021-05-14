@extends('frontend.layout.app-frontend')
@section('title')
    {{$title}}
@endsection
@section('content')
    <div class="header-spacer"></div>

    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <article class="hentry post post-standard has-post-thumbnail sticky">
                    @if($firstPost->image)
                    <div class="post-thumb">
                        <img src="{{$firstPost->image}}" alt="seo">
                        <div class="overlay"></div>
                        <a href="{{$firstPost->image}}" class="link-image js-zoom-image">
                            <i class="seoicon-zoom"></i>
                        </a>
                        <a href="#" class="link-post">
                            <i class="seoicon-link-bold"></i>
                        </a>
                    </div>
                    @endif
                    <div class="post__content">

                        <div class="post__content-info">

                            <h2 class="post__title entry-title ">
                                <a href="{{route('posts.detail', $firstPost->getPostParam())}}">{{$firstPost->title}}</a>
                            </h2>

                            <div class="post-additional-info">

                                        <span class="post__date">

                                            <i class="seoicon-clock"></i>

                                            <time class="published" datetime="2016-04-17 12:00:00">
                                                {{$firstPost->created_at->diffForHumans()}}
                                            </time>

                                        </span>

                                <span class="category">
                                            <i class="seoicon-tags"></i>
                                            <a href="{{route('categories.posts', $firstPost->category->id)}}">{{$firstPost->category->name}}</a>
                                        </span>

                                <span class="post__comments">
                                            <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                            6
                                        </span>

                            </div>
                        </div>
                    </div>

                </article>
            </div>
            <div class="col-lg-2"></div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <article class="hentry post post-standard has-post-thumbnail sticky">
                    @if($secondPost->image)
                    <div class="post-thumb">
                        <img src="{{$secondPost->image}}" alt="seo">
                        <div class="overlay"></div>
                        <a href="{{$secondPost->image}}" class="link-image js-zoom-image">
                            <i class="seoicon-zoom"></i>
                        </a>
                        <a href="#" class="link-post">
                            <i class="seoicon-link-bold"></i>
                        </a>
                    </div>
                    @endif
                    <div class="post__content">

                        <div class="post__content-info">

                            <h2 class="post__title entry-title ">
                                <a href="{{route('posts.detail', $secondPost->getPostParam())}}">{{$secondPost->title}}</a>
                            </h2>

                            <div class="post-additional-info">

                                        <span class="post__date">

                                            <i class="seoicon-clock"></i>

                                            <time class="published" datetime="2016-04-17 12:00:00">
                                               {{$secondPost->created_at->toFormattedDateString()}}
                                            </time>

                                        </span>

                                <span class="category">
                                            <i class="seoicon-tags"></i>
                                            <a href="{{route('categories.posts', $secondPost->category->id)}}">{{$secondPost->category->name}}</a>
                                        </span>

                                <span class="post__comments">
                                            <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                            6
                                        </span>

                            </div>
                        </div>
                    </div>

                </article>
            </div>
            <div class="col-lg-6">
                <article class="hentry post post-standard has-post-thumbnail sticky">
                    @if($thirdPost->image)
                    <div class="post-thumb">
                        <img src="{{$thirdPost->image}}" alt="seo">
                        <div class="overlay"></div>
                        <a href="{{$thirdPost->image}}" class="link-image js-zoom-image">
                            <i class="seoicon-zoom"></i>
                        </a>
                        <a href="#" class="link-post">
                            <i class="seoicon-link-bold"></i>
                        </a>
                    </div>
                    @endif
                    <div class="post__content">

                        <div class="post__content-info">

                            <h2 class="post__title entry-title ">
                                <a href="{{route('posts.detail', $thirdPost->getPostParam())}}">{{$thirdPost->title}}</a>
                            </h2>

                            <div class="post-additional-info">

                                        <span class="post__date">

                                            <i class="seoicon-clock"></i>

                                            <time class="published" datetime="2016-04-17 12:00:00">
                                               {{$thirdPost->created_at->toFormattedDateString()}}
                                            </time>

                                        </span>

                                <span class="category">
                                            <i class="seoicon-tags"></i>
                                            <a href="{{route('categories.posts', $thirdPost->category->id)}}">{{$thirdPost->category->name}}</a>
                                        </span>

                                <span class="post__comments">
                                            <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                            6
                                        </span>

                            </div>
                        </div>
                    </div>

                </article>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="row medium-padding120 bg-border-color">
            <div class="container">
                <div class="col-lg-12">
                    @foreach($latestCategories as $category)
                    <div class="offers">
                        <div class="row">
                            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                                <div class="heading">
                                    <h4 class="h1 heading-title">{{$category->name}}</h4>
                                    <div class="heading-line">
                                        <span class="short-line"></span>
                                        <span class="long-line"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="case-item-wrap">
                                @foreach($category->posts()->latest()->take(3)->get() as $post)
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
                    </div>
                    <div class="padded-50"></div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

