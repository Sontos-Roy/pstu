@extends('backend.layouts.app')
@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>Home Block Show</h2>
        <small class="text-muted">Patuakhali Science & Technology University</small>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="row clearfix">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-line">
                                <p>{{ $item->name}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="inputName">Cover Image</label>
                        <div>
                            <img src="{{ getImage('home_blocks',$item->image)}}" width="200">
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
                                </tr>
                                <tbody class="data">
                                    @foreach($item->details as $key=>$detail)
                                    <tr>
                                        <td> {{ $detail->name}} </td>
                                        <td>  {{ $detail->published_date}}</td>
                                        <td> <img src="{{ getImage('home_block_details',$detail->image)}}" width="120"> </td>
                                        <td><a target="_blank" href="{{ getPdf('home_block_details',$detail->file)}}"> pdf </a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
