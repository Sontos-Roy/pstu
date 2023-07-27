@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="d-sm-flex justify-content-between">
            <div>
                <h2>Dashboard</h2>
                <small class="text-muted">Welcome to Patuakhali Science & Technology University</small>
            </div>

        </div>
    </div>

    <div class="row clearfix row-deck">
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card">
                <div class="body thumbnail">
                    <div class="caption">
                        <h3>View Professors</h3>
                        <a href="{{ route('admin.users.index') }}" class="btn btn-raised waves-effect btn-sm" role="button">Read more</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card">
                <div class="body thumbnail">
                    <div class="caption">
                        <h3>View Leaderships</h3>
                        <a href="{{ route('admin.leadership.index') }}" class="btn btn-raised waves-effect btn-sm" role="button">Read more</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card">
                <div class="body thumbnail">
                    <div class="caption">
                        <h3>View Faculties</h3>
                        <a href="{{ route('admin.faculties.index') }}" class="btn btn-raised g-bg-blush2 waves-effect btn-sm" role="button">Read more</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card">
                <div class="body thumbnail">
                    <div class="caption">
                        <h3>View Departments</h3>
                        <a href="{{ route('admin.department.index') }}" class="btn btn-raised waves-effect btn-sm" role="button">Read more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
