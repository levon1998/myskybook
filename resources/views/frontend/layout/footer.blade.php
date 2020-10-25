<hr><br>
<footer class="site-footer">
    <div class="container">
        <div class="row justify-content-between  section-padding">
            <div class=" col-xl-3 col-lg-4 col-sm-6">
                <div class="single-footer pb--40">
                    <div class="brand-footer footer-title">
                        <img src="{{ asset('/frontend/image/logo.png') }}" alt="">
                    </div>
                    <div class="footer-contact">
                        <p><span class="label">Email:</span><span class="text">suport@myskybook.com</span></p>
                    </div>
                </div>
            </div>
            <div class=" col-xl-3 col-lg-2 col-sm-6">
                <div class="single-footer pb--40">
                    <div class="footer-title">
                        <h3>Information</h3>
                    </div>
                    <ul class="footer-list normal-list">
                        <li><a href="{{ route('authors') }}">Authors</a></li>
                        <li><a href="{{ route('sitemap') }}">Sitemap</a></li>
                        <li><a href="{{ route('contact') }}">Contact us</a></li>
                    </ul>
                </div>
            </div>
            <div class=" col-xl-3 col-lg-2 col-sm-6">
                <div class="single-footer pb--40">
                    <div class="footer-title">
                        <h3>Extras</h3>
                    </div>
                    <ul class="footer-list normal-list">
                        <li><a href="{{ route('about') }}">About Us</a></li>
                        <li><a href="{{ route('books') }}">Books</a></li>
                        <li><a href="{{ route('price') }}">Price</a></li>s
                    </ul>
                </div>
            </div>
            <div class=" col-xl-3 col-lg-4 col-sm-6">
                <div class="footer-title">
                    <h3>Newsletter Subscribe</h3>
                </div>
                <div class="newsletter-form mb--30">
                    <form id="subscribeForm">
                        {{ csrf_field() }}
                        <input type="email" name="subscribeEmail" id="subscribeEmail" class="form-control" placeholder="Enter Your Email Address Here...">
                        <button id="subscribe" class="btn btn--primary w-100">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <p class="copyright-text">Copyright © {{ \Carbon\Carbon::now()->format('Y') }}. All Right Reserved.</p>s
        </div>
    </div>
</footer>