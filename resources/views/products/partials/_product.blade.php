<div class="flex justify-content-center">
    <div class="card">
        <img src="https://www.pngkey.com/png/detail/233-2332677_image-500580-placeholder-transparent.png'"
            alt="{{ $product->name }}" class="card-img-top" />
        @if ($product->trashed())
            <div class="card-header bg-danger">
                Soft Deleted
            </div>
        @else
            @if (now()->diffInMinutes($product->created_at) <= 5)
                <div class="card-header bg-info">
                    Featured product: Now!
                </div>
            @elseif (now()->diffInMinutes($product->created_at) >= 6 && now()->diffInMinutes($product->created_at) <= 60)
                <div class="card-header">
                    Featured product: Hour
                </div>
            @elseif (now()->diffInMinutes($product->created_at) <= 1440)
                <div class="card-header ">

                    Featured product: Today
                </div>
            @else
                <div class="card-header">
                    Featured product
                </div>
            @endif
        @endif

        {{-- @if ($product->image() !== null)
            <img src="https://www.blogtyrant.com/wp-content/uploads/2013/01/how-to-get-more-blog-comments.jpg"
                class="card-img-top" alt="...">
        @endif --}}


        <div class="card-body">
            <h5 class="card-title">
                <a href="{{ route('product.show', ['product' => $product->id]) }}">
                    {{ $product->name }}
                </a>
            </h5>
            <h6 class="card-subtitle mb-2 mt-1 text-muted">
                Created: {{ $product->created_at->diffForHumans() }}

            </h6>
            <h6 class="card-subtitle mb-2 mt-1 text-muted">
                Vendor: {{ $product->user->name }}

            </h6>
            <p class="card-text mb-3">
                {{ $product->type }}
            </p>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Amount: {{ $product->quantity }}</li>
                <li class="list-group-item">Manufacturer: {{ $product->manufacturer }}</li>
                <li class="list-group-item">Sales: {{ $product->sales }}</li>
                <li class="list-group-item">Price: {{ $product->price_range }}</li>
            </ul>


            @auth
                <hr />

                @if (!$product->trashed())
                    <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="product_id" value="{{ $product->id }}" hidden />

                        <input type="text" name="user_id" value="{{ auth()->user()->id }}" hidden />
                        <input type="text" name="name" value="{{ $product->name }}" hidden />
                        <div class="d-flex bg-highlight justify-content-center align-content-center ">
                            {{-- <div>
                                <a class='btn btn-success px-4 mx-2 my-2'
                                    href="{{ route('cart.create', ['product' => $product->id]) }}">Buy</a>
                            </div> --}}
                            <div class="d-flex bg-highlight justify-content-center align-content-center ">
                                <label for="quantity" class="mx-1">Amount: </label>
                                <input type="number" name="quantity" id="quantity" value="1"
                                    max="{{ $product->quantity }}" min="1" />
                            </div>
                            <div>
                                <button type="submit" class='btn btn-warning px-4 mx-2 my-2'>Cart</button>
                            </div>
                        </div>
                    </form>
                @endif
            @endauth
            @auth
                <hr />

                @if (!$product->trashed())
                    <div class="d-flex bg-highlight justify-content-center align-content-center ">
                        @can('update', $product)
                            <div>
                                <a class='btn btn-primary px-4'
                                    href="{{ route('product.edit', ['product' => $product->id]) }}">Edit</a>
                            </div>
                        @endcan
                        @can('delete', $product)
                            <form class='mx-3' action="{{ route('product.destroy', ['product' => $product->id]) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-block"> DELETE!</button>
                            </form>
                        @endcan
                    </div>
                @endif
            @endauth

        </div>
    </div>
</div>
