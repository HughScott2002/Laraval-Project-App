@extends('layouts.app')

@section('title', 'Edit')

@section('header', 'Edit')


@section('content')
    {{-- PATCH REQUEST --}}
    <form enctype="multipart/form-data" action="{{ route('users.update', ['user' => $user->id]) }}" method="POST">
        @csrf
        @method('PUT')
        @include('users.partials._form')

    </form>

@endsection()

@section('footer')
    @include('posts.partials._footer')
@endsection()
