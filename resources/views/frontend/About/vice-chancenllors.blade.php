@extends('frontend.partials.app')
@section('content')
<div class="breadcrumb-area shadow dark text-center text-light" style="background-image: url('{{ getImage('settings', getSetting('pagebanner1')) }}'); background-size: cover; background-repeat: no-repeat;padding: 103px 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h2>List of Vice Chencellors</h2>
                <ul class="breadcrumb">
                    <li><a href="{{ route('front.home') }}"><i class="fas fa-home"></i> Home</a></li>
                    <li class="active">List of Vice Chencellors</li>
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
                        <div class="col-sm-12 text-center">
                            <h3>List of Vice Chancellors</h3>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="table-list" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Picture</th>
                                <th>Name</th>
                                <th>Duration</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $key => $item)
                            <tr>
                                <td class="width-5per shadowLevel2 text-center vertical-align-middle">{{ $key+1 }}
                                </td>
                                <td class="width-10per" style="text-align: center"> <img src="{{getImage('vice-chancellors', $item->image)}}" alt="Thumb" class="img-thumbnail min-height-100px" height="60" width="60">
                                </td>
                                <td class="vertical-align-middle shadowLevel2">
                                    {{ $item->name }}
                                </td>
                                <td class="font-size-18px vertical-align-middle" style="text-align:center">
                                    {{ $item->from }} to {{ $item->to }}
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
