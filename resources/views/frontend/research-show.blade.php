@extends('frontend.partials.app')

@section('content')
    <div class="breadcrumb-area shadow dark text-center text-light" style="background-image: url('{{ getImage('settings', getSetting('pagebanner1')) }}'); background-repeat: no-repeat; padding: 103px 0;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h2>{{ $research->title }}</h2>
                    <ul class="breadcrumb">
                        <li><a href="{{ route('front.home') }}"><i class="fas fa-home"></i> Home</a></li>
                        <li class="active">{{ $research->title }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="course-details-area default-padding">
        <div class="container">
            <div class="row">
                <!-- Start Course Info -->
                <div class="col-md-8">
                    <div class="courses-info">
                        <div class="tags pull-right">
                            <a href="#" style="text-decoration: none !important;"><i class="fas fa-calendar-alt"></i>
                            Published: {{ date('d M Y', strtotime($research->created_at)) }}</a>
                        </div>
                        <div class="clearfix"></div>
                        <h3 class="">
                            {{ $research->title }}
                        </h3>
                        <div class="clearfix"></div>
                        <div class="tab-info">
                            <div class="tab-content tab-content-info">
                                <div id="tab1" class="tab-pane fade active in">
                                    <div class="info title text-justify colored-link">
                                        {{-- @if ($research->image)
                                        <img src="{{ getImage('researchs', $research->image) }}" alt="{{ $research->title }}" class="w-100">
                                        @endif --}}
                                        @if ($research->message)
                                        {!! $research->message !!}
                                        @endif
                                        @if ($research->file)
                                        <a href="{{ getPdf('researchs', $research->file) }}">মূল বিজ্ঞপ্তিটি দেখতে ক্লিক করুন...</a></p>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="top-author">
                        <h4>research</h4>
                        <div class="author-items">
                            @foreach ($researchs as $item)
                            <div class="item">
                                <div class=" text-justify">
                                    <h5> <a href="{{ route('front.researchs.show', $item->slug) }}" target="_blank">{{ $item->title }}</a></h5>
                                    <ul>
                                        <li class="border">
                                            <span>
                                            Published: {{ date('d M Y', strtotime($item->created_at)) }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @endforeach

                            <a href="{{ route('front.researchs') }}">View All <i class="fas fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <!-- Start Footer


@endsection
