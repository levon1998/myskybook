@extends('frontend.layout.app')

@section('title')
    Favorite list
@endsection

@section('content')

    <section class="breadcrumb-section">
        <h2 class="sr-only">Site Breadcrumb</h2>
        <div class="container">
            <div class="breadcrumb-contents">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('my-account') }}">My Account</a></li>
                        <li class="breadcrumb-item active">Favorite List</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <div class="page-section inner-page-sec-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row">

                        @include('frontend.partials.accountMenu', ['active' => 'favorites'])

                        <div class="col-lg-9 col-12 mt--30 mt-lg--0">
                            <div class="tab-content" id="myaccountContent">
                                <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Favorites</h3>

                                        <div class="col-lg-12 order-lg-2">
                                            <div class="shop-product-wrap grid with-pagination row space-db--30 shop-border grid">
                                                @foreach ($books as $book)
                                                    @php($book = $book->book)
                                                    <div class="col-sm-4 col-xs-12">
                                                        <div class="product-card">
                                                            <div class="product-grid-content">
                                                                <div class="card-image">
                                                                    <a href="{{ url('/book/'.$book->slug) }}" tabindex="0">
                                                                        <img src="{{ asset('storage/books/'.$book->filename) }}"  alt="{{ $book->short_name }}">
                                                                    </a>
                                                                </div>
                                                                <div class="product-card--body">
                                                                    <div class="product-header">
                                                                        <h3>
                                                                            <a href="{{ url('/book/'.$book->slug) }}" tabindex="0">
                                                                                {{ $book->short_name }}
                                                                            </a>
                                                                        </h3>

                                                                        <a href="{{ url('/author/'.$book->author->id) }}" class="author">
                                                                            {{ $book->author->name }}
                                                                        </a>
                                                                    </div>
                                                                    <article>
                                                                        <h2 class="sr-only">Card List Article</h2>
                                                                        <p>{{ $book->short_description }}</p>
                                                                    </article>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection