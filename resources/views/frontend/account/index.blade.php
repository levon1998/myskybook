@extends('frontend.layout.app')

@section('title')
    My Account
@endsection

@section('content')

    <section class="breadcrumb-section">
        <h2 class="sr-only">Site Breadcrumb</h2>
        <div class="container">
            <div class="breadcrumb-contents">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">My Account</li>
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
                        <div class="col-lg-3 col-12">
                            <div class="myaccount-tab-menu nav" role="tablist">
                                <a href="{{ route('my-account') }}" class="active" data-toggle="tab"><i
                                            class="fas fa-tachometer-alt"></i>
                                    Dashboard</a>
                                <a href="{{ route('settings') }}" data-toggle="tab"><i class="fa fa-user"></i> Account
                                    Details</a>
                                <a href="{{route('watch-later')}}" data-toggle="tab"><i class="fa fa-clock"></i> Watch Later</a>
                                <a href="{{route('likes')}}" data-toggle="tab"><i class="fa fa-thumbs-up"></i> Likes</a>
                                <a href="#payment-method" data-toggle="tab"><i class="fa fa-credit-card"></i>
                                    Payment
                                    Method</a>
                            </div>
                        </div>

                        <div class="col-lg-9 col-12 mt--30 mt-lg--0">
                            <div class="tab-content" id="myaccountContent">
                                <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Dashboard</h3>
                                        <div class="welcome mb-20">
                                            <p>Hello, <strong>Alex Tuntuni</strong> (If Not <strong>Tuntuni
                                                    !</strong><a href="login-register.html" class="logout">
                                                    Logout</a>)</p>
                                        </div>
                                        <p class="mb-0">From your account dashboard. you can easily check &amp; view
                                            your
                                            recent orders, manage your shipping and billing addresses and edit your
                                            password and account details.</p>
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