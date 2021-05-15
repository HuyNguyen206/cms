@extends('frontend.layout.app-frontend', compact('categoryId'))
@section('title')
    {{$tag->name}}
@endsection
@section('content')
    <x-paginate-layout :object="$tag" :posts="$posts"></x-paginate-layout>
@endsection
@section('css')
    <style>
        .pagination{
            list-style: none;
            font-size: 20px;
            text-align: center;
            padding: 0;
            width: 100%;
        }


        .pagination li{
            margin: 0 10px;
            display: inline-block;
        }
    </style>
@endsection

