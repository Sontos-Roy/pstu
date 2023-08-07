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
    <form action="{{ route('admin.roles.store') }}" method="POST" id="ajax_form">
        @csrf
        <div class="row clearfix">
            <div class="col-sm-12">
                <div class="form-group">
                    <div class="form-line">
                        <input type="text" name="name" class="form-control" placeholder="Role Name">
                    </div>
                </div>
            </div>
            <h5>Add Permissions</h5>
            </hr>
            <div class="col-sm-12">
                <input type="checkbox" id="md_checkbox"  class="filled-in chk-col-deep-purple">
                <label for="md_checkbox">Check All</label>
            </div>
            </hr>
            @foreach ($permissions as $item)
            <div class="col-sm-6">
                <input type="checkbox" name="permission[]" id="md_checkbox_{{ $item->id }}" class="filled-in chk-col-deep-purple checkbox" value="{{ $item->id }}">
                <label for="md_checkbox_{{ $item->id }}" style="color: black;">{{ $item->name }}</label>
            </div>
            @endforeach

            <div class="col-sm-12">
                <button type="submit" class="btn btn-raised btn-default">Create</button>
            </div>
        </div>
    </form>
    <!-- #END# Exportable Table -->
</div>

@endsection

@push('script')

<script>
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
</script>

@endpush
