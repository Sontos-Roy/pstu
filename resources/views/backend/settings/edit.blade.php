@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>Setting</h2>
        <small class="text-muted">Patuakhali Science &amp; Technology University</small>
    </div>
    <form action="{{ route('admin.settings.update', $setting->id) }}" method="POST" id="ajax_form" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">

                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $setting->name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="key" placeholder="Key" value="{{ $setting->key }}">
                                        <input type="hidden" class="form-control" name="type" placeholder="Type" value="{{ $setting->type }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        @if ($setting->type === 'text')
                                            <input type="text" name="value" value="{{ $setting->value }}" class="form-control" placeholder="Add Value">
                                        @elseif ($setting->type === 'textarea')
                                            <textarea name="value" class="form-control" placeholder="Add Value">{{ $setting->value }}</textarea>
                                        @elseif ($setting->type === 'image')
                                            <div class="imageSelect">
                                                Select Image
                                                <input type="file" name="value" class="form-control" id="image-input">
                                                <img id="image-preview" src="#" alt="" width="100">
                                            </div>
                                            @if ($setting->value)
                                                <img src="{{ getImage('setting', $setting->value) }}" alt="{{ $setting->key }}" class="preview-image">
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-raised g-bg-blush2">Save</button>
                </div>
            </div>
        </div>
    </form>
</div>
<style>
    .imageSelect{
        padding: 20px;
    }
</style>
@endsection


