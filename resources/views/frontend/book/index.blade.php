@extends('frontend.layout.app')

@section('title')
    Books
@endsection

@section('content')

    <section class="breadcrumb-section">
        <h2 class="sr-only">Site Breadcrumb</h2>
        <div class="container">
            <div class="breadcrumb-contents">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Books</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>


    <main class="inner-page-sec-padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 order-lg-2">
                    <div class="shop-toolbar with-sidebar mb--30">
                        @include('frontend.partials.bookHeader')
                    </div>
                    <div class="shop-product-wrap with-pagination row space-db--30 shop-border list">
                        @forelse ($books as $book)
                            <div class="col-lg-4 col-sm-6">
                                <div class="product-card card-style-list">
                                    <div class="product-list-content">
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


                                            <div class="rating-widget">
                                                <div class="rating-block">
                                                    @php ($avg = $book->reviews()->avg('star'))
                                                    @for($i = 0; $i < $avg; $i++)
                                                        <span class="fas fa-star star_on"></span>
                                                    @endfor

                                                    @for($i = 0; $i < 5 - $avg; $i++)
                                                        <span class="fas fa-star"></span>
                                                    @endfor
                                                </div>

                                                <div class="review-widget">
                                                    <a href="">({{ $book->reviews()->count() }} Reviews)</a>
                                                </div>
                                            </div>

                                            <div class="btn-block">
                                                <button class="card-link addToFavorite {{ $book->like ? 'active-card-link ' : '' }}" {{ $book->like ? 'disabled' : '' }} data-book-id="{{ $book->id }}"><i class="fas fa-thumbs-up"></i> Add To Favorite</button>
                                                <button class="card-link addToWatchLater {{ $book->watchLater  ? 'active-card-link' : '' }}" {{ $book->watchLater ? 'disabled' : '' }} data-book-id="{{ $book->id }}"><i class="fas fa-clock"></i> Watch Later</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <p align="center">No available data.</p>
                            </div>
                        @endforelse
                    </div>

                    <div class="row pt--30">
                        <div class="col-md-12">
                            <div class="pagination-block justify-content-center">
                                {{ $books->appends(['sort' => app('request')->input('sort')])->links() }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3  mt--40 mt-lg--0">
                    <div class="inner-page-sidebar">
                        <div class="single-block">
                            <h3 class="sidebar-title">Categories</h3>
                            <ul class="sidebar-menu--shop menu-type-2">
                                @foreach ($headerCategories as $category)
                                    <li><a href="{{ url('/books/category/'.$category->slug) }}">{{ $category->name }} <span>{{ $category->books()->count() }}</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="single-block">
                            <h3 class="sidebar-title">Tags</h3>
                            <ul class="sidebar-menu--shop menu-type-2">
                                @foreach ($tags as $tag)
                                    <li><a href="{{ url('/books/tag/'.$tag->slug) }}">{{ $tag->name }} <span>{{ $tag->books()->count() }}</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('scripts')
    <script src="{{ asset('/frontend/js/books.js') }}"></script>
@endsection