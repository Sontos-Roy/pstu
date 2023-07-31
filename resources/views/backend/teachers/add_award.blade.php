<div class="modal-dialog modal-lg" role="document">
  <form method="post" action="{{ route('admin.user_awards.store')}}" id="ajax_form">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> {{ $user->name}} Add Award</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <input type="hidden" name="user_id" value="{{ $user->id}}">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Type</label>
                        <input type="text" name="type" class="form-control" style="border: 1px solid #ccc">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" style="border: 1px solid #ccc">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Year </label>
                        <input type="text" name="year" class="form-control" style="border: 1px solid #ccc">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label> Country </label>
                        <input type="text" name="country" class="form-control" style="border: 1px solid #ccc">
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <label> Description </label>
                        <textarea name="description" style="border: 1px solid #ccc" class="form-control"></textarea>
                    </div>
                </div>

                


            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Save</button>
        </div>
      </div>
  </form>
    
  </div>