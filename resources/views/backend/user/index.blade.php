@extends('backend.layout.app')

@section('title')
    Admin Dashboard
@endsection

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2>Users</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ url('/v1-admin/') }}">Home</a>
                    </li>
                    <li class="active">
                        <strong>Users</strong>
                    </li>
                </ol>
            </div>
        </div>
    </div>

    <div class="ibox">
        <div class="ibox-content">

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>
{{--                            <a href="{{ url('/v1-admin/users/edit/'.$user->id) }}" class="btn btn-sm btn-default"><i class="fa fa-pencil"></i></a>--}}
{{--                            <a href="{{ url('/v1-admin/users/delete/'.$user->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>--}}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5"> Not Data available.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>

        </div>
    </div>
@endsection
