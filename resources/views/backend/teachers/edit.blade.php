@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>Edit Staff</h2>
        <small class="text-muted">Patuakhali Science &amp; Technology University</small>
    </div>
    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data" id="ajax_form">
        @csrf
        @method('PUT')
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
                                        <input type="text" name="name" class="form-control" placeholder="First Name" value="{{ $user->name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="date" name="date_of_birth" class="datepicker form-control" placeholder="Date of Birth" data-dtp="dtp_sCohL" value="{{ $user->userDetails? $user->userDetails->date_of_birth :''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group drop-custum">
                                    <select class="form-control show-tick" name="gender">
                                        <option value="">-- Gender --</option>
                                        <option value="Male" {{ $user->userDetails && $user->userDetails->gender == 'Male' ? 'selected': '' }}>Male</option>
                                        <option value="Female" {{ $user->userDetails && $user->userDetails->gender == 'Female' ? 'selected': '' }}>Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group drop-custum">
                                    <select class="form-control show-tick p-2" name="department_id">
                                        <option value="">-- Department Select --</option>
                                        @php
                                            if ($user->userDetails && $user->userDetails->department_id) {
                                                $department_id = $user->userDetails->department_id;
                                            }else{
                                                $department_id = 0;
                                            }
                                        @endphp
                                        @foreach ($departments as $item)
                                            <option value="{{ $item->id }}" {{ $item->id == $department_id ? 'selected': '' }} class="p-2">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                    <label for="">Select Role</label>
                                    <select class="form-control show-tick p-2 select2 border-none" multiple name="roles[]">
                                        <option value="">-- Role Select --</option>
                                        @foreach ($roles as $item)
                                            <option value="{{ $item }}" {{ in_array($item, $userRole) ? 'selected': '' }} class="p-2">{{ $item }}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="position" placeholder="Position" value="{{$user->userDetails ? $user->userDetails->position : ''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                @if ($user->userDetails && $user->userDetails->image)
                                <img src="{{ getImage('teachers', $user->userDetails ? $user->userDetails->image: '') }}" height="100">
                                <br>
                                @endif
                                <label for="">Teacher Image</label>
                                <input type="file" class="form-control" name="image">
                            </div>
                            <div class="col-md-4 col-sm-12">
                                @if ($user->userDetails && $user->userDetails->banner)
                                <img src="{{ getImage('teachers', $user->userDetails ? $user->userDetails->banner: '') }}" height="100">
                                <br>
                                @endif
                                <label for="">Banner Image</label>
                                <input type="file" class="form-control" name="banner">
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea rows="4" name="present_address" class="form-control no-resize" placeholder="Present Address">{{$user->userDetails ? $user->userDetails->present_address : ''}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea rows="4" name="permanent_address" class="form-control no-resize" placeholder="permanent Address">{{$user->userDetails ? $user->userDetails->permanent_address : ''}}</textarea>
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
                                        <input type="text" class="form-control" name="phone" placeholder="Phone" value="{{$user->userDetails ? $user->userDetails->phone : ''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 col-md-4 ">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="email" placeholder="Email" value="{{ $user->email }}">
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="password" placeholder="Password">
                                    </div>
                                </div>
                            </div> --}}
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
                                        <input type="text" class="form-control" name="website" placeholder="Website" value="{{$user->userDetails ? $user->userDetails->website : ''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="facebook" placeholder="Facebook" value="{{$user->userDetails ? $user->userDetails->facebook : ''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="twitter" placeholder="Twitter" value="{{$user->userDetails ? $user->userDetails->twitter : ''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="google_plus" placeholder="Google Plus" value="{{$user->userDetails ? $user->userDetails->google_plus : ''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="linkedin" placeholder="LinkedIN " value="{{$user->userDetails ? $user->userDetails->linkedin : ''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="youtube" placeholder="Youtube" value="{{$user->userDetails ? $user->userDetails->youtube : ''}}">
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
