@extends('frontend.partials.app')

@section('content')
    <div class="breadcrumb-area shadow dark text-center text-light" style="background-image: url('{{ getImage('settings', getSetting('pagebanner1')) }}'); background-repeat: no-repeat; padding: 103px 0;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h2>{{ $notice->heading }}</h2>
                    <ul class="breadcrumb">
                        <li><a href="{{ route('front.home') }}"><i class="fas fa-home"></i> Home</a></li>
                        <li class="active">{{ $notice->heading }}</li>
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
                    <div class="event-items">
                       @foreach ($libraries as $item)
                       <div class="item col-sm-11" style="margin-bottom:30px">
                        <div style="border: 1px solid #eee;padding: 15px">
                           <div class="col-md-5 thumb">
                              <img src="{{ getImage('libraries', $item->image) }}">
                           </div>
                           <div class="col-md-7 info">
                              <div class="info-box">
                                 <div class="content">
                                    <h3> <a href="{{ $item->website }}">Science Library</a></h3>
                                    <p class="text-justify">
                                       {{ $item->short }}
                                    </p>
                                    <div class="bottom">
                                        <a href="{{ $item->website }}" target="_blank" class="btn circle btn-dark border btn-sm text-center">
                                        <i class="fas fa-chart-bar"></i> Website
                                        </a>
                                     </div>
                                 </div>
                              </div>
                           </div>
                           <div class="clearfix"></div>
                        </div>
                     </div>

                       @endforeach
                    </div>
                 </div>
            </div>
        </div>
    </div>





    <!-- Start Footer


@endsection
