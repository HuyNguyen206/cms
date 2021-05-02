@extends('layouts.app')
@section('content')
    <div>
        <div class="card card-default">
            <div class="card-header">
                Update post
            </div>
            <div class="card-body">
                <form action="{{route('posts.update', $post->id)}}" method='post' enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="title" value="{{old('title', $post->title)}}" class="form-control @error('title') is-invalid @enderror">
                        @error('title')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <input type="text" name="description" value="{{old('description', $post->description)}}" class="form-control @error('description') is-invalid @enderror">
                        @error('description')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Content</label>
                        <input id="content" type="hidden" name="content" value="{{old('content', $post->content)}}">
                        <trix-editor class=" @error('content') is-invalid trix-content @enderror" input="content"></trix-editor>
                        {{--                        <textarea name="content" id=""  class="form-control @error('content') is-invalid @enderror" cols="30" rows="10"></textarea>--}}
                        @error('content')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Category</label>
                        <select class="form-control" name="category_id" id="">
                            @foreach($categories as $cat)
                                <option value="{{$cat->id}}" @if($cat->id == $post->category_id) selected @endif>{{$cat->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @if ($tags->count())
                        <div class="form-group">
                            <label for="">Tag</label>
                            <select class="form-control tag-selector" name="tag_id[]" id="" multiple>
                                @foreach($tags as $tag)
                                    <option @if ($post->tags->contains('id', $tag->id))
                                        selected
                                    @endif value="{{$tag->id}}">{{$tag->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="">Published at</label>
                        <input value="{{old('published_at', $post->published_at)}}" type="text" name="published_at" id="published_at" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        <input  type="file" name="image" class="form-control">
                    </div>
                        @if ($post->image_path)
                        <img src="{{asset('storage/'.$post->image_path)}}" style="width: 140px; object-fit: cover" alt="">
                        @endif
                    <button class="btn btn-success d-block">Update</button>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(function(){
            $("#published_at").flatpickr({
                enableTime:true,
                enableSeconds:true
            });
            $('.tag-selector').select2();
        })
    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
    .trix-content{
        border-color: #e3342f;
        padding-right: calc(1.6em + 0.75rem);
        background-image: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='none' stroke='%23e3342f' viewBox='0 0 12 12'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23e3342f' stroke='none'/%3e%3c/svg%3e);
        background-repeat: no-repeat;
        background-position: right calc(0.4em + 0.1875rem) center;
        background-size: calc(0.8em + 0.375rem) calc(0.8em + 0.375rem)
    }
    </style>
@endsection
