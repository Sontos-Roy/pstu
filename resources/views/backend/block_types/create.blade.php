@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>Home Block Create</h2>
        <small class="text-muted">Patuakhali Science & Technology University</small>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12">

            <div class="card">
                <form action="{{ route('admin.home_block_types.store') }}" method="POST" id="ajax_form">
                    @csrf
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="name" placeholder="Home Block Title">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="inputName">Cover Image</label>
                            <div>
                                <input type="file" class="form-control" style="border: 1px solid black;" name="image">
                            </div>
                       
                            
                        </div>

                        <div class="col-md-12">
                            
                                <h5> Block Details </h5>

                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th width="30%"> Title</th>
                                            <th width="10%"> Published Date</th>
                                            <th width="15%"> Image </th>
                                            <th width="15%"> Pdf</th>
                                            <th width="10%"> Action</th>
                                        </tr>

                                        <tbody class="data">
                                            <tr>
                                                <td>
                                                    <input type="text" name="titles[]" required class="form-control" style="border: 1px solid black;" placeholder="Enter Title ..">
                                                        
                                                </td>
                                                <td> 
                                                    <input type="date" name="dates[]" required class="form-control" value="{{ date('Y-m-d')}}">
                                                </td>
                                                <td> 
                                                    <input type="file" name="images[]" class="form-control">
                                                 </td>
                                                <td> 

                                                    <input type="file" name="pdf_files[]" class="form-control">

                                                </td>
                                                <td> 
                                                    <a class="btn btn-xs btn-primary add_row" style="cursor: pointer;color: #fff"> Add</a>
                                                </td>
                                            </tr>
                                        </tbody>


                                    </table>
                                </div>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-primary" type="submit" style="cursor: pointer;color: #fff">Submit</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script type="text/javascript">
    $(document).on('click','a.add_row', function(){

        let row=`<tr>
                    <td>
                        <input type="text" name="titles[]" required class="form-control" style="border: 1px solid black;" placeholder="Enter Title ..">
                    </td>
                    <td> 
                        <input type="date" name="dates[]" required class="form-control" value="{{ date('Y-m-d')}}">
                    </td>
                    <td> 
                        <input type="file" name="images[]" class="form-control">
                     </td>
                    <td> 
                        <input type="file" name="pdf_files[]" class="form-control">
                    </td>
                    <td> 
                        <a class="btn btn-xs btn-primary add_row" style="cursor: pointer;color:#fff"> Add</a>
                        <a class="btn btn-xs btn-danger remove_row" style="cursor: pointer;color:#fff"> Remove</a>
                    </td>
                </tr>`;
        $('tbody.data').append(row);
    });

    $(document).on('click','a.remove_row', function(){
        var whichtr = $(this).closest("tr");
        whichtr.remove();      
    });
</script>

@endpush
