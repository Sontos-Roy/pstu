@extends('backend.layouts.app')
@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="d-sm-flex justify-content-between">
            <div>
                <h2>Show Roles and Permissions</h2>
                <small class="text-muted">Patuakhali Science & Technology University</small>
            </div>
        </div>
    </div>
    <!-- #END# Basic Examples -->

        <div class="row clearfix">
            <div class="col-sm-12">
                <div class="form-group">
                    <div class="form-line">
                        <input type="text" name="name" class="form-control" value="{{ $role->name }}" placeholder="Role Name" readonly>
                    </div>
                </div>
            </div>
            <h5>Permissions</h5>
            @foreach ($rolePermissions as $item)
            <div class="col-sm-12">
                <label for="md_checkbox_{{ $item->id }}">{{ $item->name }}</label>
            </div>
            @endforeach
        </div>
    <!-- #END# Exportable Table -->
</div>

@endsection

