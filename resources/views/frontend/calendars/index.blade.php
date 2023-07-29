@extends('frontend.partials.app')

@section('content')
    <div class="breadcrumb-area shadow dark text-center text-light" style="background-image: url('{{ getImage('settings', getSetting('pagebanner1')) }}'); background-repeat: no-repeat; padding: 103px 0;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h2>All Libraires</h2>
                    <ul class="breadcrumb">
                        <li><a href="{{ route('front.home') }}"><i class="fas fa-home"></i> Home</a></li>
                        <li class="active">All Libraires</li>
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
                            <p style="text-align: center;color:green;font-weight: bold">Please Select Faculty, Department to get
                                the Academic Calendar
                            </p>

                                <div class="form-group">
                                    <div class="col-sm-10 margin-bottom-10px " id="">
                                        <label class="control-label col-sm-2" for="faculties">Faculty</label>
                                        <div class="col-sm-4">
                                            <select name="faculty" class="form-control" id="faculties">
                                                <option value="">Select Faculty</option>
                                                @foreach ($faculties as $faculty)
                                                    <option value="{{ $faculty->id }}">{{ $faculty->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <label class="control-label col-sm-2" for="department">Department</label>
                                        <div class="col-sm-4">
                                            <select id="department_id" class="form-control">
                                                <option value="">Select Department</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" id="searching_portion" style="display: none;">
                                    <div class="col-sm-offset-2 col-sm-4">
                                    </div>
                                    <div class="col-sm-4">
                                        <img src="https://www.du.ac.bd/fontView/assets/img/loader.gif" style="height: 40px; display: none;" class="loader">
                                    </div>
                                </div>

                            <div>
                                <br><br>
                                <div id="show_result">

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
                $.each(data, function(index, department) {
                    $('select#department_id').append('<option value ="'+department.id+'">'+department.name+'</option>');
                });
            }
        });
    })
        $('#departments').on('change', function() {
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
                $.each(data, function(index, department) {
                    $('select#department_id').append('<option value ="'+department.id+'">'+department.name+'</option>');
                });
            }
        });
    })
})
</script>
@endpush
