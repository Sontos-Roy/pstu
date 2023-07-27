@extends('frontend.partials.app')
@section('content')
<div class="breadcrumb-area shadow dark text-center text-light" style="background-image: url('{{ getImage('settings', getSetting('pagebanner1')) }}'); background-size: cover; background-repeat: no-repeat;padding: 103px 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h2>University At A Glance</h2>
                <ul class="breadcrumb">
                    <li><a href="{{ route('front.home') }}"><i class="fas fa-home"></i> Home</a></li>
                    <li class="active">University At A Glance</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="course-details-area default-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="courses-info">
                    <div class="tab-info">
                        <div class="tab-content tab-content-info">
                            <div id="tab1" class="tab-pane fade active in">
                                <div class="info title text-justify">
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-body text-justify">
                                        <div class="wrapper center-block">
                                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                                @foreach ($glances as $key=>$item)
                                                <div class="panel panel-default">
                                                    <div class="panel-heading {{ $key==0?'active':'' }}" role="tab" id="heading_{{ $item->id }}">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne_{{ $item->id }}" aria-expanded="true" aria-controls="collapseOne">
                                                            {{ $item->title }}
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseOne_{{ $item->id }}" class="panel-collapse {{ $key == 0?'in':'collapse' }}" role="tabpanel" aria-labelledby="heading_{{ $item->id }}">
                                                        <div class="panel-body">
                                                            {{ $item->details }}
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('frontend.About.sidebar')
        </div>
    </div>
</div>

@endsection
