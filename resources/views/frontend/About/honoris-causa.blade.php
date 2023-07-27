@extends('frontend.partials.app')
@section('content')
<div class="breadcrumb-area shadow dark text-center text-light" style="background-image: url('{{ getImage('settings', getSetting('pagebanner1')) }}'); background-size: cover; background-repeat: no-repeat;padding: 103px 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h2>Honoris Causa</h2>
                <ul class="breadcrumb">
                    <li><a href="{{ route('front.home') }}"><i class="fas fa-home"></i> Home</a></li>
                    <li class="active">Honoris Causa</li>
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
                                        <style>
                                            table.table-bordered > tbody > tr > td,
                                            table.table-bordered > tbody > tr > th{
                                            border:1px solid black;
                                            padding-top:10px;
                                            padding-bottom:10px
                                            }
                                        </style>
                                        <table class="table table-bordered table-striped table-hover" style="width:100%">
                                            <thead>

                                            </thead>
                                            <tbody>
                                                <tr class="info">
                                                    <th>Name of Recipient</th>
                                                    <th style="width:25%">Degree awarded</th>
                                                    <th style="width:15%;text-align:center">Year</th>
                                                </tr>
                                                @foreach ($awards as $item)
                                                <tr>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->award }}</td>
                                                    <td style="text-align:center">{{ $item->year }}</td>
                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
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
