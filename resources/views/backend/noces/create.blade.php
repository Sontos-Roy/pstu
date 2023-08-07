@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>NOC or GO Create</h2>
        <small class="text-muted">Patuakhali Science & Technology University</small>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 ">

            <div class="card p-4">
                <form action="{{ route('admin.noces.store') }}" method="POST" id="ajax_form">
                    @csrf
                    <div class="row clearfix">

                        <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputName"> User </label>
                                    <select class="form-control show-tick p-2" name="user_id">
                                        <option value="">-- User Select --</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}" class="p-2">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputName"></label>
                                <select class="form-control show-tick p-2" name="type">
                                    <option value="">-- Select NOC Or GO --</option>
                                    <option value="noc"  class="p-2">NOC</option>
                                    <option value="go"  class="p-2">GO</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="inputName"> Date </label>
                            <div>
                                <input type="date" class="form-control" style="border: 1px solid black;" name="date" value="{{ date('Y-m-d')}}">
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
