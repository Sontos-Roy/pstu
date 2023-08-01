@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>Add Staff</h2>
        <small class="text-muted">Patuakhali Science &amp; Technology University</small>
    </div>
    <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data" id="ajax_form">
        @csrf
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Basic Information</h2>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="name" class="form-control" placeholder="First Name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="date" name="date_of_birth" class="datepicker form-control" placeholder="Date of Birth" data-dtp="dtp_sCohL">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group drop-custum">
                                    <select class="form-control show-tick" name="gender">
                                        <option value="">-- Gender --</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group drop-custum">
                                    <select class="form-control show-tick p-2" name="faculty_id">
                                        <option value="">-- Faculty Select --</option>
                                        @foreach ($faculties as $faculty)
                                            <option value="{{ $faculty->id }}" class="p-2">{{ $faculty->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-12">
                                <div class="form-group drop-custum">
                                    <select class="form-control show-tick p-2" name="department_id">
                                        <option value="">-- Department Select --</option>
                                        @foreach ($departments as $item)
                                            <option value="{{ $item->id }}" class="p-2">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-12">
                                <div class="form-group drop-custum">
                                    <select class="form-control show-tick p-2" name="designation_id">
                                        <option value="">-- Designation Select --</option>
                                        @foreach ($designations as $item)
                                            <option value="{{ $item->id }}" class="p-2">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-4 col-sm-12">
                                <div class="form-group drop-custum">
                                    <label for="">Select Role</label>
                                    <select class="form-control show-tick p-2 select2 border-none" multiple name="roles[]">
                                        <option value="">-- Role Select --</option>
                                        @foreach ($roles as $item)
                                            <option value="{{ $item }}" class="p-2">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="position" placeholder="Position">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <label for="">Teacher Image</label>
                                <input type="file" class="form-control" name="image">
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <label for="">Banner Image</label>
                                <input type="file" class="form-control" name="banner">
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea rows="4" name="present_address" class="form-control no-resize" placeholder="Present Address"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea rows="4" name="permanent_address" class="form-control no-resize" placeholder="permanent Address"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2>Professor's Account Information</h2>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="phone" placeholder="Phone">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 col-md-4 ">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="email" placeholder="Email">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="password" placeholder="Password">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2>Professor Social Media Info </h2>

                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="website" placeholder="Website">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="facebook" placeholder="Facebook">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="twitter" placeholder="Twitter">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="google_plus" placeholder="Google Plus">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="linkedin" placeholder="LinkedIN ">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="youtube" placeholder="Youtube">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-raised g-bg-blush2">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
