@extends('backend.layout.app')

@section('title')
    Tags
@endsection

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2>Tags</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ url('/v1-admin/') }}">Home</a>
                    </li>
                    <li class="active">
                        <strong>Tags</strong>
                    </li>
                </ol>
            </div>
            <div class="pull-right">
                <a href="{{ url('/v1-admin/tags/create') }}" class="btn btn-primary">Create</a>
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
                        <th scope="col">Slug</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tags as $tag)
                        <tr>
                            <th scope="row">{{ $tag->id }}</th>
                            <td>{{ $tag->name }}</td>
                            <td>{{ $tag->slug }}</td>
                            <td>{{ $tag->created_at }}</td>
                            <td>
                                <a href="{{ url('/v1-admin/tags/edit/'.$tag->id) }}" class="btn btn-sm btn-default"><i class="fa fa-pencil"></i></a>
                                <a href="{{ url('/v1-admin/tags/delete/'.$tag->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4"> Not Data available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">

        var success = "{{ session('success') }}";

        $(document).ready(function () {
            toastr.options = {
                "progressBar": true,
                "positionClass": "toast-top-center",
                "preventDuplicates": true,
            };

            if (success === "1") {
                toastr.success('Success.');
            } else if (success === "2") {
                toastr.error('Record not found.');
            }
        });

        var registerUrl = "{{ route('register') }}";
    </script>
    <script src="{{ asset('/frontend/js/auth.js') }}"></script>
@endsection
