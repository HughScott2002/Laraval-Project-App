@extends('layouts.app')

@section('title', 'Home')

@section('header', 'Home')


@section('content')
    <h2>Welcome!</h2>
    <h3>Please find all Project relivant data <a href="{{ route('product.index') }}">here</a></h3>
@endsection()
