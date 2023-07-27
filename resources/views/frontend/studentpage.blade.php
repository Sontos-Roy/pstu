@extends('frontend.partials.app')

@section('content')
    <div class="breadcrumb-area shadow dark text-center text-light" style="background-image: url('{{ getImage('settings', getSetting('pagebanner1')) }}'); background-repeat: no-repeat; padding: 103px 0;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h2>{{ $item->title }}</h2>
                    <ul class="breadcrumb">
                        <li><a href="{{ route('front.home') }}"><i class="fas fa-home"></i> Home</a></li>
                        <li class="active">{{ $item->title }}</li>
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

                        </div>
                        <div class="clearfix"></div>
                        <h3 class="">
                            {{ $item->title }}
                        </h3>
                        <div class="clearfix"></div>
                        <div class="tab-info">
                            <div class="tab-content tab-content-info">
                                <div id="tab1" class="tab-pane fade active in">
                                    <div class="info title text-justify colored-link">
                                        @if ($item->image)
                                        <img src="{{ getImage('students', $item->image) }}" alt="{{ $item->title }}" class="w-100">
                                        @endif
                                        @if ($item->details)
                                        {!! $item->details !!}
                                        @endif
                                        @if ($item->pdf)
                                        <a href="{{ getPdf('students', $item->file) }}">মূল বিজ্ঞপ্তিটি দেখতে ক্লিক করুন...</a></p>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>





    <!-- Start Footer


@endsection
