@extends('frontend.partials.app')
@section('content')
<div class="breadcrumb-area shadow dark text-center text-light" style="background-image: url('{{ getImage('settings', getSetting('pagebanner1')) }}'); background-repeat: no-repeat; padding: 103px 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h2>{{$item->title}}</h2>
                <ul class="breadcrumb">
                    <li><a href="{{ route('front.home') }}"><i class="fas fa-home"></i> Home</a></li>
                    <li class="active">{{$item->title}}</li>
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
                <div class="courses-info">
                    <div class="tags pull-right">
                        <a href="#" style="text-decoration: none !important;"><i class="fas fa-calendar-alt"></i>
                        Published: {{ date('d M Y', strtotime($item->created_at)) }}</a>
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
                                    <img src="{{ getImage('pages', $item->image) }}" alt="{{ $item->title }}" class="w-100">
                                    @endif
                                    @if ($item->details)
                                    {!! $item->details !!}
                                    @endif

                                </div>
                                <div class="info title text-justify colored-link">
                                    @if ($item->pdf_file)
                                    <a href="{{ getPdf('pages', $item->pdf_file) }}" target="_blank" class="btn btn-sm btn-primary"> Pdf Download</a>
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
@endsection
