@extends('frontend.departments.partials.app')
@section('content')
<div class="breadcrumb-area shadow dark text-center text-light" style="background-image: url('{{ getImage('settings', getSetting('pagebanner1')) }}'); background-size: cover; background-repeat: no-repeat;padding: 103px 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h2>{{ $item->name }}</h2>
                <ul class="breadcrumb">
                    <li><a href="{{ route('front.home') }}"><i class="fas fa-home"></i> Home</a></li>
                    <li class="active">{{ $item->name }}</li>
                </ul>
            </div>
        </div>
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
                                    <img src="{{ getImage('teachers', $item->user->userDetails->image) }}" height="180" width="200" alt="{{ $item->title }}">
                                </p>
                                <p class="text-center" style="font-weight: bold; font-size: 14px;"> {{ $item->user->name }}</p>
                                <p class="text-center"><strong>head Of Department</strong></p>
                            </div>
                        </a>
                    </div>
                </div>
                <div data-aos="fade-up" class="equal-height col-md-9 col-sm-6" style="height: 320px;">
                    <div class="item brilliantrose">
                        <a href="{{ route('front.departments.intro', $item->slug) }}">
                            <div style="height: 220px;" class="info">
                                <h4>Introduction to the Department</h4>
                                {{ $item->short }}
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
                    <!--    @if ($item->image)-->
                    <!--    <img src="{{ getImage('programs', $program->image) }}" style="height:250px;" alt="{{$program->title }}">-->
                    <!--    @else-->
                    <!--    <img src="{{ getImage('faculties', $item->image) }}" style="height:250px;" alt="{{$program->title }}">-->

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
