@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>View Faculty</h2>
        <small class="text-muted">Patuakhali Science & Technology University</small>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <Strong>Faculty Title: </Strong> <span>{{ $item->title }}</span>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <Strong>Dean of Faculty: </Strong> <span>{{ $item->user->name }}</span>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <Strong>Dean Image: </Strong> <span><img src="{{ getImage('teachers', $item->user->userDetails->image) }}" alt="" width="200"></span>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <Strong>Faculty Image: </Strong> <span><img src="{{ getImage('faculties', $item->image) }}" alt="" width="200"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <Strong>Faculty Short Intro: </Strong> <span>{{ $item->short }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <Strong>Faculty Full Intro: </Strong> <br>
                                    {!! $item->introduction !!}
                                </div>
                            </div>
                        </div>

                    </div>

            </div>
        </div>
    </div>
</div>
@endsection
