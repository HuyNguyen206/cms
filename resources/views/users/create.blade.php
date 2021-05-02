@extends('layouts.app')
@section('content')
    <div>
        <div class="card card-default">
            <div class="card-header">
                Create Tags
            </div>
            <div class="card-body">
                <form action="{{route('tags.store')}}" method='post'>
                    @csrf
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <button class="btn btn-success">Create</button>
                </form>
            </div>
        </div>
    </div>

@endsection
