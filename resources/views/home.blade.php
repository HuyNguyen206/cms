@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card text-white ">
                <div class="card-header bg-info">
                    Published Posts
                </div>

                <div class="card-body text-black-50">
                    <h3>
                        {{$publishedPosts}}
                    </h3>

                </div>
            </div>
        </div>
        <div class="col-md-3 ">
            <div class="card text-white ">
                <div class="card-header bg-primary">
                    Unpublished Posts
                </div>

                <div class="card-body text-black-50">
                    <h3>
                        {{$unPublishedPosts}}
                    </h3>
                </div>
            </div>
        </div>
        <div class="col-md-3 ">
            <div class="card text-white">
                <div class="card-header  bg-success">
                    Users
                </div>

                <div class="card-body text-black-50">
                    <h3>
                        {{$users}}
                    </h3>

                </div>
            </div>
        </div>
        <div class="col-md-3 ">
            <div class="card text-white ">
                <div class="card-header bg-secondary">
                    Categories
                </div>

                <div class="card-body text-black-50">
                    <h3>
                        {{$categories}}
                    </h3>

                </div>
            </div>
        </div>
    </div>

@endsection
