@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ $post->title }}</h2>
        <hr>
        <p>{{ $post->body }}</p>
        <br>
        <a class="btn btn-info" href="{{ route('posts.edit', ['post' => $post->id]) }}">Edit</a>
    </div>
@endsection