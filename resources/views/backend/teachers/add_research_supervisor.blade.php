<div class="modal-dialog modal-lg" role="document">
  <form method="post" action="{{ route('admin.user_research_supervision.store')}}" id="ajax_form">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> {{ $user->name}} Add Research Supervision</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <input type="hidden" name="user_id" value="{{ $user->id}}">

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" style="border: 1px solid #ccc">
                    </div>
                </div>

                

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Level Of Study </label>
                        <input type="text" name="level_of_study" class="form-control" style="border: 1px solid #ccc">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Supervisor </label>
                        <input type="text" name="supervisor" class="form-control" style="border: 1px solid #ccc">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Co-Supervisor </label>
                        <input type="text" name="co_supervisor" class="form-control" style="border: 1px solid #ccc">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Number Of Student </label>
                        <input type="text" name="no_of_student" class="form-control" style="border: 1px solid #ccc">
                    </div>
                </div>
                

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Area Research </label>
                        <textarea name="area_research" class="form-control" style="border: 1px solid #ccc"></textarea>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label> Current Completion  </label>
                        <textarea name="current_completion" class="form-control" style="border: 1px solid #ccc"></textarea>
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