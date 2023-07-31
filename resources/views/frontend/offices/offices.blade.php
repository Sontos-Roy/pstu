@extends('frontend.partials.app')
@section('content')
<div class="breadcrumb-area shadow dark text-center text-light" style="background-image: url('{{ getImage('settings', getSetting('pagebanner1')) }}'); background-size: cover; background-repeat: no-repeat;padding: 103px 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h2>All Offices</h2>
                <ul class="breadcrumb">
                    <li><a href="{{ route('front.home') }}"><i class="fas fa-home"></i> Home</a></li>
                    <li class="active">All Offices</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<style>
    .panel-title>a, .panel-title>a:active {
    display: block;
    padding: 15px;
    color: #555;
    font-size: 16px;
    font-weight: bold;
    /* text-transform: uppercase; */
    letter-spacing: 1px;
    word-spacing: 3px;
    text-decoration: none;
}
.panel-heading a:before {
    font-family: 'Font Awesome 5 Free';
    content: "\f13a ";
    float: right;
    transition: all 0.5s;
}
.panel-heading.active a:before {
    -webkit-transform: rotate(180deg);
    -moz-transform: rotate(180deg);
    transform: rotate(180deg);
}

</style>
<div class="course-details-area default-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="courses-info">
                    <div class="tab-info">
                        <div class="tab-content tab-content-info">
                            <div id="tab1" class="tab-pane fade active in">
                                <div class="info title text-justify">
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-body text-justify">
                                        <div class="wrapper center-block">
                                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                                @foreach ($offices as $office)
                                                <div class="panel panel-default">
                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="{{ route('front.office.show', $office->slug) }}" data-target="#collapseOne_OVC" aria-expanded="true" aria-controls="collapseOne">
                                                            {{ $office->name }}
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseOne_OVC" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                                    </div>
                                                </div>
                                                @endforeach


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="aside">
                    <div class="sidebar-item category">
                        <div class="title">
                            <h4>About University</h4>
                        </div>
                        <ul>
                            <li><a href="{{ route('front.historic.outline') }}">Historical Outline</a></li>
                            <li><a href="{{ route('front.university.glance') }}">University at a Glance</a></li>
                            <li><a href="{{ route('front.honoris.causa') }}">Honoris Causa</a></li>
                            <li><a href="{{ route('front.vice.chencellors.message', 'vice-chancellor') }}">Message from the Vice Chancellor</a></li>
                            <li><a href="{{ route('front.vice.chencellors') }}">List of Vice Chancellors</a></li>
                        </ul>
                    </div>
                    <div class="sidebar-item category">
                        <div class="title">
                            <h4>DU Leadership</h4>
                        </div>
                        <ul>
                            @foreach (LeaderShips() as $leader)
                            <li><a href="{{ route('front.vice.chencellors.message', $leader->slug) }}">{{ $leader->designation }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="sidebar-item category">
                        <div class="title">
                            <h4>Governance Framework</h4>
                        </div>
                        <ul>
                            <li><a href="{{ route('front.university.ordinances') }}">University Ordinance</a></li>
                            <li><a href="">Senate Members</a></li>
                            <li><a href="">Syndicate Members</a></li>
                            <li><a href="">University Statutes</a></li>
                            <li><a href="">Finance Committee</a></li>
                            <li><a href="">Academic Council</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
