@extends("backend.layouts.app")

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="d-sm-flex justify-content-between">
            <div>
                <h2>All Academic Calendar</h2>
                <small class="text-muted">Patuakhali Science & Technology University</small>
            </div>
            <div>
                <a href="{{ route('admin.academic_calendars.create') }}" class="btn btn-raised btn-defualt">Add Calendar</a>
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
                                <th>Aca. Year</th>
                                <th>Faculty</th>
                                <th>Department</th>
                                <th>Class Start</th>
                                <th>Class Completion</th>
                                <th>First Mid</th>
                                <th>Second Mid</th>
                                <th>Field Work</th>
                                <th>Final Exam Start</th>
                                <th>Final End</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $key=>$item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->academic_year }}</td>
                                <td>{{ $item->faculty_id }}</td>
                                <td>{{ $item->department_id }}</td>
                                <td>{{ $item->class_start }}</td>
                                <td>{{ $item->class_completion }}</td>
                                <td>{{ $item->first_mid_term }}</td>
                                <td>{{ $item->second_mid_term }}</td>
                                <td>{{ $item->field_work }}</td>
                                <td>{{ $item->final_exam_start }}</td>
                                <td>{{ $item->final_exam_end }}</td>
                                <td>
                                    <div class="d-flex">

                                        <a href="{{ route('admin.academic_calendars.edit', $item->id) }}" class="btn btn-info waves-effect pull-right btn-sm" style="color: white;"><span class="material-symbols-outlined">
                                            edit_note
                                            </span></a>
                                    <form action="{{ route('admin.academic_calendars.destroy', $item->id) }}" class="delete_form" method="POST">
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
@endsection
