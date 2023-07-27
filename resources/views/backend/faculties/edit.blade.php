@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>Edit Faculty</h2>
        <small class="text-muted">Patuakhali Science & Technology University</small>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <form action="{{ route('admin.faculties.update', $item->id) }}" method="POST" id="ajax_form">
                    @csrf

                    @method('PUT')
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="title" class="form-control" placeholder="Faculty Name " value="{{ $item->title }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Select Dean Of Faculty</label>
                                    <select name="user_id" id="" class="form-control select2">
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}" {{ $item->user_id == $user->id? "selected": "" }}>{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea rows="4" name="short" class="form-control no-resize" placeholder="Short Message">{{ $item->short }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea rows="4" id="editor" name="introduction" class="form-control no-resize" placeholder="Introduction">{!! $item->introduction !!}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                    <label for="">Image</label>
                                    <div style="border: 1px solid black;">
                                        <input type="file" class="" id="image-input" name="image">
                                        <img src="#" alt="" width="100" id="image-preview">
                                    </div>
                            </div>

                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-raised g-bg-blush2">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
