@extends('layout.layout')

@section('content')

<body>
   <!-- Form outside the layout's navbar -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Excuse Application</h5>
                </div>
                <div class="card-body">
                    <form id="myForm">
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="First name">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Last name">
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Subject/Title">
                        </div>

                        <!-- department dropdown -->
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label class="form-label" for="departmentSelect1">Department</label>
                                <select class="form-select" id="departmentSelect1" name="department_name1">
                                    <option value="defaultdep1" selected disabled>Select Department</option>
                                    @foreach($departments as $department)
                                        <option value="{{$department->department_name}}" name="department_name1">
                                            {{$department->department_name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label" for="departmentSelect2">Year Level</label>
                                <select class="form-select" id="departmentSelect2" name="department_name2">
                                    <option value="defaultdep2" selected disabled>Select Year Level</option>
                                    @foreach($departments as $department)
                                        <option value="{{$department->department_name}}" name="department_name2">
                                            {{$department->department_name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="card-header">
                            <h5 class="card-title">Send a Message</h5>
                        </div>
                        <div class="card-body">
                            <form id="emailForm">
                                <div class="form-group">
                                    <label for="recipientEmail">To</label>
                                    <input type="email" class="form-control" id="recipientEmail" placeholder="Recipient's email" required>
                                </div>
                                <div class="form-group">
                                    <label for="emailSubject">Subject</label>
                                    <input type="text" class="form-control" id="emailSubject" placeholder="Subject" required>
                                </div>
                                <div class="form-group">
                                    <label for="emailBody">Message</label>
                                    <textarea class="form-control" id="emailBody" rows="8" placeholder="Type your message here..." required></textarea>
                                </div>

                                <br>

                                <div class="form-group">
                                    <label for="fileUpload">Upload Image</label>
                                    <input type="file" class="form-control-file" id="fileUpload" name="fileUpload" accept="image/*">
                                </div>

                                <br>
                                <button type="submit" class="btn btn-primary" style="float: right;">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
                    </div>
                </div>
            </div>
        </div>
    </div>







@endsection
