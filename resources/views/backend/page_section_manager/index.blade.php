@extends("backend.layouts.app")

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="d-sm-flex justify-content-between">
            <div>
                <h2>All Layouts For Section Manage</h2>
                <small class="text-muted">Patuakhali Science & Technology University</small>
            </div>
            <div>
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
                                <th>Layout Name</th>
                                <th>Edit Sections</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Main</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="" class="btn btn-info waves-effect pull-right btn-sm" style="color: white;"><span class="material-symbols-outlined">
                                            edit_note
                                            </span></a>

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Faculty</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="" class="btn btn-info waves-effect pull-right btn-sm" style="color: white;"><span class="material-symbols-outlined">
                                            edit_note
                                            </span></a>

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Department</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="" class="btn btn-info waves-effect pull-right btn-sm" style="color: white;"><span class="material-symbols-outlined">
                                            edit_note
                                            </span></a>

                                    </div>
                                </td>
                            </tr>
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
