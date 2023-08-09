    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('admin.sliders.update', $data->id) }}" method="POST" id="ajax_form">
            <div class="modal-header">
                <h4 class="modal-title" id="createsettingLabel">Slider Edit</h4>
            </div>
            <div class="modal-body">
                    @csrf
                    @method("PUT")
                    <div class="container">
                            <div class="mb-3 row">
                                <label for="" class="col-4 col-form-label">Head Text</label>
                                <div class="col-8">
                                    <input type="text" class="form-control" style="border: 1px solid black;" name="head" value="{{ $data->head }}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="" class="col-4 col-form-label">First Button</label>
                                <div class="col-8">
                                    <input type="text" class="form-control" style="border: 1px solid black;" name="first_btn" value="{{ $data->first_btn }}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="" class="col-4 col-form-label">Second Button</label>
                                <div class="col-8">
                                    <input type="text" class="form-control" style="border: 1px solid black;" name="second_btn" value="{{ $data->second_btn }}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="" class="col-4 col-form-label">First Button Link</label>
                                <div class="col-8">
                                    <input type="text" class="form-control" style="border: 1px solid black;" name="first_btn_link" value="{{ $data->first_btn_link }}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="" class="col-4 col-form-label">Second Button Link</label>
                                <div class="col-8">
                                    <input type="text" class="form-control" style="border: 1px solid black;" name="second_btn_link" value="{{ $data->second_btn_link }}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="" class="col-4 col-form-label">Select For</label>
                                <div class="col-8">
                                        <select class="form-control shadow-none" name="select_for" id="select_for">
                                            <option selected>Select one</option>
                                            <option value="main" {{ $data->select_for == 'main' ? 'selected' : ''}}>Main Page</option>
                                            {{-- <option value="faculty" {{ $data->select_for == 'faculty' ? 'selected' : ''}}>Faculty Section</option>
                                            <option value="department" {{ $data->select_for == 'department' ? 'selected' : ''}}>Department Section</option> --}}
                                        </select>
                                </div>
                            </div>
                            <div class="mb-3 row faculty d-none">
                                <label for="" class="col-4 col-form-label">Select Faculty</label>
                                <div class="col-8">
                                        <select class="form-control shadow-none" name="faculty_id" id="">
                                            <option value="">Select one</option>
                                            @foreach (getFaculty() as $faculty)
                                            <option value="{{ $faculty->id }}" {{ $faculty->id == $data->faculty_id ? 'selected' : '' }}>{{ $faculty->title }}</option>
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
                                            <option value="{{ $department->id }}" {{ $department->id == $data->department_id ? 'selected' : '' }}>{{ $department->name }}</option>
                                            @endforeach
                                        </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="inputName" class="col-4 col-form-label">Slider Active Or Not</label>
                                <div class="switch">
                                    <label class="d-flex">OFF
                                        <input type="checkbox" {{ $data->isActive == 1 ? 'checked' : '' }} name="isActive">
                                        <span class="lever"></span>ON</label>
                                 </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="inputName" class="col-4 col-form-label">Type</label>
                                <div class="col-8">
                                    <input type="file" class="form-control" style="border: 1px solid black;" name="image">
                                </div>
                            </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                    <button type="submit" class="btn btn-link waves-effect">SAVE CHANGES</button>
                </div>
            </form>
            </div>
        </div>
