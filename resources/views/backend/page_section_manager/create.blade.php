@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>Setting</h2>
        <small class="text-muted">Patuakhali Science &amp; Technology University</small>
    </div>
    <form action="{{ route('admin.page_sections.create') }}" method="POST" id="ajax_form" enctype="multipart/form-data">
        @csrf

        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">

                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="section" class="form-control" placeholder="Section Name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <select name="layout_id" id="">
                                        @foreach ($layouts as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
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


