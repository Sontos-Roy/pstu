@extends('frontend.partials.app')

@section('content')
    <div class="breadcrumb-area shadow dark text-center text-light" style="background-image: url('{{ getImage('settings', getSetting('pagebanner1')) }}'); background-repeat: no-repeat; padding: 103px 0;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h2>{{ $data->title }}</h2>
                    <ul class="breadcrumb">
                        <li><a href="{{ route('front.home') }}"><i class="fas fa-home"></i> Home</a></li>
                        <li class="active">{{ $data->title }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="course-details-area default-padding">
        <div class="container">
            <div class="row">
                <!-- Start Course Info -->
                <div class="col-md-9">
                    <div class="courses-info">
                        <!-- Star Tab Info -->
                        <div class="tab-info">
                            <!-- Start Tab Content -->
                            <div class="tab-content tab-content-info">
                                <!-- Single Tab -->
                                <div id="tab1" class="tab-pane fade active in">
                                    <div class="info title">
                                        <div class="col-sm-12">
                                            {!! $data->details !!}

                                            {!! $data->contact !!}
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Tab -->
                            </div>
                            <!-- End Tab Content -->
                        </div>
                        <!-- End Tab Info -->
                    </div>
                </div>
                <!-- End Course Info -->
                <!-- Start Course Sidebar -->
                <div class="col-md-3">
                    <div class="aside">
                        <div class="sidebar-item category">
                            <div class="title">
                                <h4>Admission</h4>
                            </div>
                            <ul>
                                @foreach (getAdmissions()->take(6) as $admission)
                                <li><a href="{{ route('front.get.admissions', $admission->slug) }}" target="_blank">{{ $admission->title }}</a></li>
                                @endforeach


                            </ul>
                        </div>

                    </div>
                </div>
                <!-- End Course Sidebar -->
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
