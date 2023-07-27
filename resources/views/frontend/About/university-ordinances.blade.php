@extends('frontend.partials.app')
@section('content')
<div class="breadcrumb-area shadow dark text-center text-light" style="background-image: url('{{ getImage('settings', getSetting('pagebanner1')) }}'); background-size: cover; background-repeat: no-repeat;padding: 103px 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h2>University Ordinances</h2>
                <ul class="breadcrumb">
                    <li><a href="{{ route('front.home') }}"><i class="fas fa-home"></i> Home</a></li>
                    <li class="active">University Ordinances</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<style>
    .card{
        padding: 10px;
        box-shadow: 0px 2px 9px 2px #5f5e5ea3;
    }
</style>
<div class="course-details-area default-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <!-- Single Item -->
                @foreach ($items as $item)
                <div class="col-md-4 col-sm-6 equal-height" style="height: 161px;">
                    <div class="item">
                        <div class="card shadow">
                            <h4>
                                <a href="{{ getPdf('university-ordinances', $item->file) }}">Calendar Part- 1</a>
                            </h4>
                            <div class="footer-meta">
                                <a class="btn btn-theme effect btn-sm" href="{{ getPdf('university-ordinances', $item->file) }}">Click Here</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            @include('frontend.About.sidebar')
        </div>
    </div>
</div>

@endsection
