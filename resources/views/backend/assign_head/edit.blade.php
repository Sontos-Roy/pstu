<div class="modal-dialog" role="document">
    <div class="modal-content">
        <form action="{{ route('admin.assign.department.head.store') }}" method="POST" id="ajax_form">
        <div class="modal-header">
            <h4 class="modal-title" id="createsettingLabel">Assign Department Head</h4>
        </div>
        <div class="modal-body">
                @csrf
                <div class="container">

                        <div class="col-sm-12">
                            <div class="mb-3 row">
                                <label for="" class="col-4 col-form-label">Select Department</label>
                                <div class="col-8">
                                        <select class="form-control shadow-none select2" name="department_id" id="">
                                            <option value="">Select one</option>
                                            @foreach ($departments as $department)
                                            <option value="{{ $department->id }}" @if ($item)
                                                {{ $item->id == $department->id ? 'selected' : '' }}
                                            @endif>{{ $department->name }}</option>
                                            @endforeach
                                        </select>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-12">
                            <div class="mb-3 row">
                                <label for="" class="col-4 col-form-label">Select Dean</label>
                                <div class="col-8">
                                        <select class="form-control shadow-none select2" name="user_id" id="">
                                            <option value="">Select one</option>
                                            @foreach ($users as $user)
                                            <option value="{{ $user->id }}" @if ($item)
                                                {{ $item->user_id == $user->id ? 'selected' : '' }}
                                            @endif>{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                </div>
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
