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
        @foreach($roles as $role)
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="card">
                <div class="body thumbnail">
                    <div class="caption">
                        <h3>{{$role->name}}</h3>
                        <p>{{ $role->users_count}}</p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <div class="clearfix"></div>

        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card">
                <div class="body thumbnail">
                    <div class="caption">
                        <h3> Exams (Current Month)</h3>
                        <p>{{ $total_exams}}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card">
                <div class="body thumbnail">
                    <div class="caption">
                        <h3> Events (Current Week)</h3>
                        <p>{{ $total_events}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row clearfix row-deck">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    Upcoming Birthdays
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hovered">
                        <tr>
                            <th>NAME</th>
                            <th>ROLE</th>
                            <th>Date</th>
                        </tr>
                        @foreach($upcomins_birthdays as $item)
                        <tr>
                            <td>{{ $item->user?$item->user->name:''}}</td>
                            <td><span class="badge badge-success">{{$item->user->roles->pluck('name')[0]??''}}</span></td>
                            <td>{{ $item->date_of_birth}}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>


        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    Upcoming Events
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hovered">
                        <tr>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                        @foreach($upcomins_events as $item)
                        <tr>
                            <td>{{ $item->heading}}</td>
                            <td><span class="badge badge-info">UPcoming</span></td>
                            <td>{{ $item->date}}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
