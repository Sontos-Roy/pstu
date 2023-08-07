@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>NOC or GO Update</h2>
        <small class="text-muted">Patuakhali Science & Technology University</small>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12">

            <div class="card">
                <form action="{{ route('admin.noces.update',[$item->id]) }}" method="POST" id="ajax_form">
                    @csrf
                    @method('PATCH')
                    <div class="row clearfix">

                        <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputName"> User </label>
                                    <select class="form-control show-tick p-2" name="user_id">
                                        <option value="">-- User Select --</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}" {{ $user->id == $item->user_id ? 'selected': '' }} class="p-2">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputName"></label>
                                <select class="form-control show-tick p-2" name="type">
                                    <option value="">-- Select NOC Or GO --</option>
                                    <option value="noc"  {{ $item->type == 'noc' ? 'selected': '' }} class="p-2">NOC</option>
                                    <option value="go"  {{ $item->type == 'go' ? 'selected': '' }} class="p-2">GO</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="inputName"> Date </label>
                            <div>
                                <input type="date" class="form-control" style="border: 1px solid black;" name="date" value="{{ $item->date}}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="inputName"> Pdf File</label>
                            <div>
                                <input type="file" class="form-control" style="border: 1px solid black;" name="pdf_file">
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
