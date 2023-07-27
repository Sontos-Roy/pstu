@extends('frontend.partials.app')
@section('content')
<div class="breadcrumb-area shadow dark text-center text-light" style="background-image: url('{{ getImage('settings', getSetting('pagebanner1')) }}'); background-size: cover; background-repeat: no-repeat;padding: 103px 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h2>Faculties</h2>
                <ul class="breadcrumb">
                    <li><a href="{{ route('front.home') }}"><i class="fas fa-home"></i> Home</a></li>
                    <li class="active">Faculties</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="course-details-area default-padding">
    <div class="container">
        <div class="row">
                @foreach ($faculties as $item)
                <div data-aos="fade-left" class="col-md-4 col-sm-6 equal-height aos-init aos-animate" style="height: 480px;">
                    <div class="item">
                        <div class="thumb">
                            <img src="{{ getImage('faculties', $item->image) }}" alt="Thumb" style="height: 281px;">

                        </div>
                        <div class="info">
                            <h4 class="min-height-45px text-left" style="word-spacing: 3px; font-weight: bold; margin-top: 10px;">
                                <a href="{{ route('front.faculties.show', $item->slug) }}">{{ $item->title }}</a>
                            </h4>
                            <div class="footer-meta">
                                <a class="btn btn-theme effect btn-block btn-lg btnhome" href="{{ route('front.faculties.show', $item->slug) }}">View Faculty...<i class="fas fa-check-circle fa-2x fa-pull-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
        </div>
    </div>
</div>

@endsection
