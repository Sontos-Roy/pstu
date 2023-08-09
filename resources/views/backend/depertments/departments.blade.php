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
        <div class="col-lg-8 ml-auto">
            <form action="{{ route('admin.department.index') }}" method="GET">
                <div class="row align-items-center mb-2">
                    <div class="col-lg-4 col-12 mb-2">
                        <input type="text" class="form-control p-2 m-0" value="{{ $name }}" name="name" placeholder="Search By Department Name" style="border: 1px solid gray;">
                    </div>
                    <div class="col-lg-4 col-12 mb-2">
                        <select name="faculty_id" id="" class="form-control p-2 m-0" style="border: 1px solid gray;">
                            <option value="">Select Faculty</option>
                            @foreach ($faculties as $faculty)
                                <option value="{{ $faculty->id }}">{{ $faculty->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-4 col-7 d-flex mb-2">
                        <button class="btn m-0" type="submit">Search</button>
                        <a href="{{ route('admin.department.index') }}" class="btn m-0 ml-1">Reset</a>
                    </div>
                </div>
                @if (!empty($name))
                <small>Search Result : {{ $departments->count() }}</small>
                @else
                <small>Total Departments : {{ $departments->count() }}</small>
                @endif
            </form>
        </div>
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
                                <th>Banner</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($departments as $key=>$item)
                            <tr>
                                <td>
                                    {{ getKey($departments, $loop) }}
                                </td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->user ? $item->user->name : "" }}</td>
                                <td>{{ $item->faculty? $item->faculty->title : '' }}</td>
                                <td>{{ StrLimit($item->short, 100) }}</td>
                                <td><img src="{{ getImage('departments', $item->image) }}" alt="" width="100"></td>
                                <td><img src="{{ getImage('departments', $item->banner, 'banner') }}" alt="" width="100"></td>
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
                {{ $departments->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
    <!-- #END# Basic Examples -->
</div>
@endsection
