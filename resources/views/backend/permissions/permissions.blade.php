@extends('backend.layouts.app')
@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="d-sm-flex justify-content-between">
            <div>
                <h2>All Permissions</h2>
                <small class="text-muted">Patuakhali Science & Technology University</small>
            </div>
            <div>
                @can("add-permissions")
                <a href="{{ route('admin.permissions.add') }}" class="btn btn-raised btn-defualt">Add Permission</a>
                @endcan
            </div>
        </div>
    </div>
    <!-- #END# Basic Examples -->
    <!-- Exportable Table -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <h2>All Permissions </h2>
                </div>
                <div class="body table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>no</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $key=>$item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <div class="d-flex">
                                        @can("edit-permission")
                                        <a href="{{ route('admin.permissions.edit', $item->id) }}" class="btn btn-info waves-effect pull-right" style="color: white;">Edit</a>
                                        @endcan
                                        @can("delete-permission")
                                        <form action="{{ route('admin.permissions.delete', $item->id) }}" class="delete_form" method="POST">
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger waves-effect pull-right" style="color: white;">Delete</button>
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
    <!-- #END# Exportable Table -->
</div>
@endsection
