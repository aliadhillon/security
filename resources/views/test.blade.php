@extends('layouts.master')

@section('title', 'Test')

@section('content')
    <p>This is just a test</p>
    {{ __(__('messages.error'), ['name' => 'Random']) }}
    @error('random')
        <p>{{ $message }}</p>
    @enderror
@endsection