@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>Add Page</h2>
        <small class="text-muted">Patuakhali Science & Technology University</small>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <form action="{{ route('admin.pages.store') }}" method="POST" id="ajax_form">
                    @csrf
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Select Page Type</label>
                                        <select class="form-control select2" name="page_slug">
                                            @foreach($types as $key=>$type)
                                            <option value="{{ $key}}">{{ $type}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Select Faculty</label>
                                        <select class="form-control select2" name="faculty_id">
                                            @foreach($faculties as $key=>$faculty)
                                            <option value="{{ $faculty->id}}">{{ $faculty->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Select Department</label>
                                        <select class="form-control select2" name="department_id">
                                            @foreach($departments as $key=>$department)
                                            <option value="{{ $department->id}}">{{ $department->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>



                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="title" class="form-control" placeholder="Page Title">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea rows="4" name="video_link" class="form-control no-resize" placeholder="Video Link"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea rows="4" name="short" class="form-control no-resize" placeholder="Short Message"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea rows="4" id="editor" name="details" class="form-control no-resize" placeholder="Introduction"></textarea>
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
                                    <label for="">Pdf File Upload</label>
                                    <div style="border: 1px solid black;">
                                        <input type="file" class="" name="pdf_file">
                                    </div>
                            </div>


                            <div class="mt-3 col-sm-12">
                                <label for="inputName" class="col-4 col-form-label">Page Active Or Not</label>
                                <div class="switch p-3">
                                    <label class="d-flex">OFF
                                        <input type="checkbox" name="is_active" checked>
                                        <span class="lever"></span>ON</label>
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
