@extends('frontend.layout.app-frontend')
@section('title')
    {{'Search result for: '.request()->query('search')}}
@endsection
@section('content')
    <x-paginate-layout :posts="$posts"></x-paginate-layout>
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
