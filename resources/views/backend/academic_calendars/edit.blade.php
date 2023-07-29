@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>Edit Academic Calendar</h2>
        <small class="text-muted">Patuakhali Science & Technology University</small>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <form action="{{ route('admin.academic_calendars.update', $data->id) }}" method="POST" id="ajax_form">
                    @csrf
                    @method('PUT')
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <div class="form-line">
                                        <input type="text" name="name" value="{{ $data->name }}" class="form-control" placeholder="Name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Academic Year</label>
                                    <div class="form-line">
                                        <input type="text" value="{{ $data->academic_year }}" name="academic_year" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Select Faculty</label>
                                    <select name="faculty_id" id="faculties" class="form-control select2">
                                        <option value="">Select Faculty</option>
                                        @foreach ($faculties as $faculty)
                                            <option value="{{ $faculty->id }}" {{ $data->faculty_id == $faculty->id ? 'selected' : '' }}>{{ $faculty->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Select Faculty</label>
                                    <select name="department_id" id="departments" class="form-control select2">
                                        <option value="{{ $data->department_id }}">Select Department</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Class Start Date</label>
                                    <div class="form-line">
                                        <input type="date" name="class_start" value="{{ $data->class_start }}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Class Completion Date</label>
                                    <div class="form-line">
                                        <input type="date" name="class_completion" value="{{ $data->class_completion }}"  class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">First Mid Term Date</label>
                                    <div class="form-line">
                                        <input type="date" name="first_mid_term" value="{{ $data->first_mid_term }}"  class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Second Mid Term Date</label>
                                    <div class="form-line">
                                        <input type="date" name="second_mid_term" value="{{ $data->second_mid_term }}"  class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Field Work Date</label>
                                    <div class="form-line">
                                        <input type="date" name="field_work" value="{{ $data->field_work }}"  class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">First Exam Start Date</label>
                                    <div class="form-line">
                                        <input type="date" name="final_exam_start" value="{{ $data->final_exam_start }}"  class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Final Exam End Date</label>
                                    <div class="form-line">
                                        <input type="date" name="final_exam_end" value="{{ $data->final_exam_end }}"  class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-raised g-bg-blush2">Submit</button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<script>
    $(document).ready(function(){
        $('#faculties').on('change', function() {
        var facultyId = $(this).val();

        // Make an AJAX request to fetch departments based on the selected faculty_id
        $.ajax({
            url: '{{ route("admin.get.departments",'+facultyId +') }}',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                // Populate the departments select element with the fetched data
                var departmentsSelect = $('#departments');
                departmentsSelect.empty();
                $.each(data, function(index, department) {
                    departmentsSelect.append($('<option>', {
                        value: department.id,
                        text: department.name
                    }));
                });
            }
        });
    })
})
</script>
@endpush
