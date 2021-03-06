@extends('layouts.app')
@section('content')
    <div>
        <div>
            <a href="{{route('categories.create')}}" class="btn btn-primary mb-2 d-inline-block float-right">Create
                category</a>
        </div>

        <div class="card card-default" style="clear: both;">
            <div class="card-header">
                Categories
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>
                            Name
                        </th>
                        <th>
                            Post count
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($categories as $cat)
                        <tr>
                            <td>
                                {{$cat->name}}
                            </td>
                            <td>
                                {{$cat->posts->count()}}
                            </td>
                            <td>
                                <div class="btn btn-group">
                                    <a href="{{route('categories.edit', $cat->id)}}" class="btn btn-info">Edit</a>
                                    <a data-cate-id="{{$cat->id}}" class="btn btn-danger delete-cat">Delete</a>
                                </div>
                            </td>
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
    <div class="modal fade" id="category-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="" method="post" id="category-delete">
            @csrf
            @method('delete')
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Category</h5>
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
        $(function(){
            $('.delete-cat').click(function(){
                let cate_id = $(this).data('cate-id')
                let form = document.querySelector('#category-delete')
                form.action = "{{url('/categories/')}}" + "/"+ cate_id
                $('#category-modal').modal('show')
                console.log(cate_id)
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
