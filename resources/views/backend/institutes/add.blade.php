@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>Add Department</h2>
        <small class="text-muted">Patuakhali Science & Technology University</small>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <form action="{{ route('admin.institutes.store') }}" method="POST" id="ajax_form">
                    @csrf
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="name" class="form-control" placeholder="Department Name ">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label for="">Institute Derector</label>
                                <select name="user_id" id="" class="select2 form-control">
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="website" class="form-control" placeholder="Insitute Website ">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea rows="4" name="short" class="form-control no-resize" placeholder="Short Info" style="height: 150px;"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea rows="4" id="editor" name="brief" class="form-control no-resize" placeholder="Brief"></textarea>
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
