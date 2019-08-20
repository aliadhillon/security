@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Profile</h2>
        <p>Name: <strong>{{ $name }}</strong></p>
        <p>Email: <strong>{{ $email }}</strong></p>
        <p>Created On: <strong>{{ $created }}</strong></p>
        <br>
        <form action="{{ route('destroy') }}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" onclick="return confirm('Are you sure? You are about to delete you account permanently.');" type="submit">Delete Profile</button>
        </form>
    </div>
@endsection