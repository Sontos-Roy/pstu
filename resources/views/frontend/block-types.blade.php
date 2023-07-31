@extends('frontend.partials.app')

@section('content')
<div class="breadcrumb-area shadow dark text-center text-light" style="background-image: url('{{ getImage('settings', getSetting('pagebanner1')) }}'); background-repeat: no-repeat; padding: 103px 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h2>{{ $block->name }}</h2>
                <ul class="breadcrumb">
                    <li><a href="{{ route('front.home') }}"><i class="fas fa-home"></i> Home</a></li>
                    <li class="active">{{ $block->name }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
    <div class="blog-area single full-blog right-sidebar full-blog default-padding">
        <div class="container">
            <div class="row">
                <div class="blog-items">
                    <div class="panel panel-primary ">
                        <div class="panel-heading" id="heading-gradiant">
                            <div class="col-sm-10">
                                {{ $block->name }}
                            </div>
                            <div class="col-sm-2 text-right">
                                <a href="{{ route('front.block.show', $block->slug) }}" class="btn btn-info btn-xs"> Refresh</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body text-justify">


                            <div class="blog-content col-md-12" id="showInfo">
                                <div class="content-items">
                                    <div class="top-author">
                                        <div class="author-items" style="border: 1px solid white">
                                            <div class="row">
                                                @foreach ($block->details as $details)
                                                <div class="item">
                                                    <div class="info" style="width: 100%;padding-top: 20px">
                                                        <h5 style="text-align: justify"> <a href="{{ route('front.block.details.show', $details->slug) }}" target="_blank">{{ $details->name }}</a>
                                                        </h5>
                                                        <ul>
                                                            <li class="border" style="display: inline-block;">
                                                                <span>
                                                                Published Date: {{ date('d M Y', strtotime($details->created_at)) }}</span>
                                                            </li>
                                                            <li style="display: inline-block;" class="pull-right">
                                                                <a href="{{ route('front.block.details.show', $details->slug) }}" target="_blank" class="btn circle btn-dark border btn-sm text-center">
                                                                <i class="fas fa-plus" style="color: #002147"></i> Read More</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Start Sidebar -->

                        </div>
                        <!-- End Start Sidebar -->
                    </div>
                </div>
            </div>
        </div>
    </div>





    <!-- Start Footer


@endsection
