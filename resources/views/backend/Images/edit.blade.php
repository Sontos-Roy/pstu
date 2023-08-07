<div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="createsettingLabel">Outline Add</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.images.update', $data->id) }}" method="POST" id="ajax_form">
                    @csrf
                    @method('PUT')
                    <div class="container">
                            <div class="mb-3 row">
                                <label for="" class="col-4 col-form-label">Faculty</label>
                                <div class="col-8">
                                    <select name="faculty_id" id="" class="form-control">
                                        <option value="">Select One</option>
                                        @foreach ($faculties as $faculty)
                                            <option value="{{ $faculty->id }}">{{ $faculty->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="" class="col-4 col-form-label">Department</label>
                                <div class="col-8">
                                    <select name="department_id" id="" class="form-control">
                                        <option value="">Select One</option>
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="" class="col-4 col-form-label">Institute</label>
                                <div class="col-8">
                                    <select name="institute_id" id="" class="form-control">
                                        <option value="">Select One</option>
                                        @foreach ($institutes as $institute)
                                            <option value="{{ $institute->id }}">{{ $institute->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="" class="col-4 col-form-label">Programs</label>
                                <div class="col-8">
                                    <select name="program_id" id="" class="form-control">
                                        <option value="">Select One</option>
                                        @foreach ($programs as $program)
                                            <option value="{{ $program->id }}">{{ $program->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="" class="col-4 col-form-label">Details</label>
                                <div class="col-8">
                                    <input type="file" multiple class="form-control" style="border: 1px solid black;" name="images[]">
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