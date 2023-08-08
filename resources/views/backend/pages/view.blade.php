@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>View Page</h2>
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
                                        <strong>Page Type: </strong>
                                        {{ getPageType()[$item->page_slug] }}
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <strong> Department : </strong>
                                        {{ $item->department?$item->department->name:'' }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <strong> Faculty : </strong>
                                        {{ $item->faculty?$item->faculty->title:'' }}
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <strong>Image: </strong>
                                        @if ($item->image)
                                        <img src="{{ getImage('pages', $item->image) }}" alt="{{ $item->title }}" width="200">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <strong>Title: </strong>
                                        {{ $item->title }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <strong>Slug: </strong>
                                        {{ $item->slug }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <strong>Created By: </strong>
                                        {{ $item->user->name }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <strong>Message Short: </strong>
                                        {{ $item->short }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <strong>Details: </strong>
                                        {!! $item->details !!}
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        @if ($item->pdf_file)
                                        <a target="_blank" href="{{ getPdf('pages', $item->pdf_file) }}" alt="{{ $item->pdf_file }}"> Pdf Download</a>
                                        @endif
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
