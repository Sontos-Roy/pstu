<div class="modal-dialog modal-lg" role="document">
  <form method="post" action="{{ route('admin.user_memberships.store')}}" id="ajax_form">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> {{ $user->name}} Add Membership</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <input type="hidden" name="user_id" value="{{ $user->id}}">

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" style="border: 1px solid #ccc">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Type</label>
                        <input type="text" name="type" class="form-control" style="border: 1px solid #ccc">
                    </div>
                </div>

                

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Membership Year </label>
                        <input type="text" name="membership_year" class="form-control" style="border: 1px solid #ccc">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label> Expire Year </label>
                        <input type="text" name="expire_year" class="form-control" style="border: 1px solid #ccc">
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