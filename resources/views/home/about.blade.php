@extends('layouts.app')

@section('title', 'About Us')

@section('header', 'About Us')


@section('content')
    <div class="container">
        {{-- <h2>Contact</h2>
        <h3>Contact Us</h3> --}}
        <div class="u-clearfix u-sheet u-sheet-1 row ">
            <p class="u-align-center u-heading-font u-text u-text-2 col-12">
                <span style="font-weight: 700;">Back-End Developer</span>
                <br>
                <span style="font-style: italic;">Mr. Hugh Scott<br>ID: 1908850
                </span>
            </p>
            <p class="u-align-center u-heading-font u-text u-text-2 col-12">
                <span style="font-weight: 700;">Front-end Developer</span>
                <br>
                <span style="font-style: italic;">Mr. Joad Ricketts<br>ID: 1603365
                </span>
            </p>

            <p class="u-align-center u-heading-font u-text u-text-3 col-12">
                <span style="font-weight: 700;">Front-end Developer</span>
                <br>
                <span style="font-style: italic;">Ms. Ntini Edwards<br>ID: 1904701
                </span>
            </p>
            <p class="u-align-center u-heading-font u-text u-text-4 col-12">
                <span style="font-weight: 700;">Database Engineer</span>
                <br>
                <span style="font-style: italic;">Mr. Collie Clarke<br>ID: 1808034
                </span>
            </p>
        </div>
    </div>


@endsection()

@section('footer')
    @include('posts.partials._footer')
@endsection()
