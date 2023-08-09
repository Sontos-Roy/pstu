<div class="modal-dialog" role="document">
    <div class="modal-content">
        <form action="{{ route('admin.assign.faculty.store') }}" method="POST" id="ajax_form">
        <div class="modal-header">
            <h4 class="modal-title" id="createsettingLabel">Assign Faculty Dean</h4>
        </div>
        <div class="modal-body">
                @csrf
                <div class="container">

                        <div class="col-sm-12">
                            <div class="mb-3 row">
                                <label for="" class="col-4 col-form-label">Select Faculty</label>
                                <div class="col-8">
                                        <select class="form-control shadow-none select2" name="faculty_id" id="">
                                            <option value="">Select one</option>
                                            @foreach (getFaculty() as $faculty)
                                            <option value="{{ $faculty->id }}" @if ($item)
                                                {{ $item->id == $faculty->id ? 'selected' : '' }}
                                            @endif>{{ $faculty->title }}</option>
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
