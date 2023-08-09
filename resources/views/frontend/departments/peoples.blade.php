@extends('frontend.partials.app')
@push('department')
    {{ $department->name }}
@endpush
@section('content')
<div class="breadcrumb-area shadow dark text-center text-light" style="background-image: url('{{ getImage('settings', getSetting('pagebanner1')) }}'); background-size: cover; background-repeat: no-repeat;padding: 103px 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h2>Departments</h2>
                <ul class="breadcrumb">
                    <li><a href="{{ route('front.home') }}"><i class="fas fa-home"></i> Home</a></li>
                    <li class="active">Departments</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="advisor-area bg-gray default-padding bottom-less bg-cover">
    <div class="container">
        <div class="row">
            <div class="panel panel-primary ">
                <div class="panel-heading" id="heading-gradiant">
                    <div class="col-sm-10">
                        Chairman of Departments
                    </div>

                    <div class="clearfix"></div>
                </div>
                <div class="panel-body text-justify">
                    <form action="{{ route('front.departments.peoples', $department->slug) }}" method="GET">
                        <div class="col-sm-4" style="margin-bottom: 20px;">
                            <input type="text" value="{{ request('name')??'' }}" placeholder="Enter Chairman Name" name="name" id="depatmentName" class="form-control">
                        </div>

                        <div class="col-sm-2" style="margin-bottom: 20px;">
                            <button type="submit" class="btn">Search</button>
                        </div>

                    </form>
                    <div class="clearfix"></div>
                    <div class="advisor-items col-3 text-light text-center" id="showData">

                        @forelse ($peoples as $people)
                        <div class="col-md-4 col-sm-6 single-item">
                            <a href="{{ route('front.user.profile', $people->id) }}">
                            </a>
                            <div class="item">
                                <a href="{{ route('front.user.profile', $people->id) }}">
                                    <div class="thumb">
                                        <img src="{{ getImage('teachers', $people->userDetails->image) }}" alt="Thumb">
                                    </div>
                                </a>
                                <div class="info" style="height: 140px">
                                    <a href="{{ route('front.user.profile', $people->id) }}" target="_blank">
                                    <span>{{ $people->name }}</span>
                                    </a>
                                    <h4>{{ $people->name }}</h4>
                                    <span>
                                    </span>
                                </div>
                                <div class="text-center">
                                    <a class="btn circle btn-dark border btn-sm" href="{{ route('front.user.profile', $people->id) }}" style="margin:10px;">View Profile...<i class="fas fa-check-circle fa-2x fa-pull-right"></i></a>
                                </div>
                            </div>
                        </div>
                        @empty
                        <h4 class="text-center"><strong>Not Found</strong></h4>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
