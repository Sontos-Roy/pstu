@extends('frontend.partials.app')
@section('content')
<div class="breadcrumb-area shadow dark text-center text-light" style="background-image: url('{{ getImage('settings', getSetting('pagebanner1')) }}'); background-size: cover; background-repeat: no-repeat;padding: 103px 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h2>Directors of Research Centers & Bureaus </h2>
                <ul class="breadcrumb">
                    <li><a href="{{ route('front.home') }}"><i class="fas fa-home"></i> Home</a></li>
                    <li class="active">Directors of Research Centers & Bureaus </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="advisor-area bg-gray default-padding bottom-less bg-cover">
    <div class="container">
        <div class="row">
            <div class="advisor-items col-3 text-light text-center">
                @foreach ($directors as $item)
                <div class="col-md-4 col-sm-6 single-item">
                    <a href="{{ route('front.user.profile', $item->user->id) }}">
                    </a>
                    <div class="item">
                        <a href="{{ route('front.user.profile', $item->user->id) }}">
                            <div class="thumb">
                                <img src="{{ getImage('teachers', $item->user->userDetails->image) }}" alt="Thumb">
                            </div>
                        </a>
                        <div class="info" style="height: 140px">
                            <a href="{{ route('front.user.profile', $item->user->id) }}">
                            </a><a href="{{ route('front.user.profile', $item->user->id) }}">
                            <span>{{ $item->name }}</span>
                            </a>
                            <h4>
                                <a href="{{ route('front.user.profile', $item->user->id) }}" target="_blank"> {{ $item->user->name }}
                                </a>
                            </h4>
                            <span>
                            </span>
                        </div>
                        <div class="text-center">
                            <a class="btn circle btn-dark border btn-sm" href="{{ route('front.user.profile', $item->user->id) }}" style="margin:10px;">Read More...<i class="fas fa-check-circle fa-2x fa-pull-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>

@endsection
