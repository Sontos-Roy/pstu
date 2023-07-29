@extends('frontend.partials.app')

@section('content')
<div class="banner-area">
    <div id="bootcarousel" class="carousel text-center content-less text-light top-pad-30 text-dark slide animate_text" data-ride="carousel">

        <!-- Wrapper for slides -->
        <div class="breadcrumb-area shadow dark text-center text-light" style="background-image: url('{{ getImage('settings', getSetting('pagebanner1')) }}'); background-size: cover; background-repeat: no-repeat;padding: 103px 0;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <h2>{{ $institute->name }}</h2>
                        <ul class="breadcrumb">
                            <li><a href="{{ route('front.home') }}"><i class="fas fa-home"></i> Home</a></li>
                            <li class="active">{{ $institute->name }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Wrapper for slides -->

        <!-- Left and right controls -->
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
                                    <img src="{{ getImage('teachers', $institute->user->userDetails->image) }}" height="180" width="200" alt="{{ $institute->name }}">
                                </p>
                                <p class="text-center" style="font-weight: bold; font-size: 14px;"> {{ $institute->user->name }}</p>
                                <p class="text-center"><strong>Director of Insitute</strong></p>
                            </div>
                        </a>
                    </div>
                </div>
                <div data-aos="fade-up" class="equal-height col-md-9 col-sm-6" style="height: 320px;">
                    <div class="item brilliantrose">
                        <a href="{{ route('front.institutes.intro', $institute->slug) }}">
                            <div style="height: 220px;" class="info">
                                <h4>Introduction of Institute</h4>
                                {{ StrLimit($institute->short, 800) }}
                                <strong class="text-info">Read More</strong>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection
