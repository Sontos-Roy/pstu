@extends("backend.layouts.app")

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="d-sm-flex justify-content-between">
            <div>
                <h2>All Mission & Vision</h2>
                <small class="text-muted">Patuakhali Science & Technology University</small>
            </div>
            <div>
                <a href="javascript:void(0)" class="btn btn-raised btn-defualt" data-toggle="modal" data-target="#createsetting">Add Glance</a>
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
                                <th>Facutly</th>
                                <th>Department</th>
                                <th>Details</th>
                                <th>Created By</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $key=>$item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->faculty ? $item->faculty->title : '' }}</td>
                                <td>{{ $item->department ? $item->department->name : '' }}</td>
                                <td>{{ StrLimit($item->short, 100) }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('admin.missionvision.edit', $item->id) }}" class="btn modal_btn btn-info waves-effect pull-right btn-sm" style="color: white;"><span class="material-symbols-outlined">
                                            edit_note
                                            </span></a>
                                    <form action="{{ route('admin.missionvision.destroy', $item->id) }}" class="delete_form" method="POST">
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
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="createsettingLabel">Mission and Vision</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.missionvision.store') }}" method="POST" id="ajax_form">
                    @csrf
                    <div class="container">
                            <h5>You Can Select Department Or Faculty only</h5>
                            <div class="mb-3 row">
                                <label for="" class="col-4 col-form-label">Select Faculty</label>
                                <div class="col-8">
                                    <select name="faculty_id" id="" class="form-control">
                                        <option value="">Select Faculty</option>
                                        @foreach ($faculties as $faculty)
                                        <option value="{{ $faculty->id }}">{{ $faculty->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="" class="col-4 col-form-label">Select Department</label>
                                <div class="col-8">
                                    <select name="department_id" id="" class="form-control">
                                        <option value="">Select Department</option>
                                        @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="" class="col-4 col-form-label">Short</label>
                                <div class="col-12">
                                    <textarea name="short" style="border: 1px solid black; min-height: 100px;" class="form-control" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="" class="col-4 col-form-label">Details</label>
                                <div class="col-12">
                                    <textarea name="details" id="editor" style="border: 1px solid black; min-height: 100px;" class="form-control" cols="30" rows="10"></textarea>
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
