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
