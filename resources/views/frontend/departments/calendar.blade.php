@extends('frontend.partials.app')
@push('department')
    {{ $department->name }}
@endpush
@section('content')
    <div class="breadcrumb-area shadow dark text-center text-light" style="background-image: url('{{ getImage('settings', getSetting('pagebanner1')) }}'); background-repeat: no-repeat; padding: 103px 0;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h2>All Academic Calendars</h2>
                    <ul class="breadcrumb">
                        <li><a href="{{ route('front.home') }}"><i class="fas fa-home"></i> Home</a></li>
                        <li class="active">All Academic Calendars</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="course-details-area default-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <div class="default-padding-top" style="border-top: 3px solid #1C4370;box-shadow:0 0 10px rgba(50, 50, 50, .17);min-height: 400px;">
                            <p style="text-align: center;color:green;font-weight: bold">
                            </p>




                            <div>
                                <br><br>
                                <div id="show_result">
                                    <div class="col-sm-12" style="overflow-x:auto;">
                                        <div class="panel panel-default">
                                            <div class="panel-heading" style="color: white; background: #213e5e">Department of {{ $department->name }}</div>
                                            <div class="panel-body">
                                                <table class="table table-bordered table-style table-striped">
                                                    <tbody>
                                                        <tr style="background: #213e5e;color: white">
                                                            <th class="width-15per">Exam. Name</th>
                                                            <th class="width-10per">Academic Year</th>
                                                            <th>Class Start Date</th>
                                                            <th>First Mid Term</th>
                                                            <th>Second Mid Term</th>
                                                            <th>Class Completion Date </th>
                                                            <th>Field Work Date </th>
                                                            <th>Final Exam Start Date</th>
                                                            <th class="width-10per">Final Exam End  Date (Appox.)</th>
                                                        </tr>
                                                        @forelse ($data as $item)
                                                        <tr>
                                                            <td>{{ $item->name }}</td>
                                                            <td>{{ $item->academic_year }}</td>
                                                            <td>{{ $item->class_start }}</td>
                                                            <td>{{ $item->first_mid_term }}</td>
                                                            <td>{{ $item->second_mid_term }}</td>
                                                            <td>{{ $item->field_work }}</td>
                                                            <td>{{ $item->class_completion }}</td>
                                                            <td>{{ $item->final_exam_start }}</td>
                                                            <td>{{ $item->final_exam_end }}</td>
                                                        </tr>
                                                        @empty
                                                        <h2>Empty</h2>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
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
        $.ajax({
            url: '{{ route("admin.get.departments")}}',
            type: 'GET',
            dataType: 'json',
            data:{
                id: facultyId
            },
            success: function(data) {
                $(document).find('select#department_id').empty();
                $('select#department_id').html('<option value="">Select One</option>');
                $.each(data, function(index, department) {
                    $('select#department_id').append('<option value ="'+department.id+'">'+department.name+'</option>');
                });
            }
        });
    })
        $('#department_id').on('change', function() {
        var facultyId = $(this).val();
        $.ajax({
            url: '{{ route("front.get.calendars")}}',
            type: 'GET',
            dataType: 'json',
            data:{
                id: facultyId
            },
            success: function(data) {
                $(document).find('#show_result').empty();

                $('#show_result').html(data.html)
            }
        });
    })
})
</script>
@endpush
