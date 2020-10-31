@extends('backend.layout.app')

@section('title')
    {{ ($mode == 'store') ? 'Create' : 'Edit' }}
@endsection

@section('styles')
    <link href="{{ asset('/backend/css/plugins/jasny/jasny-bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/backend/css/plugins/select2/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/backend/css/plugins/ckeditor/styles.css') }}" rel="stylesheet">
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
                    <li>
                        <a href="{{ url('/v1-admin/books') }}">Books</a>
                    </li>
                    <li class="active">
                        <strong>{{ $mode == 'store' ? 'Create' : 'Edit' }}</strong>
                    </li>
                </ol>
            </div>
            <div class="pull-right">
                <a href="{{ url('/v1-admin/books') }}" class="btn btn-default">back</a>
            </div>
        </div>
    </div>

    <div class="ibox">
        <div class="ibox-content">
            <form action="{{ url("/v1-admin/books/{$mode}") }}" method="post" enctype="multipart/form-data" class="mt--25">
                {{ csrf_field() }}
                <h2 align="center">Book Info</h2>
                <hr>

                <div class="form-group  row">
                    <label class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" value="{{ $book->name ?? '' }}" class="form-control">
                        {!! $errors->first('name', '<small class="text-danger">:message</small>') !!}
                    </div>
                </div>

                <div class="form-group  row">
                    <label class="col-sm-2 col-form-label">Short Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="short_name" value="{{ $book->short_name ?? '' }}" class="form-control">
                        {!! $errors->first('short_name', '<small class="text-danger">:message</small>') !!}
                    </div>
                </div>

                <div class="form-group  row">
                    <label class="col-sm-2 col-form-label">Slug</label>
                    <div class="col-sm-10">
                        <input type="text" disabled value="{{ $book->slug ?? '' }}" class="form-control">
                        {!! $errors->first('slug', '<small class="text-danger">:message</small>') !!}
                    </div>
                </div>

                <div class="form-group  row">
                    <label class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <input type="text" name="description" value="{{ $book->description ?? '' }}"
                               class="form-control">
                        {!! $errors->first('description', '<small class="text-danger">:message</small>') !!}
                    </div>
                </div>

                <div class="form-group  row">
                    <label class="col-sm-2 col-form-label">Short Description</label>
                    <div class="col-sm-10">
                        <input type="text" name="short_description" value="{{ $book->short_description ?? '' }}"
                               class="form-control">
                        {!! $errors->first('short_description', '<small class="text-danger">:message</small>') !!}
                    </div>
                </div>

                <div class="form-group  row">
                    <label class="col-sm-2 col-form-label">Tags</label>
                    <div class="col-sm-10">
                        <select class="form-control select2" name="tags[]" multiple>
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}" {{ in_array($tag->id, $selectedTags ?? []) ? 'selected' : '' }}>{{ $tag->name }}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('tags', '<small class="text-danger">:message</small>') !!}
                    </div>
                </div>

                <div class="form-group  row">
                    <label class="col-sm-2 col-form-label">Categoies</label>
                    <div class="col-sm-10">
                        <select class="form-control select2" name="categories[]" multiple>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ in_array($category->id, $selectedCategories ?? []) ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('tags', '<small class="text-danger">:message</small>') !!}
                    </div>
                </div>

                <div class="form-group  row">
                    <label class="col-sm-2 col-form-label">Author</label>
                    <div class="col-sm-10">
                        <select class="form-control authorSelect2" name="author_id">
                            <option value=""></option>
                            @foreach ($authors as $author)
                                <option value="{{ $author->id }}" {{ (isset($book) && $book->author_id == $author->id) ? 'selected' : '' }}>{{ $author->name }}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('author_id', '<small class="text-danger">:message</small>') !!}
                    </div>
                </div>

                <div class="form-group  row">
                    <label class="col-sm-2 col-form-label">Upload File</label>
                    <div class="col-sm-10">
                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                            <div class="form-control" data-trigger="fileinput">
                                <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                <span class="fileinput-filename"></span>
                            </div>
                            <span class="input-group-addon btn btn-default btn-file">
                                <span class="fileinput-new">Select file</span>
                                <span class="fileinput-exists">Change</span>
                                <input type="file" name="book_file">
                            </span>
                            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                        </div>
                        {!! $errors->first('book_file', '<small class="text-danger">:message</small>') !!}
                    </div>
                </div>

                @if ($mode == 'update')
                    <input type="hidden" name="id" value="{{ $book->id }}">
                @endif

                <h2 align="center">Chapters
                    <button class="btn btn-sm btn-primary chapterAdd"><i class="fa fa-plus"></i></button>
                </h2>
                <hr>

                <div class="chapters">
                    @if ($mode == 'update')
                        @foreach ($book->chapters as $key => $chapter)
                            <br><div class="chapterClass">
                                <textarea name="chapters[]" class="chapter" id="chapter{{ $key+1 }}">{{ $chapter->body }}</textarea><br>
                                <button class="btn btn-sm btn-danger chapterDelete mt--5"><i class="fa fa-minus"></i></button><br>
                            </div>
                        @endforeach
                    @else
                        <br><div class="chapterClass">
                            <textarea name="chapters[]" class="chapter" id="chapter1"></textarea><br>
                            <button class="btn btn-sm btn-danger chapterDelete mt--5"><i class="fa fa-minus"></i></button><br>
                        </div>
                    @endif
                </div>
                <hr>

                <br>
                <div class="form-group pull-right">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
        </form>
    </div>
@endsection

@section('scripts')

    <script src="{{ asset('/backend/js/plugins/jasny/jasny-bootstrap.min.js') }}"></script>
    <script src="{{ asset('/backend/js/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('/backend/js/plugins/ckeditor/ckeditor.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('.select2').select2();
            $(".authorSelect2").select2({
                tags: true
            });

            for (var i = 1; i < $('.chapterClass').length+1; i++) {
                CKEDITOR.replace( 'chapter'+i );
            }

            $('.chapterAdd').on('click', function (e) {
                e.preventDefault();
                var length = $('.chapterClass').length + 1;
                $('.chapters').append('' +
                    '<br><div class="chapterClass">\n' +
                    '<textarea name="chapters[]" class="chapter" id="chapter'+length+'"></textarea><br>\n' +
                    '<button class="btn btn-sm btn-danger chapterDelete mt--5"><i class="fa fa-minus"></i></button><br>\n' +
                    '</div>');


                CKEDITOR.replace( 'chapter'+length );
            });

            $(document).on('click', '.chapterDelete', function (e) {
                e.preventDefault();
                console.log($(this).closest('.chapterClass'));
                $(this).closest('.chapterClass').remove();
            });
        });



    </script>
@endsection
