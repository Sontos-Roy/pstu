    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('admin.honoris-causas.update', $data->id) }}" method="POST" id="ajax_form">
            <div class="modal-header">
                <h4 class="modal-title" id="createsettingLabel">Honoris Edit</h4>
            </div>
            <div class="modal-body">
                    @csrf
                    @method("PUT")
                    <div class="container">
                        <div class="mb-3 row">
                            <label for="" class="col-4 col-form-label">Add Name</label>
                            <div class="col-8">
                                <input type="text" class="form-control" value="{{ $data->name }}" style="border: 1px solid black;" name="name">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="" class="col-4 col-form-label">Add Award Name</label>
                            <div class="col-8">
                                <input type="text" class="form-control" value="{{ $data->award }}" style="border: 1px solid black;" name="award">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="" class="col-4 col-form-label">Add Year</label>
                            <div class="col-8">
                                <input type="text" class="form-control" value="{{ $data->year }}" style="border: 1px solid black;" name="year">
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
