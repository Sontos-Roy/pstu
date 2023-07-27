@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="d-sm-flex justify-content-between">
            <div>
                <h2>All Professors</h2>
                <small class="text-muted">Patuakhali Science &amp; Technology University</small>
            </div>
            <div>
                <a href="{{ route('admin.users.create') }}" class="btn btn-raised btn-primary">Add Professor</a>
            </div>
        </div>
    </div>
    <style>
        .header-dropdown{
            position: absolute;
            top: 10px;
            right: 10px;
        }
        .shadow-none{
            box-shadow: none !important;
            cursor: pointer;
            width: 100%;
        }
        .shadow-none:hover{
            background-color: rgba(0,0,0,0.075) !important;
        }
        .profile_image{
            aspect-ratio: 3 / 3;
        }

    </style>
    <div class="row clearfix">
        @foreach ($teachers as $teacher)
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
            <div class="card">
                <div class="body">
                    <ul class="header-dropdown">
                        <li class="dropdown"> <a href="javascript:void(0);" class="px-2" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more-vert"></i> </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="{{ route('admin.users.show', $teacher->id) }}">Show Profile</a></li>
                                <li><a href="{{ route('admin.users.edit', $teacher->id) }}">Edit Profile</a></li>
                                <li>
                                    <form action="{{ route('admin.users.destroy', $teacher->id) }}" class="delete_form" method="POST">
                                        @method('DELETE')
                                        <button type="submit" class="btn shadow-none btn-sm">Delete Profile</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <div class="member-card verified">
                        <div class="thumb-xl member-thumb">
                            <img src="{{ getImage('teachers', $teacher->userDetails ? $teacher->userDetails->image : '') }}" class="img-thumbnail rounded-circle profile_image" alt="profile-image">
                        </div>


                        <div class="m-t-20">
                            <h4 class="m-b-0">{{ $teacher->name }}</h4>
                            <p class="text-muted">{{ $teacher->userDetails ? $teacher->userDetails->position : '' }}<span> <br> <strong>{{ $teacher->userDetails && $teacher->userDetails->department ? $teacher->userDetails->department->name : '' }}</strong> <a href="{{ $teacher->userDetails ? $teacher->userDetails->website : '' }}" class="text-pink">{{ Str::limit($teacher->userDetails ? $teacher->userDetails->website : '', 20, '...') }}</a> </span></p>
                        </div>

                        <p class="text-muted">{{ $teacher->userDetails ? $teacher->userDetails->present_address : '' }}</p>
                        <a href="{{ route('admin.users.show', $teacher->id) }}" class="btn btn-raised btn-default">View Profile</a>
                        <ul class="social-links  m-t-10">
                            <li><a title="facebook" href="{{ $teacher->userDetails ? $teacher->userDetails->facebook : '' }}"><i class="zmdi zmdi-facebook"></i></a></li>
                            <li><a title="twitter" href="{{ $teacher->userDetails ? $teacher->userDetails->twitter : '' }}"><i class="zmdi zmdi-twitter"></i></a></li>
                            <li><a title="instagram" href="{{ $teacher->userDetails ? $teacher->userDetails->youtube : '' }}"><i class="zmdi zmdi-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{ $teachers->links('pagination::bootstrap-4') }}
</div>
@endsection
