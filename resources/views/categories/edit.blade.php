@extends('layouts.app')
@section('content')
    <div>
        <div class="card card-default">
            <div class="card-header">
                Update Categories
            </div>
            <div class="card-body">
                <form action="{{route('categories.update', $category->id)}}" method='post'>
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{old('name', $category->name)}}" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <button class="btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </div>

@endsection
