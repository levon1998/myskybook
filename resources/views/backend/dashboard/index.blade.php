@extends('backend.layout.app')

@section('title')
    Admin Dashboard
@endsection

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Dashboard</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ url('/v1-admin/') }}">Home</a>
                </li>
                <li class="active">
                    <strong>Dashboard</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
@endsection
