<div class="flex justify-content-center">
    <div class="card" style="width: 36rem;">
        {{-- <img src="{{ $user->image ?? 'https://static.vecteezy.com/system/resources/thumbnails/008/249/822/original/a-white-robot-searching-for-a-404-error-with-a-torch-light-4k-animation-404-page-not-found-error-concept-with-a-robot-4k-footage-system-finding-404-error-with-a-big-torch-light-animated-free-video.jpg' }}"
            class="card-img-top" alt="..."> --}}
        <div class="card-body">
            <h5 class="card-title">{{ $user->name }}</h5>
            {{-- <p class="card-text">Some quick example text to build on the card title and make     content.</p> --}}
        </div>
        <ul class="list-group list-group-flush">
            {{-- <li class="list-group-item">Name: {{ $user->name }}</li> --}}
            <li class="list-group-item">User Id: {{ $user->id }}</li>
            <li class="list-group-item">Email: {{ $user->email }}</li>
            <li class="list-group-item">{{ $user->is_admin == 1 ? 'Admin User' : 'Not admin' }}</li>
        </ul>
        <div class="card-body">
            <div class="d-flex bg-highlight justify-content-center align-content-center ">
                <div>
                    <a class='btn btn-primary px-4' href="{{ route('users.edit', ['user' => $user->id]) }}">Edit</a>
                </div>

                <form class='mx-3' action="{{ route('users.destroy', ['user' => $user]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-block">DELETE</button>
                </form>

            </div>
        </div>






    </div>
</div>
