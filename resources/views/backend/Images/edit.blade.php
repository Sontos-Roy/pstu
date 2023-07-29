    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('admin.historical-outline.update', $data->id) }}" method="POST" id="ajax_form">
            <div class="modal-header">
                <h4 class="modal-title" id="createsettingLabel">Outline Edit</h4>
            </div>
            <div class="modal-body">
                    @csrf
                    @method("PUT")
                    <div class="container">
                        <div class="mb-3 row">
                            <label for="" class="col-4 col-form-label">Add Year</label>
                            <div class="col-8">
                                <input type="text" class="form-control" value="{{ $data->year }}" style="border: 1px solid black;" name="year">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="" class="col-4 col-form-label">Details</label>
                            <div class="col-8">
                                <textarea name="details" id="" style="border: 1px solid black; min-height: 100px;" class="form-control" cols="30" rows="10">{{ $data->details }}</textarea>
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
