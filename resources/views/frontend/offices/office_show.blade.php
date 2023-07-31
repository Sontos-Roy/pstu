@extends('frontend.partials.app')

@section('content')
<div class="breadcrumb-area shadow dark text-center text-light" style="background-image: url('{{ getImage('settings', getSetting('pagebanner1')) }}'); background-size: cover; background-repeat: no-repeat;padding: 103px 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h2>{{ $office->name }}</h2>
                <ul class="breadcrumb">
                    <li><a href="{{ route('front.home') }}"><i class="fas fa-home"></i> Home</a></li>
                    <li class="active">{{ $office->name }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="course-details-area default-padding">
    <div class="container">
        <div class="row">
            <!-- Start Course Info -->
            <div class="col-md-12">
                <div class="courses-info" style="border-right: none;">
                    <!-- Star Tab Info -->
                    <div class="tab-info">
                        <!-- Tab Nav -->
                        <ul class="nav nav-pills">
                            <li class="active">
                                <a data-toggle="tab" href="#tab1" aria-expanded="true">
                                About
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab2" aria-expanded="false">
                                People
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab3" aria-expanded="false">
                                Contact
                                </a>
                            </li>
                        </ul>
                        <!-- End Tab Nav -->
                        <!-- Start Tab Content -->
                        <div class="tab-content tab-content-info">
                            <!-- Single Tab -->
                            <div id="tab1" class="tab-pane fade active in">
                                <div class="info title">
                                    <div class="top-author">
                                        <div class="author-items" style="border-top: 3px solid #1C4370;box-shadow:0 0 10px rgba(50, 50, 50, .17);">
                                            <div class="col-lg-10 col-sm-9">
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="col-sm-12 text-justify margin-top-30px">
                                                {!! $office->details !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Tab -->
                            <!-- Single Tab -->
                            <div id="tab2" class="tab-pane fade">
                                <div class="info title">
                                    <div class="advisor-area bottom-less bg-cover">
                                        <div class="container">
                                            <div class="row">
                                                <div class="advisor-items col-3 text-light text-center">
                                                    <!-- Single item -->
                                                    @foreach ($office->users as $user)
                                                    <div class="col-md-6 single-item">
                                                        <div class="item">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="thumb">
                                                                        <img src="{{ getImage('teachers', $user->userDetails->image) }}" alt="Thumb" style="min-height: 200px">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6" style="text-align: center; margin-top: 12%;">
                                                                    <p style="color: black; font-style: italic; font-weight: bold">
                                                                        {{ $user->name }}
                                                                    </p>
                                                                    <p style="color: black">{{ $user->userDetails->position }}</p>
                                                                    <p style="color: black">
                                                                        <i class="fas fa-phone"></i>   {{ $user->userDetails->phone }}
                                                                    </p>
                                                                    <p style="color: black"><i class="fas fa-envelope-square"></i> {{ $user->email }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach

                                                    <!-- End Single item -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Tab -->
                            <!-- Single Tab -->
                            <div id="tab3" class="tab-pane fade">
                                <div class="info title">
                                    <div class="top-author">
                                        <div class="author-items" style="border-top: 3px solid #1C4370;box-shadow:0 0 10px rgba(50, 50, 50, .17);">
                                            <div class="field-item even">
                                                {!! $office->contact !!}

                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Tab -->
                        </div>
                        <!-- End Tab Content -->
                    </div>
                    <!-- End Tab Info -->
                </div>
            </div>
            <!-- End Course Info -->
        </div>
    </div>
</div>

@endsection
