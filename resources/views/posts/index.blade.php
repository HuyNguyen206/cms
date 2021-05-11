@extends('layouts.app')
@section('content')
    <div>
        <div>
            <a href="{{route('posts.create')}}" class="btn btn-primary mb-2 d-inline-block float-right">Create
                posts</a>
        </div>

        <div class="card card-default" style="clear: both;">
            <div class="card-header">
                Post
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>
                            Title
                        </th>
                        <th>
                            Description
                        </th>
                        <th>
                            Category
                        </th>
                        <th>
                            Image
                        </th>
                        <th>
                            Published at
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($posts as $post)
                        <tr>
                            <td>
                                {{$post->title}}
                            </td>
                            <td>
                                {{$post->description}}
                            </td>
                            <td>
                                <a href='{{route('categories.edit', $post->category->id)}}'>
                                    {{$post->category->name}}
                                </a>

                            </td>
                            <td>
                                @if($post->image_path)
                                    <img class="w-100" src="{{$post->image}}" alt="">
                                    @endif
                            </td>
                            <td>
                                {{$post->published_at}}
                            </td>
                            <td>
                                <div class="btn btn-group">
                                    <a href="{{route('posts.edit', $post->id)}}" class="btn btn-info text-white">Edit</a>
                                    <a data-post-id="{{$post->id}}" class="btn btn-danger delete-post">Delete</a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No data</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="post-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="" method="post" id="post-delete">
            @csrf
            @method('delete')
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Post</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" type="button" class="btn btn-primary">Go ahead</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script>
        $(function () {
            $('.delete-post').click(function () {
                let post_id = $(this).data('post-id')
                let form = document.querySelector('#post-delete')
                form.action = "{{url('/posts/')}}" + "/" + post_id
                $('#post-modal').modal('show')
                console.log(post_id)
            })

        })

        // $(document).ready(function(){
        //
        // })
        // function deleteCategory(event, id){
        //     console.log(id)
        //     $('#post-modal').modal('show')
        // }
    </script>
@endsection
