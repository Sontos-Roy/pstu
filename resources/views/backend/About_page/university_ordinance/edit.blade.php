    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('admin.university-ordinances.update', $data->id) }}" method="POST" id="ajax_form">
            <div class="modal-header">
                <h4 class="modal-title" id="createsettingLabel">Vice Chancellors Edit</h4>
            </div>
            <div class="modal-body">
                    @csrf
                    @method("PUT")
                    <div class="container">
                            <div class="mb-3 row">
                                <label for="" class="col-4 col-form-label">Head Text</label>
                                <div class="col-8">
                                    <input type="text" class="form-control" style="border: 1px solid black;" name="title" value="{{ $data->title }}">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="inputName" class="col-4 col-form-label">File</label>
                                <div class="col-8">
                                    <input type="file" class="form-control" style="border: 1px solid black;" name="file">
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
