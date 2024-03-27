@extends('layout.app')
@section('title')Home @endsection

@section('body')
    @foreach($categories as $category)
        {{ $category->name }} . <br />
    @endforeach
@endsection

<form action="/category/create" method="post">
    @csrf
    <input type="text" name="name">
    <button>create</button>
</form>
