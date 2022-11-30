@extends('layouts.app')

@section('title', 'Edit')

@section('header', 'Edit')


@section('content')
    {{-- PATCH REQUEST --}}
    <form enctype="multipart/form-data" action="{{ route('product.update', ['product' => $product->id]) }}" method="POST">
        @csrf
        @method('PUT')
        @include('products.partials._form')

    </form>

@endsection()

@section('footer')
    @include('products.partials._footer')
@endsection()
