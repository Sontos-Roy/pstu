@extends("backend.layouts.app")

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="d-sm-flex justify-content-between">
            <div>
                <h2>Assign Head For Department</h2>
                <small class="text-muted">Patuakhali Science & Technology University</small>
            </div>
            <div>
                <a href="{{ route('admin.assign.department.head.edit', 0) }}" class="btn modal_btn btn-info waves-effect pull-right btn-sm" style="color: white;">Assign Head</a>
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
                                <th>Department</th>
                                <th>Dean</th>
                                <th>Assign</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($faculties as $key=>$item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ StrLimit($item->name, 100) }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>
                                    <div class="d-flex">

                                        <a href="{{ route('admin.assign.department.head.edit', $item->id) }}" class="btn modal_btn btn-info waves-effect pull-right btn-sm" style="color: white;"><span class="material-symbols-outlined">
                                            edit_note
                                            </span></a>
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
