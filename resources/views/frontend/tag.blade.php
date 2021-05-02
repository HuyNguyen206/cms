@extends('frontend.layout.app-frontend')
@section('header')
    <header class="header text-center text-white"
            style="background-image: linear-gradient(-225deg, #5D9FFF 0%, #B8DCFF 48%, #6BBBFF 100%);">
        <div class="container">

            <div class="row">
                <div class="col-md-8 mx-auto">

                    <h1>Latest Blog Posts</h1>
                    <p class="lead-2 opacity-90 mt-6">Read and get updated on how we progress</p>

                </div>
            </div>

        </div>
    </header><!-- /.header -->
@endsection
@section('title')
    {{$tag->name}}
@endsection
@section('content')
    <div class="section bg-gray">
        <div class="container">
            <div class="row">


                <div class="col-md-8 col-xl-9">
                    <div class="row gap-y">
                        @forelse ($posts as $post)
                            <div class="col-md-6">
                                <div class="card border hover-shadow-6 mb-6 d-block">
                                    @if ($post->image_path)
                                        <a href="{{route('posts.detail', $post->getPostParam())}}"><img class="card-img-top" src="{{asset('storage/'.$post->image_path)}}"
                                                         alt="Card image cap"></a>
                                    @endif

                                    <div class="p-6 text-center">
                                        <p><a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="#">{{$post->category->name}}</a>
                                        </p>
                                        <h5 class="mb-0"><a class="text-dark" href="{{route('posts.detail', $post->getPostParam())}}">{{$post->title}}</a></h5>
                                    </div>
                                </div>
                            </div>
                        @empty
                            @if($search = request()->query('search'))
                                <p class="text-center">
                                    No result found for query: <strong>{{$search}}</strong>
                                </p>
                            @else
                                <p class="text-center">
                                    No post
                                </p>
                            @endif
                        @endforelse


                    </div>
                {!! $posts->links() !!}

{{--                    <nav class="flexbox mt-30">--}}
{{--                        <a class="btn btn-white disabled"><i class="ti-arrow-left fs-9 mr-4"></i> Newer</a>--}}
{{--                        <a class="btn btn-white" href="#">Older <i class="ti-arrow-right fs-9 ml-4"></i></a>--}}
{{--                    </nav>--}}
                </div>

                @include('frontend.components.right-sidebar')

            </div>
        </div>
    </div>
@endsection

