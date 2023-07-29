@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="d-sm-flex justify-content-between">
            <div>
                <h2>All Block Types</h2>
                <small class="text-muted">Patuakhali Science & Technology University</small>
            </div>
            <div>
                <a href="{{ route('admin.home_block_types.create') }}" class="btn btn-raised btn-defualt">Add Block</a>
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
                                <th>name</th>
                                <th>slug</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($types as $key=>$item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->slug }}</td>
                                <td>
                                    <img src="{{ getImage('home_blocks', $item->image) }}" alt="{{ $item->image }}" width="100">
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('admin.home_block_types.show', $item->id) }}" class="btn btn-primary waves-effect pull-right btn-sm" style="color: white;">
                                            <span class="material-symbols-outlined">
                                            visibility
                                            </span>
                                        </a>


                                        <a href="{{ route('admin.home_block_types.edit', $item->id) }}" class="btn btn-info waves-effect pull-right btn-sm" style="color: white;"><span class="material-symbols-outlined">
                                            edit_note
                                            </span></a>
                                    <form action="{{ route('admin.home_block_types.destroy', $item->id) }}" class="delete_form" method="POST">
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

