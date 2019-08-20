@extends('layouts.master')

@section('title', 'Posts')

@section('content')
    @if ($posts->isNotEmpty())
        @foreach ($posts as $post)
            <div class="container">
                <h3>{{ $post->title }}</h3>
                <span>By: {{ $post->user->name }}</span>
                <hr>
                <p>{{ $post->body }}</p>
            </div>
        @endforeach
    @else
        <p>There is no post yet.</p>
    @endif
@endsection