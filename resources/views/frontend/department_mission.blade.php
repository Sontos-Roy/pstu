@extends('frontend.partials.app')
@push('department')
{{ $item->name }}
@endpush
@section('content')
<div class="breadcrumb-area shadow dark text-center text-light" style="background-image: url('{{ getImage('settings', getSetting('pagebanner1')) }}'); background-size: cover; background-repeat: no-repeat;padding: 103px 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h2>Mission And Vision</h2>
                <ul class="breadcrumb">
                    <li><a href="{{ route('front.home') }}"><i class="fas fa-home"></i> Home</a></li>
                    <li class="active">Mission And Vision</li>
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

                        <div class="col-sm-12 text-justify margin-top-30px">
                            {!! $data?$data->details:'' !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
