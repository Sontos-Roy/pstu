@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>Add Event</h2>
        <small class="text-muted">Patuakhali Science & Technology University</small>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <form action="{{ route('admin.events.store') }}" method="POST" id="ajax_form">
                    @csrf
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="heading" class="form-control" placeholder="Heading ">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Select Faculty</label>
                                    <div class="form-line">
                                        <select name="faculty_id" id="" class="select2 form-control">
                                            <option value="">Select Faculty</option>
                                            @foreach ($faculties as $faculty)
                                                <option value="{{ $faculty->id }}">{{ $faculty->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Select Departments</label>
                                    <div class="form-line">
                                        <select name="depertment_id" id="" class="select2 form-control">
                                            <option value="">Select Departments</option>
                                            @foreach ($departments as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="date" name="date" class="form-control" placeholder="Date ">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="time" name="time" class="form-control" placeholder="Time ">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea rows="10" name="short" class="form-control no-resize" placeholder="Message In Short" style="height: 200px;"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea rows="10" id="editor" name="message" class="form-control no-resize" placeholder="Message" style="height: 200px;"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                    <label for="inputName" class="col-4 col-form-label">Cover Image</label>
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
