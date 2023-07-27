@extends("backend.layouts.app")

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="d-sm-flex justify-content-between">
            <div>
                <h2>All Pages</h2>
                <small class="text-muted">Patuakhali Science & Technology University</small>
            </div>
            <div>
                <a href="{{ route('admin.pages.create') }}" class="btn btn-raised btn-defualt">Add Page</a>
            </div>
        </div>
    </div>
    <!-- Basic Examples -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="body table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>no</th>
                                <th>Title</th>
                                <th>slug</th>
                                <th>short</th>
                                <th>Is Active</th>
                                <th>Image</th>
                                <th>createdBy</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pages as $key=>$item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->slug }}</td>
                                <td>{{ StrLimit($item->short, 80) }}</td>
                                <td>
                                    <div class="switch">
                                        <label class="d-flex">OFF
                                            <input type="checkbox" {{ $item->is_active == 1 ? 'checked' : '' }} data-url="{{ route('admin.change.page.status', $item->id) }}" class="isActiveCheckbox">
                                            <span class="lever"></span>ON</label>
                                     </div>
                                </td>
                                <td>
                                        <img src="{{ getImage('pages', $item->image) }}" alt="{{ $item->image }}" width="100">
                                </td>
                                <td>{{ $item->user->name }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('admin.pages.show', $item->id) }}" class="btn btn-info waves-effect pull-right btn-sm" style="color: white;"><span class="material-symbols-outlined">
                                            visibility
                                            </span></a>
                                        <a href="{{ route('admin.pages.edit', $item->id) }}" class="btn btn-info waves-effect pull-right btn-sm" style="color: white;"><span class="material-symbols-outlined">
                                            edit_note
                                            </span></a>
                                    <form action="{{ route('admin.pages.destroy', $item->id) }}" class="delete_form" method="POST">
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger waves-effect pull-right btn-sm" style="color: white;"><span class="material-symbols-outlined">
                                            delete
                                            </span></button>
                                    </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Basic Examples -->
</div>
<!-- Button to Open the Modal -->

 
@endsection

@push('script')
<script>
     $(document).ready(function() {
        $('.isActiveCheckbox').on('change', function() {
            var isActive = $(this).is(':checked');
            var url = $(this).attr('data-url');

            $.ajax({
                url: url,
                type: "POST",
                data: {
                    isActive: isActive,
                    _token: "{{ csrf_token() }}"
                },
                success: function(res) {
                    Toast.fire({
                        icon: 'success',
                        title: res.msg
                    });
                },
                error: function(xhr, status, error) {
                    // Handle error response if needed
                }
            });
        });
    });
</script>


@endpush
