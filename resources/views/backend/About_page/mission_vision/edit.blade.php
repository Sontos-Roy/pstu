    
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
                                            <option value="{{ $faculty->id }}" {{ $data->faculty_id == $faculty->id ? 'selected' : '' }}>{{ $faculty->title }}</option>
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
                                            <option value="{{ $department->id }}" {{ $data->department_id == $department->id ? 'selected' : '' }}>{{ $department->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="" class="col-4 col-form-label">Short</label>
                                    <div class="col-12">
                                        <textarea name="short" style="border: 1px solid black; min-height: 100px;" class="form-control" cols="30" rows="10">{{ $data->short }}</textarea>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="" class="col-4 col-form-label">Details</label>
                                    <div class="col-12">
                                        <textarea name="details" id="editor" style="border: 1px solid black; min-height: 100px;" class="form-control" cols="30" rows="10">{!! $data->details !!}</textarea>
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
