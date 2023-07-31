<div class="modal-dialog modal-lg" role="document">
  <form method="post" action="{{ route('admin.user_educations.store')}}" id="ajax_form">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> {{ $user->name}} Add Education</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <input type="hidden" name="user_id" value="{{ $user->id}}">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Degree Name</label>
                        <input type="text" name="degree_name" class="form-control" style="border: 1px solid #ccc">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Mejor Subject</label>
                        <input type="text" name="mejor_subject" class="form-control" style="border: 1px solid #ccc">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label> Institute </label>
                        <input type="text" name="institute" class="form-control" style="border: 1px solid #ccc">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label> Country </label>
                        <input type="text" name="country" class="form-control" style="border: 1px solid #ccc">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Passing Year </label>
                        <input type="text" name="passing_year" class="form-control" style="border: 1px solid #ccc">
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