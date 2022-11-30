@extends('layouts.app')

@section('title', 'Contact-Secret')

@section('header', 'Secret')


@section('content')
    <div class="container">
        <h1 class="text-center p-4">This was a fun project</h1>
        <p class="text-center">Thank you to Mr. Lushane Jones</p>
    </div>
@endsection()

@section('footer')
    @include('posts.partials._footer')
@endsection()
