@extends("backend.layouts.app")

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="d-sm-flex justify-content-between">
            <div>
                <h2>All Honoris Causas</h2>
                <small class="text-muted">Patuakhali Science & Technology University</small>
            </div>
            <div>
                <a href="javascript:void(0)" class="btn btn-raised btn-defualt" data-toggle="modal" data-target="#createsetting">Add Award</a>
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
                                <th>Name</th>
                                <th>Award Name</th>
                                <th>Year</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $key=>$item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->award }}</td>
                                <td>{{ $item->year }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('admin.honoris-causas.edit', $item->id) }}" class="btn modal_btn btn-info waves-effect pull-right btn-sm" style="color: white;"><span class="material-symbols-outlined">
                                            edit_note
                                            </span></a>
                                    <form action="{{ route('admin.honoris-causas.destroy', $item->id) }}" class="delete_form" method="POST">
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

  <!-- The Modal -->
  <div class="modal fade" id="createsetting" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="createsettingLabel">Honoris Add</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.honoris-causas.store') }}" method="POST" id="ajax_form">
                    @csrf
                    <div class="container">
                            <div class="mb-3 row">
                                <label for="" class="col-4 col-form-label">Add Name</label>
                                <div class="col-8">
                                    <input type="text" class="form-control" style="border: 1px solid black;" name="name">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="" class="col-4 col-form-label">Add Award Name</label>
                                <div class="col-8">
                                    <input type="text" class="form-control" style="border: 1px solid black;" name="award">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="" class="col-4 col-form-label">Add Year</label>
                                <div class="col-8">
                                    <input type="text" class="form-control" style="border: 1px solid black;" name="year">
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

@push('script')


@endpush
