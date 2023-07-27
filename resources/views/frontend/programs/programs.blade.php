@extends('frontend.partials.app')
@section('content')
<div class="breadcrumb-area shadow dark text-center text-light" style="background-image: url('{{ getImage('settings', getSetting('pagebanner1')) }}'); background-size: cover; background-repeat: no-repeat;padding: 103px 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h2>Academic Program</h2>
                <ul class="breadcrumb">
                    <li><a href="{{ route('front.home') }}"><i class="fas fa-home"></i> Home</a></li>
                    <li class="active">Academic Program</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="course-details-area default-padding">
    <div class="container">
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading" style="background-color: #002147;background-image: linear-gradient(to left, #ffb606, #002147, transparent);">
                    Academic Program
                </div>
                <div class="panel-body text-justify">
                    <form action="{{ route('front.programs') }}" method="GET">
                        <div class="col-sm-4" style="margin-bottom: 20px;">
                            <input type="text" placeholder="Enter Program Name" name="name" id="depatmentName" class="form-control">
                        </div>
                        <div class="col-sm-offset-2 col-sm-4" style="margin-bottom: 20px;">
                            <select name="department" id="facultyName" class="form-control">
                                <option value="">Select Department</option>
                                @foreach ($departments as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="col-sm-2" style="margin-bottom: 20px;">
                            <button type="submit" class="btn">Search</button>
                        </div>

                    </form>
                    <div class="clearfix"></div>
                    <div class="top-course-items" id="show_result">
                        @forelse ($programs as $program)
                        <div data-aos="fade-left" class="col-md-4 col-sm-6 equal-height aos-init aos-animate" style="height: 480px;">
                            <div class="item">

                                <div class="info">
                                    <h4 class="min-height-45px text-left" style="word-spacing: 3px;">
                                        <a href="{{ route('front.programs.show', $program->slug) }}">{{ $program->title }}</a>
                                    </h4>
                                    <div class="footer-meta">
                                        <a class="btn btn-theme effect btn-block btn-lg btnhome" href="{{ route('front.programs.show', $program->slug) }}">View
                                        Program<i class="fas fa-check-circle fa-2x fa-pull-right"></i></a>
                                    </div>
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
