@extends('frontend.partials.app')
@push('department')
    {{ $department->name }}
@endpush
@section('content')
<div class="banner-area">
    <div id="bootcarousel" class="carousel text-center content-less text-light top-pad-30 text-dark slide animate_text" data-ride="carousel">

        <!-- Wrapper for slides -->
        <div class="carousel-inner carousel-zoom">
            @foreach ($sliders as $key => $slide)
            <div class="item {{ $key == 0 ? 'active': '' }} bg-cover" style="background-image: url('{{ getImage('sliders', $slide->image) }}');">
                <div class="box-table">
                    <div class="box-cell shadow dark">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="content">
                                        <h2 data-animation="animated fadeInLeft">{{ $slide->head }}</h2>
                                        @if ($slide->first_btn)
                                        <a data-animation="animated fadeInDown" class="btn btn-light border btn-md" href="{{ $slide->first_btn_link }}">{{ $slide->first_btn }}</a>
                                        @endif
                                        @if ($slide->second_btn)
                                        <a data-animation="animated fadeInUp" class="btn btn-light effect btn-md" href="{{ $slide->second_btn_link }}">{{ $slide->second_btn }}</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- End Wrapper for slides -->

        <!-- Left and right controls -->
        <a class="left carousel-control shadow" href="#bootcarousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control shadow" href="#bootcarousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<div class="features-area bottom-less" style="margin-top: 15px;">
    <div class="container">
        <div class="row">
            <div class="features">
                <div data-aos="fade-left" class="equal-height col-md-3 col-sm-6" style="height: 320px;">
                    <div class="item mariner">
                        <a href="#">
                            <div style="height: 220px;" class="info">

                                <p>
                                    <img src="{{ getImage('teachers', $department->user->userDetails->image) }}" height="180" width="200" alt="{{ $department->title }}">
                                </p>
                                <p class="text-center" style="font-weight: bold; font-size: 14px;"> {{ $department->user->name }}</p>
                                <p class="text-center"><strong>head Of Department</strong></p>
                            </div>
                        </a>
                    </div>
                </div>
                <div data-aos="fade-up" class="equal-height col-md-9 col-sm-6" style="height: 320px;">
                    <div class="item brilliantrose">
                        <a href="{{ route('front.departments.intro', $department->slug) }}">
                            <div style="height: 220px;" class="info">
                                <h4>Introduction to the Department</h4>
                                {{ $department->short }}
                                <strong class="text-info">Read More</strong>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="blog-area default-padding bottom-less">
    <div class="container">
       <div class="row">
          <div class="site-heading text-center">
             <div class="col-md-8 col-md-offset-2">
                <h2>Programs of this Department</h2>
             </div>
          </div>
       </div>
       <div class="row">
          <div class="blog-items event-carousel owl-theme owl-carousel">
             <!-- Single Item -->
             <!-- End Single Item -->
            @foreach ($programs as $program)
            <div data-aos="zoom-in-up" class="equal-height aos-init aos-animate" style="height: 550px;">
                <div class="item">
                    <!--<div class="thumb">-->
                    <!--    @if ($department->image)-->
                    <!--    <img src="{{ getImage('programs', $program->image) }}" style="height:250px;" alt="{{$program->title }}">-->
                    <!--    @else-->
                    <!--    <img src="{{ getImage('faculties', $department->image) }}" style="height:250px;" alt="{{$program->title }}">-->

                    <!--    @endif-->

                    <!--</div>-->
                    <div class="info">
                        <div class="info-box" style="padding:35px 35px">

                            <div class="content" style="margin-left: 0px; padding: 0">
                                <h4 class="text-left " style="height: 50px; word-spacing: 5px">
                                    <a href="{{ route('front.programs.show', $program->slug) }}">{{ StrLimit($program->title, 70) }}</a>
                                </h4>
                                <p style="height: 100px">
                                    {{ StrLimit($program->short, 150) }}
                                </p>
                                <div class="bottom" style="margin-top: 20px">
                                    <div class="col-sm-12">
                                        <a href="{{ route('front.programs.show', $program->slug) }}" class="btn circle btn-dark border btn-sm text-center">
                                            <i style="color: #1C4370" class="fas fa-plus"></i> Read More
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
          </div>
          <br>
          <div class="more-btn col-md-12 text-center">
            <a href="{{ route('front.departments') }}" class="btn btn-theme effect btn-md">View All Departments</a>
        </div>
       </div>
    </div>
 </div>

@endsection
