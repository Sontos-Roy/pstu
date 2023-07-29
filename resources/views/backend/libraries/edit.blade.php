@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>Edit Library</h2>
        <small class="text-muted">Patuakhali Science & Technology University</small>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <form action="{{ route('admin.libraries.update', $item->id) }}" method="POST" id="ajax_form">
                    @csrf
                    @method('PUT')
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="name" class="form-control" placeholder="Heading " value="{{ $item->name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="website" class="form-control" placeholder="Slug" value="{{ $item->website }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea rows="10" name="short" class="form-control no-resize" placeholder="Message In Short" style="height: 200px;">
                                            {{ $item->short }}
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                            <img src="{{ getImage('libraries', $item->image) }}" alt="{{ $item->name }}" height="100">
                            <div class="col-sm-12">
                                <label for="inputName" class="col-4 col-form-label">Cover Image</label>
                                <div class="col-8">
                                    <input type="file" class="form-control" style="border: 1px solid black;" name="image">
                                </div>
                        </div>

                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-raised g-bg-blush2">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
