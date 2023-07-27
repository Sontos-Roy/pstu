@extends('backend.layouts.app')
@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="d-sm-flex justify-content-between">
            <div>
                <h2>Edit Permissions</h2>
                <small class="text-muted">Patuakhali Science & Technology University</small>
            </div>
        </div>
    </div>
    <!-- #END# Basic Examples -->
    <!-- Exportable Table -->
    <form action="{{ route('admin.permissions.update', $permission->id) }}" method="POST" id="ajax_form">
        @csrf
        @method('PUT')
        <div class="row clearfix">
            <div class="col-sm-12">
                <div class="form-group">
                    <div class="form-line">
                        <input type="text" name="name" class="form-control" placeholder="Permission Name" value="{{ $permission->name }}">
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <button type="submit" class="btn btn-raised btn-default">update</button>
            </div>
        </div>
    </form>
    <!-- #END# Exportable Table -->
</div>

@endsection
