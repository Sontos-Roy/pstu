@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="d-sm-flex justify-content-between">
            <div>
                <h2>All NOC or GO</h2>
                <small class="text-muted">Patuakhali Science & Technology University</small>
            </div>
            @can('noces.create')
            <div>
                <a href="{{ route('admin.noces.create') }}" class="btn btn-raised btn-defualt">Add NOC or GO</a>
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
                                <th>name</th>
                                <th>Designation</th>
                                <th>Department</th>
                                <th>Type</th>
                                <th>Created At</th>
                                <th>Pdf</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $key=>$item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->user->desigantion?$item->user->desigantion->name :''}}</td>
                                <td>{{ $item->user->department?$item->user->department->name :''}}</td>
                                <td>{{ $item->type}}</td>
                                <td>{{ $item->date}}</td>
                                <td>
                                    <a href="{{ getPdf('noces', $item->pdf_file) }}">View</a>
                                </td>
                                <td>
                                    <div class="d-flex">

                                        

                                        @can('noces.edit')
                                        <a href="{{ route('admin.noces.edit', $item->id) }}" class="btn btn-info waves-effect pull-right btn-sm" style="color: white;"><span class="material-symbols-outlined">
                                            edit_note
                                            </span>
                                        </a>
                                        @endcan
                                        @can('noces.delete')
                                        <form action="{{ route('admin.noces.destroy', $item->id) }}" class="delete_form" method="POST">
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
<!-- Button to Open the Modal -->

@endsection

