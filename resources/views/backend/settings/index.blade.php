@extends("backend.layouts.app")

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="d-sm-flex justify-content-between">
            <div>
                <h2>All Settings</h2>
                <small class="text-muted">Patuakhali Science & Technology University</small>
            </div>
            <div>
                @can("add-setting")
                <a href="javascript:void(0)" class="btn btn-raised btn-defualt" data-toggle="modal" data-target="#createsetting">Add Setting</a>
                @endcan
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
                                <th>Display Name</th>
                                <th>Key</th>
                                <th>Type</th>
                                <th>Value</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($settings as $key=>$item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->key }}</td>
                                <td>{{ $item->type }}</td>
                                <td>
                                    @if ($item->type == "image")
                                        <img src="{{ getImage('settings', $item->value) }}" alt="{{ $item->type }}" width="100">
                                    @else
                                        {{ $item->value }}
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex">
                                        @can("edit-setting")
                                        <a href="{{ route('admin.settings.edit', $item->id) }}" class="btn btn-info waves-effect pull-right btn-sm" style="color: white;"><span class="material-symbols-outlined">
                                            edit_note
                                            </span></a>
                                        @endcan
                                    @can("delete-setting")
                                    <form action="{{ route('admin.settings.destroy', $item->id) }}" class="delete_form" method="POST">
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

  <!-- The Modal -->
  <div class="modal fade" id="createsetting" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="createsettingLabel">Setting Type Add</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.settings.store') }}" method="POST" id="ajax_form">
                    @csrf
                    <div class="container">
                            <div class="mb-3 row">
                                <label for="" class="col-4 col-form-label">Display Name</label>
                                <div class="col-8">
                                    <input type="text" class="form-control" style="border: 1px solid black;" name="name">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="" class="col-4 col-form-label">Key</label>
                                <div class="col-8">
                                    <input type="text" class="form-control" style="border: 1px solid black;" name="key">
                                    <input type="hidden" class="form-control" style="border: 1px solid black;" name="value">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="inputName" class="col-4 col-form-label">Type</label>
                                <div class="col-8">
                                    <select name="type" id="" class="form-control" style="border: 1px solid black;">
                                        <option value="text">Text</option>
                                        <option value="textarea">Text Area</option>
                                        <option value="image">image</option>
                                    </select>
                                </div>
                            </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                <button type="submit" form="ajax_form" class="btn btn-link waves-effect">SAVE CHANGES</button>
            </div>
        </div>
    </div>
</div>
@endsection
