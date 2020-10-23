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
                        <li class="breadcrumb-item"><a href="{{ route('books') }}">Books</a></li>
                        <li class="breadcrumb-item active">{{ $book->name }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>


    <main class="inner-page-sec-padding-bottom">
        <div class="container">
            <div class="row mb--60">
                <div class="col-lg-5 mb--30">
                    <div class="product-details-slider">
                        <div class="single-slide">
                            <img src="{{ asset('storage/books/'.$book->filename) }}" style="max-height: 550px;" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="product-details-info pl-lg--30 ">
                        <h1 class="product-title">Beats EP Wired On-Ear Headphone-Black</h1>
                        <ul class="list-unstyled">
                            <li>Author: <a href="{{ url('/author/'.$book->author->id) }}" class="list-value font-weight-bold"> {{ $book->author->name }}</a></li>
                        </ul>
                        <p class="tag-block">Tags: @foreach($book->tags as $tag) <a href="{{ url('/books/tag/'.$tag->slug) }}">{{ $tag->name }}</a> @endforeach</p>
                        <p class="tag-block">Categories: @foreach($book->categories as $category) <a href="{{ url('/books/category/'.$category->slug) }}">{{ $category->name }}</a> @endforeach</p>

                        <div class="rating-widget">
                            <div class="rating-block">
                                @for($i = 0; $i < $reviewAvg; $i++)
                                    <span class="fas fa-star star_on"></span>
                                @endfor

                                @for($i = 0; $i < 5 - $reviewAvg; $i++)
                                    <span class="fas fa-star"></span>
                                @endfor
                            </div>
                            <div class="review-widget">
                                <a href="">({{ $reviews->count() }} Reviews)</a> <span>|</span>
                                <a href="">Write a review</a>
                            </div>
                        </div>
                        <article class="product-details-article">
                            <h4 class="sr-only">Product Summery</h4>
                            <p>{{ $book->description }}</p>
                        </article>
                        <div class="add-to-cart-row">
                            <div class="add-cart-btn">
                                <a href="" class="btn btn-outlined--primary">Read Online</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <section class="">

                <div class="container">
                    <div class="section-title section-title--bordered">
                        <h2>RELATED PRODUCTS</h2>
                    </div>
                    <div class="product-slider sb-slick-slider slider-border-single-row" data-slick-setting='{ "autoplay": true, "autoplaySpeed": 8000, "slidesToShow": 4, "dots":true }' data-slick-responsive='[
                {"breakpoint":1200, "settings": {"slidesToShow": 4} },
                {"breakpoint":992, "settings": {"slidesToShow": 3} },
                {"breakpoint":768, "settings": {"slidesToShow": 2} },
                {"breakpoint":480, "settings": {"slidesToShow": 1} }
            ]'>
                        @foreach ($relatedBooks as $relatedBook)
                            <div class="single-slide text-center">
                                <div class="product-card ">
                                    <div class="product-header">
                                        <h3><a href="{{ url('/book/'.$relatedBook->slug) }}">{{ $relatedBook->short_name }}</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="{{ asset('storage/books/'.$relatedBook->filename) }}" style="max-height: 300px; min-width: 150px; margin: 0 auto;" alt="">
                                        </div>
                                        <div class="price-block">
                                            <p>{{ $relatedBook->short_description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>

            <div class="sb-custom-tab mt--50 review-tab section-padding">
                <ul class="nav nav-tabs nav-style-2" id="myTab2" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="tab1" data-toggle="tab" href="#tab-1" role="tab"
                           aria-controls="tab-2" aria-selected="true">
                            REVIEWS ({{ $reviews->count() }})
                        </a>
                    </li>
                </ul>
                <div class="tab-content space-db--20" id="myTabContent">
                    <div class="tab-pane fade active" id="tab-2" role="tabpanel" aria-labelledby="tab2">
                        <div class="review-wrapper">
                            @forelse($reviews as $review)
                                <div class="review-comment mb--20">
                                    <div class="text">
                                        <div class="rating-block mb--15">
                                            @for($i = 0; $i < $review->star; $i++)
                                                <span class="ion-android-star-outline star_on"></span>
                                            @endfor

                                            @for($i = 0; $i < 5 - $review->star; $i++)
                                                <span class="ion-android-star-outline"></span>
                                            @endfor
                                        </div>
                                        <h6 class="author">{{ $review->name }} – <span class="font-weight-400">{{ \Carbon\Carbon::parse($review->created_at)->format('"F j, Y, g:i a"') }}</span>
                                        </h6>
                                        <p>{{ $review->comment }}</p>
                                    </div>
                                </div>
                            @empty

                            @endforelse

                            <h2 class="title-lg mb--20 pt--15">ADD A REVIEW</h2>
                                <div class="rating-row pt-2">
                                <p class="d-block">Your Rating</p>
                                <span class="rating-widget-block">
										<input type="radio" class="chooseStar" data-value="5" name="star" id="star1">
										<label for="star1"></label>
										<input type="radio" class="chooseStar" data-value="4" name="star" id="star2">
										<label for="star2"></label>
										<input type="radio" class="chooseStar" data-value="3" name="star" id="star3">
										<label for="star3"></label>
										<input type="radio" class="chooseStar" data-value="2" name="star" id="star4">
										<label for="star4"></label>
										<input type="radio" class="chooseStar" data-value="1" name="star" id="star5">
										<label for="star5"></label>
									</span>
                                <form id="commentForm" class="mt--15 site-form ">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="message">Comment</label>
                                                <textarea name="comment" id="comment" cols="30" rows="10"
                                                          class="form-control"></textarea>
                                                <small class="text-danger form-error" id="form-error-comment"></small>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="name">Name *</label>
                                                <input type="hidden" name="bookId" value="{{ $book->id }}">
                                                <input type="text" id="name" name="name" class="form-control">
                                                <small class="text-danger form-error" id="form-error-name"></small>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="email">Email *</label>
                                                <input type="hidden" id="star" name="star" value="{{ $book->id }}">
                                                <input type="text" id="email" name="email" class="form-control">
                                                <small class="text-danger form-error" id="form-error-email"></small>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="website">Website</label>
                                                <input type="text" id="website" name="website" class="form-control">
                                                <small class="text-danger form-error" id="form-error-website"></small>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="submit-btn">
                                                <button class="btn btn-black postComment">Post Comment</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
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