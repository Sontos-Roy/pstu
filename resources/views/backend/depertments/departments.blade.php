@extends("backend.layouts.app")

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="d-sm-flex justify-content-between">
            <div>
                <h2>All Departments</h2>
                <small class="text-muted">Patuakhali Science & Technology University</small>
            </div>
            @can('department.create')
            <div>
                <a href="{{ route('admin.department.create') }}" class="btn btn-raised btn-defualt">Add Department</a>
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
                                <th>Dept. Name</th>
                                <th>Dept. Head</th>
                                <th>Faculty</th>
                                <th>Brief</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($departments as $key=>$item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->faculty->title }}</td>
                                <td>{{ StrLimit($item->short, 100) }}</td>
                                <td><img src="{{ getImage('departments', $item->image) }}" alt="" width="100"></td>
                                <td>
                                    <div class="d-flex">
                                        @can('department.view')
                                        <a href="{{ route('admin.department.show', $item->id) }}" class="btn btn-info waves-effect pull-right btn-sm" style="color: white;"><span class="material-symbols-outlined">
                                            visibility
                                            </span>
                                        </a>
                                        @endcan
                                        @can('department.edit')
                                        <a href="{{ route('admin.department.edit', $item->id) }}" class="btn btn-info waves-effect pull-right btn-sm" style="color: white;"><span class="material-symbols-outlined">
                                            edit_note
                                            </span>
                                        </a>
                                        @endcan
                                        @can('department.delete')
                                        <form action="{{ route('admin.department.destroy', $item->id) }}" class="delete_form" method="POST">
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
