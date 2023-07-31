@extends("backend.layouts.app")

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="d-sm-flex justify-content-between">
            <div>
                <h2>All Faculties</h2>
                <small class="text-muted">Patuakhali Science & Technology University</small>
            </div>
            @can('faculties.create')
            <div>
                <a href="{{ route('admin.faculties.create') }}" class="btn btn-raised btn-defualt">Add Faculty</a>
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
                                <th>Faculty. Name</th>
                                <th>Dean image</th>
                                <th>Dean of Faculty</th>
                                <th>Introduction</th>
                                <th>Faculty Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($faculties as $key=>$item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->title }}</td>
                                <td><img src="{{ getImage('teachers', $item->user->userDetails->image) }}" alt="" width="100"></td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ StrLimit($item->short, 100) }}</td>
                                <td><img src="{{ getImage('faculties', $item->image) }}" alt="" width="100"></td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('admin.faculties.show', $item->id) }}" class="btn btn-info waves-effect pull-right btn-sm" style="color: white;"><span class="material-symbols-outlined">
                                            visibility
                                            </span></a>
                                        @can('faculties.edit')
                                        <a href="{{ route('admin.faculties.edit', $item->id) }}" class="btn btn-info waves-effect pull-right btn-sm" style="color: white;"><span class="material-symbols-outlined">
                                            edit_note
                                            </span>
                                        </a>
                                        @endcan
                                        @can('faculties.delete')
                                        <form action="{{ route('admin.faculties.destroy', $item->id) }}" class="delete_form" method="POST">
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
