@extends('frontend.partials.app')

@section('content')
    <div class="breadcrumb-area shadow dark text-center text-light" style="background-image: url('{{ getImage('settings', getSetting('pagebanner1')) }}'); background-repeat: no-repeat; padding: 103px 0;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h2>Notices</h2>
                    <ul class="breadcrumb">
                        <li><a href="{{ route('front.home') }}"><i class="fas fa-home"></i> Home</a></li>
                        <li class="active">Notices</li>
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
                            Published: {{ date('d M Y', strtotime($notice->created_at)) }}</a>
                        </div>
                        <div class="clearfix"></div>
                        <h3 class="">
                            {{ $notice->title }}
                        </h3>
                        <div class="clearfix"></div>
                        <div class="tab-info">
                            <div class="tab-content tab-content-info">
                                <div id="tab1" class="tab-pane fade active in">
                                    <div class="info title text-justify colored-link">
                                        @if ($notice->image)
                                        <img src="{{ getImage('notices', $notice->image) }}" alt="{{ $notice->title }}" class="w-100">
                                        @endif
                                        @if ($notice->message)
                                        {!! $notice->message !!}
                                        @endif
                                        @if ($notice->file)
                                        <a href="{{ getPdf('notices', $notice->file) }}">মূল বিজ্ঞপ্তিটি দেখতে ক্লিক করুন...</a></p>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="top-author">
                        <h4>Notice</h4>
                        <div class="author-items">
                            @foreach ($notices as $item)
                            <div class="item">
                                <div class=" text-justify">
                                    <h5> <a href="{{ route('front.notices.show', $item->slug) }}" target="_blank">{{ $item->title }}</a></h5>
                                    <ul>
                                        <li class="border">
                                            <span>
                                            Published: {{ date('d M Y', strtotime($item->created_at)) }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @endforeach

                            <a href="{{ route('front.notices') }}">View All <i class="fas fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <!-- Start Footer


@endsection
@extends('frontend.partials.app')

@section('content')
    <div class="breadcrumb-area shadow dark text-center text-light" style="background-image: url('{{ getImage('settings', getSetting('pagebanner1')) }}'); background-repeat: no-repeat; padding: 103px 0;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h2>Notices</h2>
                    <ul class="breadcrumb">
                        <li><a href="{{ route('front.home') }}"><i class="fas fa-home"></i> Home</a></li>
                        <li class="active">Notices</li>
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
                            Published: {{ date('d M Y', strtotime($notice->created_at)) }}</a>
                        </div>
                        <div class="clearfix"></div>
                        <h3 class="">
                            {{ $notice->title }}
                        </h3>
                        <div class="clearfix"></div>
                        <div class="tab-info">
                            <div class="tab-content tab-content-info">
                                <div id="tab1" class="tab-pane fade active in">
                                    <div class="info title text-justify colored-link">
                                        @if ($notice->image)
                                        <img src="{{ getImage('notices', $notice->image) }}" alt="{{ $notice->title }}" class="w-100">
                                        @endif
                                        @if ($notice->message)
                                        {!! $notice->message !!}
                                        @endif
                                        @if ($notice->file)
                                        <a href="{{ getPdf('notices', $notice->file) }}">মূল বিজ্ঞপ্তিটি দেখতে ক্লিক করুন...</a></p>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="top-author">
                        <h4>Notice</h4>
                        <div class="author-items">
                            @foreach ($notices as $item)
                            <div class="item">
                                <div class=" text-justify">
                                    <h5> <a href="{{ route('front.notices.show', $item->slug) }}" target="_blank">{{ $item->title }}</a></h5>
                                    <ul>
                                        <li class="border">
                                            <span>
                                            Published: {{ date('d M Y', strtotime($item->created_at)) }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @endforeach

                            <a href="{{ route('front.notices') }}">View All <i class="fas fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <!-- Start Footer


@endsection
