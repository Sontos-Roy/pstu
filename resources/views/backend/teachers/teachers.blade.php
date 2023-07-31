@extends('backend.layouts.app')

@section('content')
<style>
    .member-card.verified .member-thumb img {
        min-width: 280px;
    }
</style>
<div class="container-fluid">
    <div class="block-header">
        <div class="d-sm-flex justify-content-between">
            <div>
                <h2>All Staff</h2>
                <small class="text-muted">Patuakhali Science &amp; Technology University</small>
            </div>
            @can('users.create')
            <div>
                <a href="{{ route('admin.users.create') }}" class="btn btn-raised btn-primary">Add Staff</a>
            </div>
            @endcan
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="body table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Department</th>
                                <th>Position</th>
                                <th>role</th>

                                <th>Address</th>
                                <th>Website</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teachers as $key=>$teacher)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td><img src="{{ getImage('teachers', $teacher->userDetails ? $teacher->userDetails->image : '') }}" width="80" alt=""></td>
                                <td>{{ StrLimit($teacher->name, 100) }}</td>
                                <td>{{ $teacher->userDetails && $teacher->userDetails->department ? $teacher->userDetails->department->name : '' }}</td>
                                <td>{{ $teacher->userDetails ? $teacher->userDetails->position : '' }}</td>
                                <td>
                                    @foreach($teacher->roles as $role)

                                    <span class="badge badge-info">{{$role->name}}</span>
                                    @endforeach
                                </td>
                                <td>{{ $teacher->userDetails ? $teacher->userDetails->present_address : '' }}</td>
                                <td>{{ Str::limit($teacher->userDetails ? $teacher->userDetails->website : '', 20, '...') }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('admin.users.show', $teacher->id) }}" class="btn btn-info waves-effect pull-right btn-xs" style="color: white;">
                                            show
                                        </a>
                                        @can('users.edit')
                                        <a href="{{ route('admin.users.edit', $teacher->id) }}" class="btn btn-primary waves-effect pull-right btn-xs" style="color: white;">edit
                                        </a>
                                        @endcan
                                        @can('users.delete')
                                        <form action="{{ route('admin.users.destroy', $teacher->id) }}" class="delete_form" method="POST">
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger waves-effect pull-right btn-xs" style="color: white;">delete</button>
                                        </form>
                                        @endcan
                                    </div>

                                    <ul class="social-links  m-t-10 d-none">
                                        <li><a title="facebook" href="{{ $teacher->userDetails ? $teacher->userDetails->facebook : '' }}"><i class="zmdi zmdi-facebook"></i></a></li>
                                        <li><a title="twitter" href="{{ $teacher->userDetails ? $teacher->userDetails->twitter : '' }}"><i class="zmdi zmdi-twitter"></i></a></li>
                                        <li><a title="instagram" href="{{ $teacher->userDetails ? $teacher->userDetails->youtube : '' }}"><i class="zmdi zmdi-youtube"></i></a></li>
                                    </ul>

                                    <div class="dropdown">
                                      <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                        Details
                                      </button>
                                      <div class="dropdown-menu">
                                        <a class="dropdown-item modal_btn" href="{{ route('admin.user_educations.create')}}?user_id={{$teacher->id}}">Education Add</a>
                                        <a class="dropdown-item modal_btn" href="{{ route('admin.user_experience.create')}}?user_id={{$teacher->id}}">Experience Add</a>
                                        <a class="dropdown-item modal_btn" href="{{ route('admin.user_awards.create')}}?user_id={{$teacher->id}}">Award Add</a>
                                        <a class="dropdown-item modal_btn" href="{{ route('admin.user_memberships.create')}}?user_id={{$teacher->id}}">Membership Add</a>
                                        <a class="dropdown-item modal_btn" href="{{ route('admin.user_research_interest.create')}}?user_id={{$teacher->id}}">Research Interest Add</a>
                                        <a class="dropdown-item modal_btn" href="{{ route('admin.user_research_supervision.create')}}?user_id={{$teacher->id}}">Research Supervision Add</a>
                                      </div>
                                    </div>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{ $teachers->links('pagination::bootstrap-4') }}
</div>
@endsection
