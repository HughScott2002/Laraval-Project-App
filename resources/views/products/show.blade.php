@extends('layouts.app')

@section('title', $product->name)

@section('header', 'Post')


@section('content')
    <div class="py-2 py-lg-4">
        <h2 class="p-lg-5 p-4 px-2 mb-0 text-center fs-2 fw-bolder fst-italic " style="background: rgb(215, 205, 192); ">
            {{ $product->name }}</h2>
        <div class="card">
            {{-- {{ dd(env('APP_URL') . ':3000/storage/' . $product->image->path) }} --}}
            {{-- {{ dd(Storage::url($product->image->path)) }} --}}
            {{-- <img src="{{ asset($product->image->path) }}" class="card-img-top" alt="{{ $product->name }}"> --}}
            {{-- <img src="{{ $product->image === null ? 'https://www.pngkey.com/png/detail/233-2332677_image-500580-placeholder-transparent.png' : $product->image->url() }}" --}}
            {{-- class="card-img-top" alt="{{ $product->name }}"> --}}
            <img src="{{ 'https://www.pngkey.com/png/detail/233-2332677_image-500580-placeholder-transparent.png' }}"
                class="card-img-top" alt="{{ $product->name }}">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Name: {{ $product->name }}</li>
                <li class="list-group-item">Type: {{ $product->type }}</li>
                <li class="list-group-item">Sales: {{ $product->sales }}</li>
                <li class="list-group-item">In Stock: {{ $product->quantity }}</li>
                <li class="list-group-item">Discount: {{ $product->discount }}%</li>
                <li class="list-group-item">Price: {{ $product->price_range }}</li>
                <li class="list-group-item">Vendor: {{ $product->user->name }}</li>
            </ul>
        </div>
        {{-- <div class="d-flex justify-content-end">
            <h3 class=" mt-2 text-muted fs-5 fw-light fst-italic">Author: Mary Jane</h3>
            <div class="mx-2 my-2 pb-2" style="height: 4rem; width: 4rem; ">
                <img class="hover rounded-circle img-fluid"
                    src="https://assets.papelpop.com/wp-content/uploads/2022/02/kirsten-dunst.png" alt="author image" />
            </div>

        </div> --}}



        <div>
            <p class="text-break word-break break-word word-wrap fs-3 p-md-3 px-2">{{ $product->content }}</p>
        </div>
    </div>
    <div class="d-flex justify-content-end align-content-center p-2">
        <p>Added at {{ $product->created_at->diffForHumans() }}</p>
    </div>


    {{-- @empty --}}
    {{-- <div class="alert alert-danger">No Comments</div> --}}
    {{-- @component('components.alert', ['type' => 'danger'])
        No Comments
    @endcomponent
    @endforelse
    @if (now()->diffInMinutes($product->created_at) < 5)
        @component('components.alert', ['type' => 'info'])
            New Post!
        @endcomponent
    @endif --}}

@endsection

@section('footer')
    @include('posts.partials._footer')
@endsection()
