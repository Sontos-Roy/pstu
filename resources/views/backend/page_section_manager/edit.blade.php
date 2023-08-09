@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>Setting</h2>
        <small class="text-muted">Patuakhali Science &amp; Technology University</small>
    </div>
    <form action="" method="POST" id="ajax_form" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">

                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            
                            <div class="col-sm-6">
                                <input type="checkbox" name="permission[]" id="md_checkbox_" class="filled-in chk-col-deep-purple checkbox" value="">
                                <label for="md_checkbox_" style="color: black;">News</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="checkbox" name="permission[]" id="md_checkbox_" class="filled-in chk-col-deep-purple checkbox" value="">
                                <label for="md_checkbox_" style="color: black;">News</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="checkbox" name="permission[]" id="md_checkbox_" class="filled-in chk-col-deep-purple checkbox" value="">
                                <label for="md_checkbox_" style="color: black;">News</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="checkbox" name="permission[]" id="md_checkbox_" class="filled-in chk-col-deep-purple checkbox" value="">
                                <label for="md_checkbox_" style="color: black;">News</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="checkbox" name="permission[]" id="md_checkbox_" class="filled-in chk-col-deep-purple checkbox" value="">
                                <label for="md_checkbox_" style="color: black;">News</label>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-raised g-bg-blush2">Save</button>
                </div>
            </div>
        </div>
    </form>
</div>
<style>
    .imageSelect{
        padding: 20px;
    }
</style>
@endsection


