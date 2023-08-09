@extends("backend.layouts.app")

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="d-sm-flex justify-content-between">
            <div>
                <h2>All Sliders</h2>
                <small class="text-muted">Patuakhali Science & Technology University</small>
            </div>
            <div>
                <a href="javascript:void(0)" class="btn btn-raised btn-defualt" data-toggle="modal" data-target="#createsetting">Add Slider</a>
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
                                <th>Heading</th>
                                <th>For</th>
                                {{-- <th>Faculty</th>
                                <th>Department</th> --}}
                                <th>First Button</th>
                                <th>Second Button</th>
                                <th>Is Active</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sliders as $key=>$item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->head }}</td>
                                <td>{{ $item->select_for }}</td>
                                {{-- <td>{{ $item->faculty ? $item->faculty->title: '' }}</td>
                                <td>{{ $item->department ? $item->department->name: '' }}</td> --}}
                                <td>{{ $item->first_btn }}</td>
                                <td>{{ $item->second_btn }}</td>
                                <td>
                                    <div class="switch">
                                        <label class="d-flex">OFF
                                            <input type="checkbox" {{ $item->isActive == 1 ? 'checked' : '' }} data-url="{{ route('admin.change.slider.status', $item->id) }}" class="isActiveCheckbox">
                                            <span class="lever"></span>ON</label>
                                     </div>
                                </td>
                                <td>{{ $item->type }}</td>
                                <td>
                                        <img src="{{ getImage('sliders', $item->image) }}" alt="{{ $item->image }}" width="100">
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('admin.sliders.edit', $item->id) }}" class="btn modal_btn btn-info waves-effect pull-right btn-sm" style="color: white;"><span class="material-symbols-outlined">
                                            edit_note
                                            </span></a>
                                    <form action="{{ route('admin.sliders.destroy', $item->id) }}" class="delete_form" method="POST">
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
                <h4 class="modal-title" id="createsettingLabel">Slider Add</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.sliders.index') }}" method="POST" id="ajax_form">
                    @csrf
                    <div class="container">
                            <div class="mb-3 row">
                                <label for="" class="col-4 col-form-label">Head Text</label>
                                <div class="col-8">
                                    <input type="text" class="form-control" style="border: 1px solid black;" name="head">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="" class="col-4 col-form-label">First Button</label>
                                <div class="col-8">
                                    <input type="text" class="form-control" style="border: 1px solid black;" name="first_btn">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="" class="col-4 col-form-label">Second Button</label>
                                <div class="col-8">
                                    <input type="text" class="form-control" style="border: 1px solid black;" name="second_btn">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="" class="col-4 col-form-label">First Button Link</label>
                                <div class="col-8">
                                    <input type="text" class="form-control" style="border: 1px solid black;" name="first_btn_link">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="" class="col-4 col-form-label">Second Button Link</label>
                                <div class="col-8">
                                    <input type="text" class="form-control" style="border: 1px solid black;" name="second_btn_link">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="" class="col-4 col-form-label">Select For</label>
                                <div class="col-8">
                                        <select class="form-control shadow-none" name="select_for" id="select_for">
                                            <option selected>Select one</option>
                                            <option value="main" selected>Main Page</option>
                                            {{-- <option value="faculty">Faculty Section</option>
                                            <option value="department">Department Section</option> --}}
                                        </select>
                                </div>
                            </div>
                            <div class="mb-3 row faculty d-none">
                                <label for="" class="col-4 col-form-label">Select Faculty</label>
                                <div class="col-8">
                                        <select class="form-control shadow-none" name="faculty_id" id="">
                                            <option value="">Select one</option>
                                            @foreach (getFaculty() as $faculty)
                                            <option value="{{ $faculty->id }}">{{ $faculty->title }}</option>
                                            @endforeach
                                        </select>
                                </div>
                            </div>
                            <div class="mb-3 row department d-none">
                                <label for="" class="col-4 col-form-label">Select Department</label>
                                <div class="col-8">
                                        <select class="form-control shadow-none" name="department_id" id="">
                                            <option value="">Select one</option>
                                            @foreach ($departments as $department)
                                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                                            @endforeach
                                        </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="inputName" class="col-4 col-form-label">Slider Active Or Not</label>
                                <div class="col-8">
                                    <div class="switch">

                                        <label>OFF
                                            <input type="checkbox" name="isActive">
                                            <span class="lever"></span>ON</label>
                                     </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="inputName" class="col-4 col-form-label">Type</label>
                                <div class="col-8">
                                    <input type="file" class="form-control" style="border: 1px solid black;" name="image">
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
<script>
     $(document).ready(function() {
        $('.faculty').hide();
        $('.department').hide();
        $('#select_for').on('change', function(){

            var value = $(this).val();
            if(value == 'main'){
                $('.faculty').hide();
                $('.faculty').val(null);
                $('.department').hide();
                $('.department').val(null);
            }else if(value == 'faculty'){
                $('.faculty').show();
                $('.department').hide();
                $('.department').val(null);
            }else if(value == 'department'){
                $('.faculty').hide();
                $('.department').show();
                $('.faculty').val(null);
            }
        });
        $('.isActiveCheckbox').on('change', function() {
            var isActive = $(this).is(':checked');
            var url = $(this).attr('data-url');

            $.ajax({
                url: url,
                type: "POST",
                data: {
                    isActive: isActive,
                    _token: "{{ csrf_token() }}"
                },
                success: function(res) {
                    Toast.fire({
                        icon: 'success',
                        title: res.msg
                    });
                },
                error: function(xhr, status, error) {
                    // Handle error response if needed
                }
            });
        });
    });
</script>


@endpush
