@extends('frontend.partials.app')
@section('content')
<div class="breadcrumb-area shadow dark text-center text-light" style="background-image: url('{{ getImage('settings', getSetting('pagebanner1')) }}'); background-size: cover; background-repeat: no-repeat;padding: 103px 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h2>{{ $item->title }}</h2>
                <ul class="breadcrumb">
                    <li><a href="{{ route('front.home') }}"><i class="fas fa-home"></i> Home</a></li>
                    <li class="active">{{ $item->title }}}}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="course-details-area default-padding">
    <div class="container">
       <div class="row">
          <!-- Start Course Info -->
          <div class="col-md-12">
             <div class="top-author">
                <div class="author-items" style="border-top: 3px solid #1C4370;box-shadow:0 0 10px rgba(50, 50, 50, .17);">
                   <div class="col-sm-12 text-center">
                      <h3>Welcome to Patuakhali Science & Technology University</h3>
                   </div>
                   <div class="col-lg-12 col-sm-12 text-center">
                      <h3 class="shadowLevel2">Patuakhali Science & Technology University    </h3>
                   </div>
                   <div class="clearfix"></div>
                   {!! $item->details !!}
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>

@endsection
