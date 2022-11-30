@extends('layouts.app')

@section('title', 'Products')

@section('header', 'Products')


@section('content')
    <div class="row m-0">
        <div class="col-8">
            @forelse ($products as $key => $product)
                <div class="p-4 p-lg-5 p-md-4 p-sm-4">
                    @include('products.partials._product')

                </div>
            @empty
                <div class="alert alert-info d-flex justify-content-center p-4 text-bold">
                    No Products found!
                </div>
            @endforelse
        </div>
        <div class="col-4">
            <div class="d-flex flex-column">
                <div class="mt-4">
                    <div class="card" style="width: 100%;">
                        <img class='card-img-top' src="https://producttribe.com/wp-content/uploads/2018/05/Img-4-2x-1.png"
                            alt="commments" />
                        <div class="card-body">
                            <h5 class="card-title text-center">Sort</h5>
                            <p class="card-text mb-2 italic text-center">Sort Products</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            @foreach ($sortBy as $sort)
                                @if ($sort == 'Name')
                                    <li class="list-group-item"> <a href="{{ route('sortbyName') }}">{{ $sort }}
                                        </a>
                                    </li>
                                @endif
                                @if ($sort == 'Type')
                                    <li class="list-group-item"> <a href="{{ route('sortbyType') }}">{{ $sort }}
                                        </a>
                                    </li>
                                @endif
                                @if ($sort == 'Manufacturer')
                                    <li class="list-group-item"> <a
                                            href="{{ route('sortbyManufacturer') }}">{{ $sort }}
                                        </a>
                                    </li>
                                @endif
                                @if ($sort == 'Sales')
                                    <li class="list-group-item"> <a href="{{ route('sortbySales') }}">{{ $sort }}
                                        </a>
                                    </li>
                                @endif
                                @if ($sort == 'Price Range')
                                    <li class="list-group-item"> <a
                                            href="{{ route('sortbyPrice_range') }}">{{ $sort }}
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="card" style="width: 100%;">
                        <img class='card-img-top'
                            src="https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.dreamstime.com%2Fstamp-text-best-sellers-inside-illustration-best-sellers-image109892599&psig=AOvVaw2aXiGVMcJjOelRFyO6Fj8O&ust=1669746021831000&source=images&cd=vfe&ved=0CBAQjRxqFwoTCOC4tua-0fsCFQAAAAAdAAAAABAJ"
                            alt="commments" />
                        <div class="card-body">
                            <h5 class="card-title text-center">Best Sellers</h5>
                            <p class="card-text mb-2 italic text-center">Product with the most sales</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            {{-- {{ dd($mostCommented) }} --}}
                            @foreach ($bestSeller as $seller)
                                <li class="list-group-item ">
                                    <a class="text-black text-decoration-none" href="/product/{{ $seller->id }}">
                                        {{ $seller->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="card" style="width: 100%;">
                        <img class='card-img-top'
                            src="https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.dreamstime.com%2Fstamp-text-best-sellers-inside-illustration-best-sellers-image109892599&psig=AOvVaw2aXiGVMcJjOelRFyO6Fj8O&ust=1669746021831000&source=images&cd=vfe&ved=0CBAQjRxqFwoTCOC4tua-0fsCFQAAAAAdAAAAABAJ"
                            alt="commments" />
                        <div class="card-body">
                            <h5 class="card-title text-center">Most Discounted</h5>
                            <p class="card-text mb-2 italic text-center">Best products on sale</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            {{-- {{ dd($mostCommented) }} --}}
                            @foreach ($mostDiscount as $dis)
                                <li class="list-group-item ">
                                    <a class="text-black text-decoration-none" href="/product/{{ $dis->id }}">
                                        {{ $dis->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="mt-4">

                    <div class="card" style="width: 100%;">
                        <img class='card-img-top'
                            src="https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.freepik.com%2Ffree-photos-vectors%2Fpeople&psig=AOvVaw2gmCDsZsCJ1efLz3alSzX8&ust=1669746112980000&source=images&cd=vfe&ved=0CBAQjRxqFwoTCMi9sJK_0fsCFQAAAAAdAAAAABAE"
                            alt="commments" />
                        <div class="card-body">
                            <h5 class="card-title text-center">Big Vendors</h5>
                            <p class="card-text mb-2 italic text-center">Vendors with the most sales on the site</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            {{-- {{ dd($mostCommented) }} --}}
                            @foreach ($bigVendors as $vendor)
                                <li class="list-group-item ">
                                    {{-- {{ dd($vendor) }} --}}
                                    {{ $vendor->user_name }}{{ $vendor->is_admin ? ': Admin' : '' }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>


        </div>

    </div>



@endsection()

@section('footer')
    @include('posts.partials._footer')
@endsection()
