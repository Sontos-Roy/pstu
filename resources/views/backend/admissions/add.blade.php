@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>Add News</h2>
        <small class="text-muted">Patuakhali Science & Technology University</small>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <form action="{{ route('admin.admissions.store') }}" method="POST" id="ajax_form">
                    @csrf
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="title" class="form-control" placeholder="Title ">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <select name="department_id" id="" class="select2">
                                    <option value="">Select Department</option>
                                    @foreach ($departments as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea rows="10" name="details" class="form-control no-resize" id="editor" placeholder="Message In Short" style="height: 200px;"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea rows="10" name="contact" class="form-control no-resize" id="editor2" placeholder="Message In Short" style="height: 200px;"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
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
