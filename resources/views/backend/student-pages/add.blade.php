@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>Edit Student Page</h2>
        <small class="text-muted">Patuakhali Science & Technology University</small>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <form action="{{ route('admin.students-page.store') }}" method="POST" id="ajax_form">
                    @csrf
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="menu" class="form-control" placeholder="Menu Name ">
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea rows="10" name="short" class="form-control no-resize" placeholder="Message In Short" style="height: 100px;"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea rows="10" id="editor" name="details" class="form-control no-resize" placeholder="Message" style="height: 200px;"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                    <label for="inputName" class="col-4 col-form-label">pdf file</label>
                                    <div class="col-8">
                                        <input type="file" class="form-control" style="border: 1px solid black;" name="pdf">
                                    </div>
                            </div>
                            <div class="col-sm-12">
                                    <label for="inputName" class="col-4 col-form-label">Image</label>
                                    <div class="col-8">
                                        <input type="file" class="form-control" style="border: 1px solid black;" name="image">
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
