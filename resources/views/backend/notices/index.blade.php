@extends("backend.layouts.app")

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="d-sm-flex justify-content-between">
            <div>
                <h2>All Notices</h2>
                <small class="text-muted">Patuakhali Science & Technology University</small>
            </div>
            @can('notices.create')
            <div>
                <a href="{{ route('admin.notices.create') }}" class="btn btn-raised btn-defualt">Add Notice</a>
            </div>
            @endcan
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
                                <th>Message</th>
                                <th>User</th>
                                <th>file</th>
                                <th>image</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($notices as $key=>$item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ StrLimit($item->title, 100) }}</td>
                                <td>{{ StrLimit($item->slug, 100) }}</td>
                                <td>{{ StrLimit($item->short, 100) }}</td>

                                <td>{{ $item->user->name }}</td>
                                <td>@if ($item->file)
                                    <a href="{{ getPdf('notices', $item->file) }}" target="_blank">PDF</a>
                                @endif</td>
                                <td><img src="{{ getImage('notices', $item->image) }}" width="100" alt=""></td>
                                <td>{{ $item->created_at->diffForHumans() }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('admin.notices.show', $item->id) }}" class="btn btn-info waves-effect pull-right btn-sm" style="color: white;"><span class="material-symbols-outlined">
                                            visibility
                                            </span></a>
                                        @can('notices.edit')
                                        <a href="{{ route('admin.notices.edit', $item->id) }}" class="btn btn-info waves-effect pull-right btn-sm" style="color: white;"><span class="material-symbols-outlined">
                                            edit_note
                                            </span></a>
                                        @endcan
                                        @can('notices.delete')
                                        <form action="{{ route('admin.notices.destroy', $item->id) }}" class="delete_form" method="POST">
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger waves-effect pull-right btn-sm" style="color: white;"><span class="material-symbols-outlined">
                                                delete
                                                </span></button>
                                        </form>
                                        @endcan
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
@endsection
