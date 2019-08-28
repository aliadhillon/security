@extends('layouts.master')

@section('title', 'Posts')

@section('content')
    @if ($posts->isNotEmpty())
        @foreach ($posts as $post)
            <div class="container">
                <h3 class="h3">{{ $post->title }}</h3>
                <span class="small">By: <strong>{{ $post->user->name }}</strong></span>
                <span class="float-right small">Published On: <strong>{{ $post->created_at->toDateString() }}</strong></span>
                <hr>
                <p>{{ $post->body }}</p>
            </div>
        @endforeach
    @else
        <p>There is no post yet.</p>
    @endif
@endsection