@extends('frontend.layout.app')

@section('title')
    Authors
@endsection

@section('content')

    <section class="breadcrumb-section">
        <h2 class="sr-only">Site Breadcrumb</h2>
        <div class="container">
            <div class="breadcrumb-contents">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Authors</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>


    <main class="inner-page-sec-padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 order-lg-2">
                    @foreach ($authors as $author)
                        <p>
                            <i class="fa fa-user"></i> <a href="{{ route('author', [$author->id]) }}" class="list-value font-weight-bold"> {{ $author->name }} ({{$author->books()->count()}}) </a>
                        </p>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
@endsection
@section('scripts')
    <script src="{{ asset('/frontend/js/books.js') }}"></script>
@endsection