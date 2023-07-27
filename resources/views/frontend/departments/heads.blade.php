@extends('frontend.partials.app')
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
                    <form action="{{ route('front.get.heads') }}" method="GET">
                        <div class="col-sm-4" style="margin-bottom: 20px;">
                            <input type="text" value="{{ request('name')??'' }}" placeholder="Enter Chairman Name" name="name" id="depatmentName" class="form-control">
                        </div>
                        <div class="col-sm-offset-2 col-sm-4" style="margin-bottom: 20px;">
                            <select name="faculty" id="facultyName" class="form-control">
                                <option value="">Select Faculty</option>
                                @foreach ($faculties as $item)
                                <option value="{{ $item->id }}" {{ $item->id==request('faculty') ?'selected':'' }}>{{ $item->title }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="col-sm-2" style="margin-bottom: 20px;">
                            <button type="submit" class="btn">Search</button>
                        </div>

                    </form>
                    <div class="clearfix"></div>
                    <div class="advisor-items col-3 text-light text-center" id="showData">

                        @forelse ($departments as $item)
                        <div class="col-md-4 col-sm-6 single-item">
                            <a href="{{ route('front.departments.show', $item->slug) }}">
                            </a>
                            <div class="item">
                                <a href="{{ route('front.departments.show', $item->slug) }}">
                                    <div class="thumb">
                                        <img src="{{ getImage('teachers', $item->user->userDetails->image) }}" alt="Thumb">
                                    </div>
                                </a>
                                <div class="info" style="height: 140px">
                                    <a href="{{ route('front.faculties.show', $item->faculty->slug) }}">
                                        {{ $item->faculty->title }}
                                    </a><a href="{{ route('front.departments.show', $item->slug) }}" target="_blank">
                                    <span>{{ $item->name }}</span>
                                    </a>
                                    <h4>{{ $item->user->name }}</h4>
                                    <span>
                                    </span>
                                </div>
                                <div class="text-center">
                                    <a class="btn circle btn-dark border btn-sm" href="{{ route('front.departments.show', $item->slug) }}" style="margin:10px;">Read More...<i class="fas fa-check-circle fa-2x fa-pull-right"></i></a>
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
