@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>View Research Center</h2>
        <small class="text-muted">Patuakhali Science & Technology University</small>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-12 p-2">
                                <strong>Research Center Name: </strong>
                                <p>{{ $item->name }}</p>
                            </div>
                            <div class="col-12 p-2">
                                <strong>Research Center Slug: </strong>
                                <p>{{ $item->slug }}</p>
                            </div>
                            <div class="col-12 p-2">
                                <strong>Research Center Director: </strong>
                                <p>{{ $item->user->name }}</p>
                            </div>
                            <div class="col-12 p-2">
                                <strong>Research Center Short Info: </strong>
                                <p>{{ $item->short }}</p>
                            </div>
                            <div class="col-12 p-2">
                                <strong>Research Center Full Details: </strong>
                                <p>{!! $item->brief !!}</p>
                            </div>
                        </div>

                    </div>

            </div>
        </div>
    </div>
</div>
@endsection
