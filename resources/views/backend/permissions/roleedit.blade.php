@extends('backend.layouts.app')
@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="d-sm-flex justify-content-between">
            <div>
                <h2>Add Permissions</h2>
                <small class="text-muted">Patuakhali Science & Technology University</small>
            </div>
        </div>
    </div>
    <!-- #END# Basic Examples -->
    <!-- Exportable Table -->
    <form action="{{ route('admin.roles.update', $role->id) }}" method="POST" id="ajax_form">
        @csrf
        @method('PUT')
        <div class="row clearfix">
            <div class="col-sm-12">
                <div class="form-group">
                    <div class="form-line">
                        <input type="text" name="name" class="form-control" value="{{ $role->name }}" placeholder="Role Name">
                    </div>
                </div>
            </div>
            <h5>Add Permissions</h5>
            <div class="col-sm-12">
                <input type="checkbox" id="md_checkbox" class="filled-in chk-col-deep-purple" {{ count($permissions) == count($rolePermissions) ? 'checked' : '' }}>
                <label for="md_checkbox">Check All</label>
            </div>
            <div class="row p-2">
                @foreach ($permissions as $item)
                <div class="col-sm-6 col-lg-3 col-md-4 col-12">
                    <input type="checkbox" name="permission[]" value="{{ $item->id }}" id="md_checkbox_{{ $item->id }}" class="filled-in chk-col-deep-purple checkbox" {{ in_array($item->id, $rolePermissions) ? 'checked' : '' }}>
                    <label for="md_checkbox_{{ $item->id }}">{{ $item->name }}</label>
                </div>
                @endforeach
            </div>

            <div class="col-sm-12">
                <button type="submit" class="btn btn-raised btn-default">Update</button>
            </div>
        </div>
    </form>
    <!-- #END# Exportable Table -->
</div>

@endsection

@push('script')

<script>

    $(document).ready(function(){
        $('#md_checkbox').click(function() {
        $('.checkbox').prop('checked', $(this).prop('checked'));
      });
      if ($('.checkbox:checked').length == $('.checkbox').length) {
          $('#md_checkbox').prop('checked', true);
        }
      $('.checkbox').click(function() {
        if ($('.checkbox:checked').length == $('.checkbox').length) {
          $('#md_checkbox').prop('checked', true);
        } else {
          $('#md_checkbox').prop('checked', false);
        }
      });
    })
</script>

@endpush
