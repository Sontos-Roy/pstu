@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>View Research</h2>
        <small class="text-muted">Patuakhali Science & Technology University</small>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        @if ($research->image)
                                        <img src="{{ getImage('researchs', $research->image) }}" alt="{{ $research->title }}" width="200">
                                        @endif
                                        @if ($research->file)
                                        <a href="{{ getPdf('researchs', $research->file) }}" target="_blank">PDF</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <strong>Title: </strong>
                                        {{ $research->title }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <strong>Slug: </strong>
                                        {{ $research->slug }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <strong>Created By: </strong>
                                        {{ $research->user->name }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <strong>Message Short: </strong>
                                        {{ $research->short }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <strong>Message: </strong>
                                        {!! $research->message !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </div>
</div>
@endsection
