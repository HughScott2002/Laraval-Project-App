@extends('layouts.app')

@section('title', 'Sales Report')

@section('header', 'Sales Report')


@section('content')

    <div class="card">
        <div class="card-body mx-4">
            <div class="container">
                <p class="my-5 mx-5" style="font-size: 30px;">Thank for your purchase</p>
                <div class="row">
                    <ul class="list-unstyled">
                        <li class="text-black">{{ auth()->user()->name }}</li>
                        <li class="text-muted mt-1"><span class="text-black">Invoice</span> #12345</li>
                        <li class="text-black mt-1">April 17 2021</li>
                    </ul>
                    <hr>
                    <div class="col-xl-10">
                        <p>{{ $product->name }} #{{ $product->quantity }}</p>
                    </div>
                    <div class="col-xl-2">
                        <p class="float-end">${{ $product->price_range }}
                        </p>
                    </div>
                    <hr>
                </div>

                <div class="row text-black">

                    <div class="col-xl-12">
                        <p class="float-end fw-bold">Total: ${{ $product->price_range * $product->quantity }}
                        </p>
                    </div>
                    <hr style="border: 2px solid black;">
                </div>
                <div class="text-center" style="margin-top: 90px;">
                    <a><u class="text-info">View in browser</u></a>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
                </div>

            </div>
        </div>
    </div>




@endsection()

@section('footer')
    @include('posts.partials._footer')
@endsection()
