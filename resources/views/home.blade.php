@extends('layout.app')
@section('title')Home @endsection

@section('body')
    @foreach($categories as $category)
        {{ $category->name }} . <br />
    @endforeach
@endsection
