@extends('frontend.partials.app')

@section('content')
    <div class="breadcrumb-area shadow dark text-center text-light" style="background-image: url('{{ getImage('settings', getSetting('pagebanner1')) }}'); background-repeat: no-repeat; padding: 103px 0;">
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
    <div class="course-details-area default-padding">
        <div class="container">
            <div class="row">
                <!-- Start Course Info -->
                <div class="col-md-8">
                    <div class="courses-info">
                        <div class="tags pull-right">
                            <a href="#" style="text-decoration: none !important;"><i class="fas fa-calendar-alt"></i>
                            Published: {{ date('d M Y', strtotime($item->created_at)) }}</a>
                        </div>
                        <div class="clearfix"></div>
                        <h3 class="">
                            {{ $item->name }}
                        </h3>
                        <div class="clearfix"></div>
                        <div class="tab-info">
                            <div class="tab-content tab-content-info">
                                <div id="tab1" class="tab-pane fade active in">
                                    <div class="info title text-justify colored-link">
                                        @if ($item->image)
                                        <img src="{{ getImage('home_block_details', $item->image) }}" alt="{{ $item->title }}" class="w-100">
                                        @endif
                                        @if ($item->details)
                                        {!! $item->details !!}
                                        @endif
                                        @if ($item->file)
                                        <a href="{{ getPdf('home_block_details', $item->file) }}" class="text-danger">মূল বিজ্ঞপ্তিটি দেখতে ক্লিক করুন...</a></p>
                                        @endif
                                        <iframe src="{{ getPdf('home_block_details', $item->file) }}" width="100%" height="500px">
                                            This browser does not support PDFs. Please download the PDF to view it: <a href="{{ getPdf('home_block_details', $item->file) }}">Download PDF</a>
                                        </iframe>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="top-author">
                        <h4>All </h4>
                        <div class="author-items">
                            @foreach ($blocks as $block)
                            <div class="item">
                                <div class=" text-justify">
                                    <h5> <a href="{{ route('front.block.details.show', $item->slug) }}" target="_blank">{{ $item->name }}</a></h5>
                                    <ul>
                                        <li class="border">
                                            <span>
                                            Published: {{ date('d M Y', strtotime($item->created_at)) }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <!-- Start Footer


@endsection
