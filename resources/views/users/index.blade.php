@extends('layouts.app')

@section('title', 'Users')

@section('header', 'Users')


@section('content')

    <div class="row m-0 container">
        <div class="col-8">
            @forelse ($users as $key => $user)
                <div class="p-4 p-lg-5 p-md-4 p-sm-4">
                    @include('users.partials._user')

                </div>
            @empty
                <div class="alert alert-info d-flex justify-content-center p-4 text-bold">
                    No Users found!
                </div>
            @endforelse
        </div>

    </div>



@endsection()

@section('footer')
    @include('posts.partials._footer')
@endsection()
