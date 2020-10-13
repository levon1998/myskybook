@extends('backend.layout.app')

@section('title')
    {{ ($mode == 'store') ? 'Create' : 'Edit' }}
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
                    <li>
                        <a href="{{ url('/v1-admin/tags') }}">Tags</a>
                    </li>
                    <li class="active">
                        <strong>{{ $mode == 'store' ? 'Create' : 'Edit' }}</strong>
                    </li>
                </ol>
            </div>
            <div class="pull-right">
                <a href="{{ url('/v1-admin/tags') }}" class="btn btn-default">back</a>
            </div>
        </div>
    </div>

    <div class="ibox">
        <div class="ibox-content">
            <form action="{{ url("/v1-admin/tags/{$mode}") }}" method="post" class="mt--25">
                {{ csrf_field() }}
                <div class="form-group  row">
                    <label class="col-sm-2 col-form-label">Tag Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" value="{{ $tag->name ?? '' }}" class="form-control">
                        {!! $errors->first('name', '<small class="text-danger">:message</small>') !!}
                    </div>
                    @if ($mode == 'update')
                        <input type="hidden" name="id" value="{{ $tag->id }}">
                    @endif
                </div>
                <div class="form-group pull-right">
                    <button type="submit" class="btn btn-primary" >Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
