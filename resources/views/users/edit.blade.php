
@extends('layouts.app')
@php
$profile = $user->profile;
@endphp
@section('content')
    <div>
        <div class="card card-default">
            <div class="card-header">
                Edit profile
            </div>
            <div class="card-body">
                <form action="{{route('users.update', $user->id)}}" method='post' enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" value="{{old('name', $user->name)}}" name="name" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Confirm password</label>
                        <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
                        @error('password_confirmation')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Avatar</label>
                        <input type="file" name="avatar" class="form-control @error('avatar') is-invalid @enderror">
                        @error('avatar')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                        @if($profile && $profile->avatar)
                            <img src="{{asset('storage/'.$profile->avatar)}}" alt="" style="width: 100px" class="mt-2">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Facebook</label>
                        <input type="text" value="{{old('facebook', $profile->facebook ?? null)}}" name="facebook" class="form-control @error('facebook') is-invalid @enderror">
                        @error('facebook')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Youtube</label>
                        <input type="text"  value="{{old('youtube', $profile->youtube ?? null)}}"name="youtube" class="form-control @error('youtube') is-invalid @enderror">
                        @error('youtube')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">About</label>
                        <textarea name="about" id="about" cols="30" rows="10">{{old('about', $profile->about ?? null)}}</textarea>
                    </div>
                    <button class="btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </div>

@endsection


@section('script')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(function(){
            $('#about').summernote()
        })
    </script>
@endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
