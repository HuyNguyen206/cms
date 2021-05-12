@extends('layouts.app')
@section('content')
    <div>
        <div>
            <a href="{{route('users.create')}}" class="btn btn-primary mb-2 d-inline-block float-right">Create
                user</a>
        </div>

        <div class="card card-default" style="clear: both;">
            <div class="card-header">
                User
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>
                            Avatar
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>
                                @if($avatar = optional($user->profile)->avatar)
                                    <img src="{{asset('storage/'.$avatar)}}" alt="" style="border-radius: 50%; width:50px; height: 50px">
                                @else
                                    <img src="{{Gravatar::src($user->email, 50)}}" alt="" style="border-radius: 50%">
                                @endif
                            </td>
                            <td>
                                {{$user->name}}
                            </td>
                            <td>
                                {{$user->email}}
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                @if (!$user->isAdmin())
                                    <form action="{{route('users.make-admin', $user->id)}}" class="mr-2" method="post">
                                        @csrf
                                        @method('patch')
                                        <button class="btn btn-success">Make admin</button>
                                    </form>
                                @else

                                        <span class="badge badge-primary d-inline-block mr-2">Admin</span>
                                        <form action="{{route('users.remove-admin', $user->id)}}" method="post"
                                              class="mr-2">
                                            @csrf
                                            @method('patch')
                                            <button class="btn btn-warning">Remove admin</button>
                                        </form>

                                @endif
                                    <a href="{{route('users.edit', $user->id)}}" class="btn btn-secondary">Edit</a>
                                </div>
                            </td>
                            {{--                            <td>--}}
                            {{--                                <div class="btn btn-group">--}}
                            {{--                                    <a href="{{route('tags.edit', $tag->id)}}" class="btn btn-info">Edit</a>--}}
                            {{--                                    <a data-tag-id="{{$tag->id}}" class="btn btn-danger delete-tag">Delete</a>--}}
                            {{--                                </div>--}}
                            {{--                            </td>--}}
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="text-center">No data</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="tag-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="" method="post" id="tag-delete">
            @csrf
            @method('delete')
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tag</h5>
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
            $('.delete-tag').click(function () {
                let tag_id = $(this).data('tag-id')
                let form = document.querySelector('#tag-delete')
                form.action = "{{url('/tags/')}}" + "/" + tag_id
                $('#tag-modal').modal('show')
                console.log(tag_id)
            })

        })

        // $(document).ready(function(){
        //
        // })
        // function deleteCategory(event, id){
        //     console.log(id)
        //     $('#category-modal').modal('show')
        // }
    </script>
@endsection
