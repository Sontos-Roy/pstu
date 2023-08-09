@extends('frontend.partials.app')

@section('content')
    <div class="breadcrumb-area shadow dark text-center text-light" style="background-image: url('{{ getImage('settings', getSetting('pagebanner1')) }}'); background-repeat: no-repeat; padding: 103px 0;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h2>Profile Of {{ $item->user->name }}</h2>
                    <ul class="breadcrumb">
                        <li><a href="{{ route('front.home') }}"><i class="fas fa-home"></i> Home</a></li>
                        <li class="active">Profile Of {{ $item->user->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="advisor-details-area default-padding">
        <div class="container">
            <div class="row">
                <div class="advisor-info">
                    <!-- Start Thumbnail -->
                    <div class="col-md-4">
                        <div class="thumb">
                            <img src="{{ getImage('teachers', $item->user->userDetails->image) }}" class="img-thumbnail" style="width: 100%;"
                            alt="Thumb" onerror="this.src='https://www.du.ac.bd/fontView/assets/img/default.png'">
                            <div class="info">
                                <h4>{{ $item->user->name }}</h4>
                                <span>(Professor &amp; Chairman)</span>
                                <h5>{{ $item->user->department ? $item->user->department->name : "" }}</h5>
                                <h4>Research Group</h4>
                                {{-- @if ($user->userDetails->)

                                @endif --}}
                                <a href=""><img src="{{ getImage('others', 'googlesc.png') }}" alt="" style="width: 40px; height: 40px;"></a>
                                <a href=""><img src="{{ getImage('others', 'reser.png') }}" alt="" style="width: 40px; height: 40px;"></a>
                                <a href=""><img src="{{ getImage('others', 'scopus.png') }}" alt="" style="width: 40px; height: 40px;"></a>
                                <p style="padding-top: 15px;">Personal Website And CV</p>
                                <a href=""><img src="{{ getImage('others', 'website.png') }}" alt="" style="width: 40px; height: 40px;"></a>
                                <a href=""><img src="{{ getImage('others', 'file.png') }}" alt="" style="width: 40px; height: 40px;"></a>
                                <p>Social</p>
                                <a href=""><img src="{{ getImage('others', 'facebook.png') }}" alt="" style="width: 40px; height: 40px;"></a>
                                <a href=""><img src="{{ getImage('others', 'twiter.png') }}" alt="" style="width: 40px; height: 40px;"></a>
                                <a href=""><img src="{{ getImage('others', 'in.png') }}" alt="" style="width: 40px; height: 40px;"></a>
                                <a href=""><img src="{{ getImage('others', 'youtube.png') }}" alt="" style="width: 40px; height: 40px;"></a>
                                <a href=""><img src="{{ getImage('others', 'insta.png') }}" alt="" style="width: 40px; height: 40px;"></a>
                            </div>
                        </div>
                    </div>
                    <!-- End Thumbnail -->
                    <!-- Start Content -->
                    <div class="col-md-8 content">
                        <div class="course-info-list text-justify">
                        </div>
                        <div class="course-info-list text-justify">
                            <div class="tab-info">
                                @if($item->user)
                                <!-- Tab Nav -->
                                <ul class="nav nav-pills">

                                    <li class="active">
                                        <a data-toggle="tab" href="#educationInfo" aria-expanded="true">
                                        Education
                                        </a>
                                    </li>

                                    <li>
                                        <a data-toggle="tab" href="#experience" aria-expanded="false">
                                        Experience
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#researchActivities" aria-expanded="false">
                                        Research Activities
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#membershipInfo" aria-expanded="false">
                                        Membership
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#publicationInfo" aria-expanded="false">
                                        Publication
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#awardInfo" aria-expanded="false">
                                        Award
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#contactInfo" aria-expanded="false">
                                        Contact
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content tab-content-info">
                                    <div id="educationInfo" class="tab-pane fade active in">
                                        <div class="info title">
                                            <div class="table-responsive">
                                                <table class="table table-striped ">
                                                    <thead>
                                                        <tr>
                                                            <th nowrap="">Degree Name</th>
                                                            <th>Group/Major Subject</th>
                                                            <th>Board/Institute</th>
                                                            <th>Country</th>
                                                            <th nowrap="">Passing Year</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse($item->user->educations as $edu)
                                                        <tr>
                                                            <td>{{ $edu->degree_name}}</td>
                                                            <td>{{ $edu->mejor_subject}}</td>
                                                            <td>{{ $edu->institute}}</td>
                                                            <td>{{ $edu->country}}</td>
                                                            <td>{{ $edu->passing_year}}</td>
                                                        </tr>
                                                        @empty
                                                        <tr>
                                                            <td colspan="5" class="text-center"> No education
                                                                information is found.
                                                            </td>
                                                        </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Tab -->
                                    <!-- Single Tab -->
                                    <div id="experience" class="tab-pane fade">
                                        <div class="info title">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Title</th>
                                                        <th>Organization</th>
                                                        <th>Location</th>
                                                        <th class="width10per" nowrap="">From Date</th>
                                                        <th class="width10per">To Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($item->user->experiences as $exp)
                                                    <tr>
                                                        <td>{{ $exp->title}}</td>
                                                        <td>{{ $exp->organization}}</td>
                                                        <td>{{ $exp->location}}</td>
                                                        <td>{{ $exp->from_date}}</td>
                                                        <td>{{ $exp->to_date}}</td>
                                                    </tr>

                                                    @empty
                                                    <tr>
                                                        <td colspan="6" class="text-center"> No experience is found</td>
                                                    </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div id="researchActivities" class="tab-pane fade">
                                        <div class="info title">
                                            <h3 class="text-center padding-5px">Research Interest</h3>
                                            <table class="table table-striped width100per">
                                                <thead>
                                                    <tr>
                                                        <th>Subject</th>
                                                        <th>Description</th>
                                                        <th>Research Interest (Goal, Target Indicator)</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($item->user->research_interests as $res)
                                                    <tr>
                                                        <td>{{ $res->subject}}</td>
                                                        <td>{{ $res->description}}</td>
                                                        <td>{{ $res->research}}</td>
                                                    </tr>
                                                    @empty
                                                    <tr>
                                                        <td colspan="2" class="text-center"> No research interest is
                                                            found
                                                        </td>
                                                    </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                            <div class="clearfix"></div>
                                            <h3 class="text-center default-padding-top ">Project/Research Supervision
                                            </h3>
                                            <div class="clearfix"></div>
                                            <table class="table table-striped width100per">
                                                <thead>
                                                    <tr>
                                                        <th>Level of Study</th>
                                                        <th>Title</th>
                                                        <th>Supervisor</th>
                                                        <th>Co-Supervisor(s)</th>
                                                        <th>Name of Student(s)</th>
                                                        <th>Area of Research</th>
                                                        <th>Current Completion</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($item->user->research_supervisions as $edu)
                                                    <tr>
                                                        <td>{{ $edu->level_of_study}}</td>
                                                        <td>{{ $edu->title}}</td>
                                                        <td>{{ $edu->supervisor}}</td>
                                                        <td>{{ $edu->co_supervisor}}</td>
                                                        <td>{{ $edu->no_of_student}}</td>
                                                        <td>{{ $edu->area_research}}</td>
                                                        <td>{{ $edu->current_completion}}</td>
                                                    </tr>
                                                    @empty

                                                    <tr>
                                                        <td colspan="7" class="text-center"> No project/research
                                                            supervision is
                                                            found
                                                        </td>
                                                    </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                            <div class="clearfix"></div>
                                            <div>
                                                <h3 class="text-center default-padding-top"> Project/Research Work</h3>
                                            </div>
                                            <div class="clearfix"></div>
                                            <table class="table table-striped width100per">
                                                <thead>
                                                    <tr>
                                                        <th>Subject</th>
                                                        <th>Project Name</th>
                                                        <th>Source of Fund</th>
                                                        <th class="width10per">From Date</th>
                                                        <th class="width10per">To Date</th>
                                                        <th>Collaboration</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($item->user->publications as $pub)
                                                    <tr>
                                                        <td>{{$pub->subject}}</td>
                                                        <td>{{$pub->project_name}}</td>
                                                        <td>{{$pub->source}}</td>
                                                        <td>{{$pub->from_date}}</td>
                                                        <td>{{$pub->to_date}}</td>
                                                        <td>{{$pub->collaboration}}</td>
                                                    </tr>
                                                    @empty
                                                    <tr>
                                                        <td colspan="6" class="text-center"> No project/research work is
                                                            found
                                                        </td>
                                                    </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                            <div class="clearfix"></div>
                                            <div>
                                                <h3 class="text-center default-padding-top">Invited Talk</h3>
                                            </div>
                                            <div class="clearfix"></div>
                                            <table class="table table-striped width100per">
                                                <thead>
                                                    <tr>
                                                        <th class="width2per">SL</th>
                                                        <th>Invited Talk</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td colspan="2" class="text-center"> No invited talk is found
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div id="membershipInfo" class="tab-pane fade">
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th class="width2per">SL</th>
                                                        <th class="width30per"> Collaboration &amp; Membership Name</th>
                                                        <th class="width20per">Type</th>
                                                        <th class="width20per">Membership Year</th>
                                                        <th class="width20per"> Expire Year</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($item->user->memberships as $mem)
                                                    <tr>
                                                        <td>{{ $mem->name}}</td>
                                                        <td>{{ $mem->type}}</td>
                                                        <td>{{ $mem->membership_year}}</td>
                                                        <td>{{ $mem->expire_year}}</td>
                                                    </tr>
                                                    @empty
                                                    <tr>
                                                        <td colspan="5" class="text-center"> No Collaboration &amp;
                                                            Membership is found
                                                        </td>
                                                    </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div id="publicationInfo" class="tab-pane fade">
                                        <table class="table  width100per">
                                            <tbody>
                                                <tr>
                                                    <th class="width10per" nowrap="">Name</th>
                                                    <th class="width25per">Info</th>
                                                    <th class="width7per">Date</th>
                                                    <th class="width7per">Link</th>
                                                    <th>Pdf view</th>
                                                </tr>

                                                @forelse($item->user->projects as $mem)
                                                <tr>
                                                    <td>{{ $mem->name}}</td>
                                                    <td>{{ $mem->info}}</td>
                                                    <td>{{ $mem->date}}</td>
                                                    <td><a href="{{ $mem->link}}"> View </a>Link</td>
                                                    <td><a href="{{getPdf('projects',$mem->pdf_file)}}"> View </a></td>
                                                </tr>
                                                @empty

                                                <tr>
                                                    <td colspan="6" class="text-center"> No publication is found.</td>
                                                </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                    <div id="awardInfo" class="tab-pane fade">
                                        <div class="info title">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th class="width10per" nowrap="">Award Type</th>
                                                        <th class="width25per">Title</th>
                                                        <th class="width7per">Year</th>
                                                        <th class="width7per">Country</th>
                                                        <th>Description</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($item->user->awards as $award)
                                                    <tr>
                                                        <td>{{ $award->type}}</td>
                                                        <td>{{ $award->title}}</td>
                                                        <td>{{ $award->year}}</td>
                                                        <td>{{ $award->country}}</td>
                                                        <td>{{ $award->description}}</td>
                                                    </tr>
                                                    @empty
                                                    <tr>
                                                        <td colspan="5" class="text-center"> No award information is
                                                            found
                                                        </td>
                                                    </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div id="contactInfo" class="tab-pane fade">
                                        <div class="info title">
                                            <div class="col-lg-10 col-md-9 col-sm-6 col-xs-12">
                                                <div class="bold font-size-18px">Dr. (Mrs.) Supriya Saha</div>
                                                <div style="font-size:13px;">
                                                    {{ $item->user->name }}
                                                </div>
                                                <div style="font-size:13px;">
                                                    Department of {{ $item->user && $item->user->department ? $item->user->department->name:'' }}
                                                </div>
                                                <div style="font-size:13px;">
                                                    Faculty of {{ $item->user && $item->user->faculty ? $item->user->faculty->title:'' }}
                                                </div>
                                                <div style="font-size:13px;">
                                                    Email: {{ $item->user->email }}
                                                </div>
                                                <div style="font-size:13px;">
                                                    Phone: {{ $item->user->userDetails ? $item->user->userDetails->phone : '' }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
