@extends('backend.layouts.app')

@section('content')
<style>
    .profile-page .profile-header .profile_info .profile-image img{
        aspect-ratio: 3/3;
        height: 250px;
    }
</style>
<div class="container-fluid profile-page">
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="boxs-simple">
                <div class="profile-header" style="background:rgba(0,0,0,0) url({{ asset('backend/images/profile-bg.jpg') }}) repeat scroll center center/cover;">
                    <div class="profile_info">
                        <div class="profile-image"> <img src="{{ getImage('teachers', $teacher->userDetails ? $teacher->userDetails->image : '') }}" alt=""> </div>
                        <h4 class="mb-0"><strong>{{ $teacher->name }}</strong></h4>
                        <span class="text-muted col-white">{{ $teacher->userDetails->position }}</span>
                        <p class="social-icon">
                            <a title="Twitter" href="{{ $teacher->userDetails->twitter }}"><i class="zmdi zmdi-twitter"></i></a>
                            <a title="Facebook" href="{{ $teacher->userDetails->facebook }}"><i class="zmdi zmdi-facebook"></i></a>
                            <a title="Youtube" href="{{ $teacher->userDetails->youtube }}"><i class="zmdi zmdi-youtube"></i></a>
                            <a title="Website" href="{{ $teacher->userDetails->website }}"><i class="zmdi zmdi-globe-alt"></i></a>
                            <a title="Google Plus" href="{{ $teacher->userDetails->google_plus }}"><i class="zmdi zmdi-google "></i></a>
                            <a title="LinkedIn" href="{{ $teacher->userDetails->linkedin }}"><i class="zmdi zmdi-linkedin"></i></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">

                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#usersettings">Setting</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">

                        <div role="tabpanel" class="tab-pane in active" id="usersettings">
                            <h2 class="card-inside-title">Security Settings</h2>
                            @can('edit-teachers')
                            <form action="">
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="email" class="form-control" placeholder="Email" value="{{ $teacher->email }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="password" name="current_password" class="form-control" placeholder="Current Password">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="password" name="password" class="form-control" placeholder="New Password">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="cpassword" name="confirm_password" class="form-control" placeholder="New Password">
                                            </div>
                                        </div>
                                        <button class="btn btn-raised g-bg-blush2">Save Changes</button>
                                    </div>
                                </div>
                            </form>
                            @endcan
                            <h2 class="card-inside-title">  </h2>
                            <a href="{{ route('admin.users.edit', $teacher->id) }}" class="btn btn-info text-white">
                                <div class="d-flex align-items-center">
                                   View &  Edit Profile <span class="material-symbols-outlined pl-2"> edit_note </span>
                                </div>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
