<div class="modal-dialog modal-lg" role="document">
  <form method="post" action="{{ route('admin.user_research_interest.store')}}" id="ajax_form">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> {{ $user->name}} Add Research Interest</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <input type="hidden" name="user_id" value="{{ $user->id}}">

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Subject</label>
                        <input type="text" name="subject" class="form-control" style="border: 1px solid #ccc">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Research Interest</label>
                        <input type="text" name="research" class="form-control" style="border: 1px solid #ccc">
                    </div>
                </div>

                

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Description </label>
                        <textarea name="description" class="form-control" style="border: 1px solid #ccc"></textarea>
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