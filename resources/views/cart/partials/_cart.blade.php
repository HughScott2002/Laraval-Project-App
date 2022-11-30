<div class="flex justify-content-center">
    <div class="card" style="width: 36rem;">
        <img src="{{ $cart->image ?? 'https://static.vecteezy.com/system/resources/thumbnails/008/249/822/original/a-white-robot-searching-for-a-404-error-with-a-torch-light-4k-animation-404-page-not-found-error-concept-with-a-robot-4k-footage-system-finding-404-error-with-a-big-torch-light-animated-free-video.jpg' }}"
            class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ $cart->name }}</h5>
            {{-- <p class="card-text">Some quick example text to build on the card title and make     content.</p> --}}
        </div>
        <ul class="list-group list-group-flush">
            {{-- <li class="list-group-item">Name: {{ $cart->name }}</li> --}}
            <li class="list-group-item">Price: {{ $cart->price }}</li>
            <li class="list-group-item">Amount: {{ $cart->quantity }}</li>
        </ul>
        <div class="card-body">
            <div class="d-flex bg-highlight justify-content-center align-content-center ">

                <div>
                    <form class='mx-3' action="{{ route('buy', ['product' => $cart->product_id]) }}" method="POST">
                        @csrf
                        {{-- @method('PUT') --}}
                        {{-- <input type="text" /> --}}
                        <input type="number" name="amount" id="amount" value="{{ $cart->quantity }}" hidden />
                        <input type="text" name="product_id" id="product_id" value="{{ $cart->product_id }}"
                            hidden />
                        <input type="number" name="cart_id" id="cart_id" value="{{ $cart->id }}" hidden />
                        <button type="submit" class="btn btn-primary btn-block">BUY</button>
                    </form>
                </div>
                <form class='mx-3' action="{{ route('cart.destroy', ['cart' => $cart->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-block">DELETE</button>
                </form>

            </div>
        </div>






    </div>
</div>
