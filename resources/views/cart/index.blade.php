@extends('layouts.app')

@section('title', 'Cart')

@section('header', 'Posts')


@section('content')
    <div class="row m-0">
        <div class="col-8">
            @if (!$carts == null)
                @forelse ($carts as $key => $cart)
                    <div class="p-4 p-lg-5 p-md-4 p-sm-4">
                        {{-- @include('products.partials._product') --}}
                        @include('cart.partials._cart')
                    </div>
                @empty
                    <div class="alert alert-info d-flex justify-content-center p-4 text-bold">
                        Nothing in cart
                    </div>
                @endforelse
            @else
                <div class="alert alert-info d-flex justify-content-center p-4 text-bold">
                    Please sign in to see cart
                </div class="d-flex justify-content-center p-4 text-bold">
                <div>

                    <a class="btn btn-success  mx-3" href="{{ route('login') }}">Login</a>
                </div>
            @endif


        </div>

    </div>



@endsection()

@section('footer')
    @include('posts.partials._footer')
@endsection()
