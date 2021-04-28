@extends('layouts.app')
@section('content')
    <div>
        @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif
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
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $cat)
                        <tr>
                            <td>
                                {{$cat->name}}
                            </td>
                            <td>
                                <a href="{{route('categories.edit', $cat->id)}}" class="btn btn-info">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
