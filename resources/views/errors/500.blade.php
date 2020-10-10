@extends('frontend.layout.app')

@section('title', __('Not Found'))

@section('styles')
    <style>
        body{
            background: #fff;
        }

        .error-container {
            height: 100vh !important;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            font-family: montserrat, sans-serif;

        }

        .big-text {
            font-size: 200px;
            font-weight: 900;
            font-family: sans-serif;
            background: url({{ asset('/frontend/image/global-background.png') }}) no-repeat;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-size: cover;
            background-position: center;
        }

        .small-text {
            font-family: montserrat, sans-serif;
            color: rgb(0, 0, 0);
            font-size: 24px;
            font-weight: 700;
            text-transform: uppercase;
        }

        .button {
            color:	#fff;
            padding: 12px 36px;
            font-weight: 600;
            border: none;
            position: relative;
            font-family: 'Raleway', sans-serif;
            display: inline-block;
            text-transform: uppercase;
            -webkit-border-radius: 90px;
            -moz-border-radius: 90px;
            border-radius: 90px;
            margin: 2px;
            background-color: #62ab00;
            flex: 1 1 auto;
            text-decoration: none;
        }

        .button:hover,
        .button:focus {
            color:	#ffffff;
            background-position: right center;
            -webkit-box-shadow: 0px 5px 15px 0px rgba(0, 0, 0, 0.1);
            -moz-box-shadow: 0px 5px 15px 0px rgba(0, 0, 0, 0.1);
            box-shadow: 0px 5px 15px 0px rgba(0, 0, 0, 0.1);
            text-decoration: none;
        }
    </style>
@endsection

@section('content')
    <div class="container error-container">
        <div class="row  d-flex align-items-center justify-content-center">
            <div class="col-md-12 text-center">
                <h1 class="big-text">Oops!</h1>
                <h2 class="small-text">500 - Server Error</h2>

            </div>
            <div class="col-md-6  text-center">
                <p>Please connect with admin.</p>

                <a href="{{ url('/') }}" class="button button-dark-blue iq-mt-15 text-center">GOTO HOME PAGE</a>
            </div>
        </div>
    </div>
@endsection