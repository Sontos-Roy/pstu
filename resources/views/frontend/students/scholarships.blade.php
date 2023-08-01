
@extends('frontend.partials.app')

@section('content')
<style>
    body{
        color: black;
    }
</style>
<div class="features-area bottom-less default-padding" style="margin-top: 15px;">
    <div class="container">
        <div class="row">
            <div class="features">
                <div data-aos="fade-left" class="equal-height col-md-12 col-sm-12" style="height: 320px;">
                    <div class="item mariner">
                        <center>
                            <h3>Apply For Govt. Scholarships</h3>
                        </center>
                        <br><br>
                        @if(session('success'))
                        <h4 class="text-success"><strong>{{ session('success') }}</strong></h4>
                    @endif
                        <form action="{{ route('front.scholarship.store') }}" method="POST">
                            @csrf
                            <br>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Student Name:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Student Id:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="student_id" placeholder="Enter Your Id" required>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Program:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="program" placeholder="Enter Program Name" required>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Year:</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="name" name="year" placeholder="Year" required>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Phone Number:</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="name" name="phone" placeholder="Enter Phone Number" required>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Email:</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="name" name="email" placeholder="Enter Email Address" required>
                                </div>
                            </div>

                            <br>
                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">Select For:</label>
                                <div class="col-sm-10">
                                    <select name="document_type" id="" class="form-control">
                                        <option value="">Scholarships</option>
                                    </select>
                                </div>
                            </div>

                            <br><br>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection
