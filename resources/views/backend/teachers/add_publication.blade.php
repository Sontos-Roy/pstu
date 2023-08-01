<div class="modal-dialog modal-lg" role="document">
  <form method="post" action="{{ route('admin.user_publications.store')}}" id="ajax_form">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> {{ $user->name}} Add Publication</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <input type="hidden" name="user_id" value="{{ $user->id}}">

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>subject</label>
                        <input type="text" name="subject" class="form-control" style="border: 1px solid #ccc">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Project Name</label>
                        <input type="text" name="project_name" class="form-control" style="border: 1px solid #ccc">
                    </div>
                </div>

                

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>source </label>
                        <textarea name="source" class="form-control" style="border: 1px solid #ccc"></textarea>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>From Date</label>
                        <input type="date" name="from_date" class="form-control" value="{{ date('Y-m-d')}}" style="border: 1px solid #ccc">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>To Date</label>
                        <input type="date" name="to_date" class="form-control" value="{{ date('Y-m-d')}}" style="border: 1px solid #ccc">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>collaboration</label>
                        <input type="text" class="form-control" name="collaboration" style="border: 1px solid #ccc">
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