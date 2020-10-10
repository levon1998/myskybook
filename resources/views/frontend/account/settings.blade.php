@extends('frontend.layout.app')

@section('title')
    Account settings
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
                        <li class="breadcrumb-item active">Settings</li>
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

                        @include('frontend.partials.accountMenu', ['active' => 'settings'])

                        <div class="col-lg-9 col-12 mt--30 mt-lg--0">
                            <div class="tab-content" id="myaccountContent">
                                <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                    <h3>Account Settings</h3>
                                    <hr>
                                    <div class="checkout-form">

                                        <div id="billing-form" class="mb-40">
                                            <form action="{{ route('account-save-changes') }}" method="post">
                                                <div class="row">
                                                    {{ csrf_field() }}
                                                    <div class="col-md-6 col-12 mb--20">
                                                        <label>Full Name</label>
                                                        <input type="text" value="{{ Auth::user()->name }}" name="name" placeholder="Full Name">
                                                    </div>
                                                    <div class="col-md-6 col-12 mb--20">
                                                        <label>Username</label>
                                                        <input type="text" value="{{ Auth::user()->username }}" name="username" placeholder="Username">
                                                    </div>
                                                    <div class="col-md-12 mb--20">
                                                        <label>Email Address*</label>
                                                        <input type="email" value="{{ Auth::user()->email }}" disabled placeholder="Email Address">
                                                    </div>
                                                    <div class="col-12 text-right">
                                                        <button class="btn btn-outlined--primary" type="submit">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <h4>Change Password</h4>
                                            <hr>
                                            <form action="{{ route('account-save-password') }}" method="post">
                                                <div class="row">

                                                    {{ csrf_field() }}
                                                    <div class="col-md-12 mb--20">
                                                        <label>Password</label>
                                                        <input type="password" name="password" placeholder="Password">
                                                    </div>
                                                    <div class="col-md-12 mb--20">
                                                        <label>Confirm Password</label>
                                                        <input type="password" name="password_confirmation" placeholder="Confirm Password">
                                                    </div>
                                                    <div class="col-12 text-right">
                                                        <button class="btn btn-outlined--primary" type="submit">Save</button>
                                                    </div>
                                                </div>
                                            </form>
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

@section('scripts')

    <script>
        var success = "{{ session('successFullSaved') }}";
        $(document).ready(function () {
            if (success === "1") {
                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-center",
                    "preventDuplicates": true,
                }
                toastr.success('Saved.');
            }
        });
    </script>
@endsection