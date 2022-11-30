<div class="flex justify-content-center">
    <div class="card">
        <img src="{{ $post->image === null ? 'https://www.pngkey.com/png/detail/233-2332677_image-500580-placeholder-transparent.png' : $post->image->url() }}" alt="{{ $post->title }}"
        class="card-img-top"/>
        @if ($post->trashed())
            <div class="card-header bg-danger">
                Trashed
            </div>
        @else
            @if (now()->diffInMinutes($post->created_at) <= 5)
                <div class="card-header bg-info">
                    Featured Post: Now!
                </div>
            @elseif (now()->diffInMinutes($post->created_at) >= 6 && now()->diffInMinutes($post->created_at) <= 60)
                <div class="card-header">
                    Featured Post: Hour
                </div>
            @elseif (now()->diffInMinutes($post->created_at) <= 1440)
                <div class="card-header ">

                    Featured Post: Today
                </div>
            @else
                <div class="card-header">
                    Featured Post
                </div>
            @endif
        @endif

        {{-- @if ($post->image() !== null)
            <img src="https://www.blogtyrant.com/wp-content/uploads/2013/01/how-to-get-more-blog-comments.jpg"
                class="card-img-top" alt="...">
        @endif --}}


        <div class="card-body">
            <h5 class="card-title">
                <a href="{{ route('posts.show', ['post' => $post->id]) }}">
                    {{ $post->title }}
                </a>
            </h5>
            <h6 class="card-subtitle mb-2 mt-1 text-muted">
                Created: {{ $post->created_at->diffForHumans() }}

            </h6>
            <h6 class="card-subtitle mb-2 mt-1 text-muted">
                Author: {{ $post->user->name }}

            </h6>
            <p class="card-text mb-3">
                {{ $post->content }}
            </p>

            <div>
                <x-tags :tags="$post->tags" />
            </div>
            {{-- Comments --}}
            @if ($post->comments_count)
                <h6 class="card-subtitle mb-2 mt-1 text-muted">
                    <p class="alert alert-success text-center"> Comments: {{ $post->comments_count }} </p>
                </h6>
            @else
                <h6 class="card-subtitle mb-2 mt-1 text-muted">
                    <p class="alert alert-info text-center"> No Comments yet </p>
                </h6>
            @endif
            {{-- End --}}

            <hr />
            @auth

                @if (!$post->trashed())
                    <div class="d-flex bg-highlight justify-content-center align-content-center ">
                        @can('update', $post)
                            <div>
                                <a class='btn btn-primary px-4' href="{{ route('posts.edit', ['post' => $post->id]) }}">Edit</a>
                            </div>
                        @endcan
                        @can('delete', $post)
                            <form class='mx-3' action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="POST">
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
