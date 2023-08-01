@extends('frontend.partials.app')

@section('content')
<div class="breadcrumb-area shadow dark text-center text-light" style="background-image: url('{{ getImage('settings', getSetting('pagebanner1')) }}'); background-repeat: no-repeat; padding: 103px 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h2>Approved NOC / GO</h2>
                <ul class="breadcrumb">
                    <li><a href="{{ route('front.home') }}"><i class="fas fa-home"></i> Home</a></li>
                    <li class="active">Approved NOC / GO</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container" style="margin-top:40px">
    <div class="row">
        <!-- Start Course Info -->
        <div class="col-md-12">
            <div style="height: 40px; background-color: #000; padding:2; color: #fff; line-height: 40px">
                Approved NOC / GO
            </div>
            <div class="table-responsive">
                <table class="table table-stripped table-hovered">
                    <tr>
                        <td>Sl</td>
                        <td>Name</td>
                        <td>Designation</td>
                        <td>Department/Office</td>
                        <td>Type</td>
                        <td>Date</td>
                        <td>Attachment</td>
                    </tr>

                    @foreach($items as $key=>$item)
                    <tr>
                        <td>{{ $key+1}}</td>
                        <td>{{ $item->user->name}}</td>
                        <td>{{ $item->user->designation?$item->user->designation->name :''}}</td>
                        <td>{{ $item->user->department?$item->user->department->name :''}}</td>
                        <td>{{ $item->type}}</td>
                        <td>{{ $item->date}}</td>
                        <td>
                            <a target="_blank" href="{{ getPdf('noces', $item->pdf_file) }}">View</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <hr>
        </div>
    </div>
</div>

@endsection
