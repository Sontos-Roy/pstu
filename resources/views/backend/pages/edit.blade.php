@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>Edit Page</h2>
        <small class="text-muted">Patuakhali Science & Technology University</small>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <form action="{{ route('admin.pages.update', $item->id) }}" method="POST" id="ajax_form">
                    @csrf
                    @method('PUT')
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Select Page Type</label>
                                        <select class="form-control select2" name="page_slug">
                                            <option value="">Select One</option>
                                            @foreach($types as $key=>$type)
                                            <option value="{{ $key}}" {{ $key==$item->page_slug?'selected':''}}>{{ $type}}</option>
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
                                            <option value="">Select One</option>
                                            @foreach($faculties as $key=>$faculty)
                                            <option value="{{ $faculty->id}}" {{ $faculty->id==$item->faculty_id?'selected':''}}>{{ $faculty->title}}</option>
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
                                            <option value="">Select One</option>
                                            @foreach($departments as $key=>$department)
                                            <option value="{{ $department->id}}" {{ $department->id==$item->department_id?'selected':''}}>{{ $department->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="title" value="{{ $item->title }}" class="form-control" placeholder="Page Title">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea rows="4" name="video_link" class="form-control no-resize" placeholder="Video Link">{{ $item->video_link }}</textarea>
                                    </div>
                                </div>
                            </div>
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
                                        <textarea rows="4" id="editor" name="details" class="form-control no-resize" placeholder="Details">{{ $item->details }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label for="">Image</label>
                                <div style="border: 1px solid black;">
                                    <input type="file" class="" {{ $item->is_active == 1 ? 'checked' : '' }} id="image-input" name="image">
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
