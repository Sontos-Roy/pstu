@extends('frontend.partials.app')
@section('content')
<div class="breadcrumb-area shadow dark text-center text-light" style="background-image: url('{{ getImage('settings', getSetting('pagebanner1')) }}'); background-size: cover; background-repeat: no-repeat;padding: 103px 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h2>{{ $data->title }}</h2>
                <ul class="breadcrumb">
                    <li><a href="{{ route('front.home') }}"><i class="fas fa-home"></i> Home</a></li>
                    <li class="active">{{ $data->title }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="course-details-area default-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="top-author">
                    <div class="author-items" style="border-top: 3px solid #1C4370;box-shadow:0 0 10px rgba(50, 50, 50, .17);">
                        <div class="col-sm-12 text-center">
                            <h3>Introduction to {{ $data->title }}</h3>
                        </div>
                        <div class="col-sm-3 col-lg-2">
                            <img src="{{ getImage('teachers', $data->user->userDetails->image) }}" alt="Thumb" class="img-thumbnail image-showing">
                        </div>
                        <div class="col-lg-10 col-sm-9">
                            <div class="margin-top-30px">
                                <h2 class="font-weight-bold" style="color:rgb(191 25 51)">{{ $data->title }}</h2>
                                <div class="clearfix"></div>
                                <h3 class="shadowLevel2">{{ $data->user->name }}</h3>
                                <h5>Dean of {{ $data->title }}</h5>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-sm-12 text-justify margin-top-30px">
                            {!! $data->introduction !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
