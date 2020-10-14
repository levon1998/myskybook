@extends('backend.layout.app')

@section('title')
    Books
@endsection

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2>Books</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ url('/v1-admin/') }}">Home</a>
                    </li>
                    <li class="active">
                        <strong>Books</strong>
                    </li>
                </ol>
            </div>
            <div class="pull-right">
                <a href="{{ url('/v1-admin/books/create') }}" class="btn btn-primary">Create</a>
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
                @forelse ($books as $book)
                    <tr>
                        <th scope="row">{{ $book->id }}</th>
                        <td>{{ $book->name }}</td>
                        <td>{{ $book->slug }}</td>
                        <td>{{ $book->created_at }}</td>
                        <td>
                            <a href="{{ url('/v1-admin/books/edit/'.$book->id) }}" class="btn btn-sm btn-default"><i class="fa fa-pencil"></i></a>
                            <a href="{{ url('/v1-admin/books/delete/'.$book->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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
    </script>
@endsection
