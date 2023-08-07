@extends('backend.layouts.app')

@section('content')
<style>
    .profile-page .profile-header .profile_info .profile-image img{
        aspect-ratio: 3/3;
        height: 250px;
    }
</style>
<div class="container-fluid emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="profile-img">
                            <img src="{{ getImage('teachers', $teacher->userDetails ? $teacher->userDetails->image : '') }}" alt="" width="150" />
                         
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>{{ $teacher->name}} </h5>
                                    <h6>
                                        @foreach($teacher->roles as $role)
                                        <span class="badge badge-info">{{$role->name}}</span>
                                        @endforeach 
                                    </h6>

                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Timeline</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="profile-work">
                            <div id="accordion">
                                  <div class="card">
                                    <div class="card-header" id="headingOne">
                                      <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Education
                                        </button>
                                      </h5>
                                    </div>

                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                      <div class="card-body">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-hover">
                                                    <tr>
                                                        <th>Degree Name</th>
                                                        <th> Group/Major Subject</th>
                                                        <th> Board/Institute </th>
                                                        <th> Country </th>
                                                        <th> Passing Year </th>
                                                        <th> Action </th>
                                                    </tr>

                                                    @foreach($teacher->educations as $edu)
                                                    <tr>
                                                        <td>{{ $edu->degree_name}}</td>
                                                        <td>{{ $edu->mejor_subject}}</td>
                                                        <td>{{ $edu->institute}}</td>
                                                        <td>{{ $edu->country}}</td>
                                                        <td>{{ $edu->passing_year}}</td>
                                                    </tr>
                                                    @endforeach
                                                </table>
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                      <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#Experiences" aria-expanded="true" aria-controls="Experiences">
                                            Experiences
                                        </button>
                                      </h5>
                                    </div>

                                    <div id="Experiences" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                      <div class="card-body">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-hover">
                                                    <tr>
                                                        <th> Title</th>
                                                        <th> Organization</th>
                                                        <th> Location </th>
                                                        <th> From Date </th>
                                                        <th> TO Date </th>
                                                        <th> Action </th>
                                                    </tr>

                                                    @foreach($teacher->experiences as $edu)
                                                    <tr>
                                                        <td>{{ $edu->title}}</td>
                                                        <td>{{ $edu->organization}}</td>
                                                        <td>{{ $edu->location}}</td>
                                                        <td>{{ $edu->from_date}}</td>
                                                        <td>{{ $edu->to_date}}</td>
                                                    </tr>
                                                    @endforeach
                                                </table>
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                      <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#Memberships" aria-expanded="true" aria-controls="Memberships">
                                            Memberships
                                        </button>
                                      </h5>
                                    </div>

                                    <div id="Memberships" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                      <div class="card-body">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-hover">
                                                    <tr>
                                                        <th> Name</th>
                                                        <th> Type</th>
                                                        <th> Membership Year </th>
                                                        <th> Expire Year </th>
                                                        <th> Action </th>
                                                    </tr>

                                                    @foreach($teacher->memberships as $mem)
                                                    <tr>
                                                        <td>{{ $mem->name}}</td>
                                                        <td>{{ $mem->type}}</td>
                                                        <td>{{ $mem->membership_year}}</td>
                                                        <td>{{ $mem->expire_year}}</td>
                                                    </tr>
                                                    @endforeach
                                                </table>
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                      <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#Educations" aria-expanded="true" aria-controls="Educations">
                                            Educations
                                        </button>
                                      </h5>
                                    </div>

                                    <div id="Educations" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                      <div class="card-body">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-hover">
                                                    <tr>
                                                        <th> Degree Name</th>
                                                        <th> Mejor Subject </th>
                                                        <th> Institute </th>
                                                        <th> Country </th>
                                                        <th> Passing Year </th>
                                                        <th> Action </th>
                                                    </tr>

                                                    @foreach($teacher->educations as $edu)
                                                    <tr>
                                                        <td>{{ $edu->degree_name}}</td>
                                                        <td>{{ $edu->mejor_subject}}</td>
                                                        <td>{{ $edu->institute}}</td>
                                                        <td>{{ $edu->country}}</td>
                                                        <td>{{ $edu->passing_year}}</td>
                                                    </tr>
                                                    @endforeach
                                                </table>
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                      <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#research_interest" aria-expanded="true" aria-controls="research_interest">
                                            Research Interest
                                        </button>
                                      </h5>
                                    </div>

                                    <div id="research_interest" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                      <div class="card-body">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-hover">
                                                    <tr>
                                                        <th> Subject </th>
                                                        <th> Description </th>
                                                        <th> Research </th>
                                                        <th> Action </th>
                                                    </tr>

                                                    @foreach($teacher->research_interests as $edu)
                                                    <tr>
                                                        <td>{{ $edu->subject}}</td>
                                                        <td>{{ $edu->description}}</td>
                                                        <td>{{ $edu->research}}</td>
                                                    </tr>
                                                    @endforeach
                                                </table>
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                      <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#research_supervision" aria-expanded="true" aria-controls="research_supervision">
                                            Research Supervision
                                        </button>
                                      </h5>
                                    </div>

                                    <div id="research_supervision" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                      <div class="card-body">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-hover">
                                                    <tr>
                                                        <th> Level Of Study </th>
                                                        <th> title </th>
                                                        <th> Supervisor </th>
                                                        <th> Co Supervisor </th>
                                                        <th> No Of Student </th>
                                                        <th> Area Research </th>
                                                        <th> Current Completion </th>
                                                        <th> Action </th>
                                                    </tr>

                                                    @foreach($teacher->research_supervisions as $edu)
                                                    <tr>
                                                        <td>{{ $edu->level_of_study}}</td>
                                                        <td>{{ $edu->title}}</td>
                                                        <td>{{ $edu->supervisor}}</td>
                                                        <td>{{ $edu->co_supervisor}}</td>
                                                        <td>{{ $edu->no_of_student}}</td>
                                                        <td>{{ $edu->area_research}}</td>
                                                        <td>{{ $edu->current_completion}}</td>
                                                    </tr>
                                                    @endforeach
                                                </table>
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                                </div>


                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                      <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#awards" aria-expanded="true" aria-controls="awards">
                                            Award
                                        </button>
                                      </h5>
                                    </div>

                                    <div id="awards" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                      <div class="card-body">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-hover">
                                                    <tr>
                                                        <th class="width10per" nowrap="">Award Type</th>
                                                        <th class="width25per">Title</th>
                                                        <th class="width7per">Year</th>
                                                        <th class="width7per">Country</th>
                                                        <th>Description</th>
                                                        <th> Action </th>
                                                    </tr>

                                                    @foreach($teacher->awards as $edu)
                                                    <tr>
                                                        <td>{{ $edu->type}}</td>
                                                        <td>{{ $edu->title}}</td>
                                                        <td>{{ $edu->year}}</td>
                                                        <td>{{ $edu->country}}</td>
                                                        <td>{{ $edu->description}}</td>
                                                    </tr>
                                                    @endforeach
                                                </table>
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                  
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p> {{ $teacher->name}}</p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Department</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p> {{ $teacher->userDetails && $teacher->userDetails->department ? $teacher->userDetails->department->name : '' }}</p>
                                            </div>
                                        </div>

                                        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $teacher->email}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $teacher->userDetails ? $teacher->userDetails->phone : '' }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Position</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $teacher->userDetails ? $teacher->userDetails->position : '' }}</p>
                                            </div>
                                        </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Present_ Address</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $teacher->userDetails ? $teacher->userDetails->present_address : '' }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Permanent Address</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $teacher->userDetails ? $teacher->userDetails->permanent_address : '' }}</p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label> Website</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $teacher->userDetails ? $teacher->userDetails->website : '' }}</p>
                                            </div>
                                        </div>

                                        

                                        
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label> Social Media</label><br/>
                                                <ul class="social-links  m-t-10">
                                                    <li><a title="facebook" href="{{ $teacher->userDetails ? $teacher->userDetails->facebook : '' }}"><i class="zmdi zmdi-facebook"></i></a></li>
                                                    <li><a title="twitter" href="{{ $teacher->userDetails ? $teacher->userDetails->twitter : '' }}"><i class="zmdi zmdi-twitter"></i></a></li>
                                                    <li><a title="instagram" href="{{ $teacher->userDetails ? $teacher->userDetails->youtube : '' }}"><i class="zmdi zmdi-youtube"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>           
        </div>
@endsection
