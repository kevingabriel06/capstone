@extends('layout.layout')

@section('content')

@if($errors->any())
              <div class="alert alert-warning border-0 d-flex align-items-center" role="alert">
                <div class="bg-warning me-3 icon-item"><span class="fas fa-exclamation-circle text-white fs-6"></span></div>

                  @foreach($errors->all() as $error)
                  <li class="mb-0 flex-1">
                    {{$error}}
                  </li>

                  @endforeach
                
                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
              
            
            <div class="card mb-3">
              <div class="card-body">
                <div class="row flex-between-center">
                  <div class="col-md">
                    <h5 class="mb-2 mb-md-0">Create Activity</h5>
                  </div>
                </div>
              </div>
            </div>

            
           
            <div class="card cover-image mb-3"><img class="card-img-top" src="{{ url('assets/img/generic/13.jpg') }}" alt="" /><input class="d-none" id="upload-cover-image" type="file" /><label class="cover-image-file-input" for="upload-cover-image"><span class="fas fa-camera me-2"></span><span>Change cover photo</span></label></div>
            <div class="row g-0"> 
              <div class="card mt-3">
                <div class="card mt-3">
                  <div class="card-header">
                    <h5 class="mb-0">Activity Details</h5>
                  </div>
                  <div class="card-body bg-body-tertiary">
                    <form method="post" id="form1" action="{{route('create.store')}}" novalidate="" class=" row g-3 needs-validation dropzone dropzone-multiple p-0" id="my-awesome-dropzone" data-dropzone="data-dropzone"  enctype="multipart/form-data">
                      @csrf
                      @method('post')
                      <div class="row gx-2">
                        <div class="col-12 mb-3"><label class="form-label" for="event-name">Activity Title</label><input class="form-control" id="event-name" type="text" placeholder="Activity Title" name="title" required=""/></div>  
                        <div class="col-sm-6 mb-3"><label class="form-label" for="start-date">Start Date</label><input class="form-control datetimepicker" id="start-date" type="text" placeholder="yyyy-mm-dd" name="date_start" data-options='{"dateFormat":"y/m/d","disableMobile":true}' required=""/></div>
                        <div class="col-sm-6 mb-3">
                          <label class="form-label" for="start-time">Start Time</label>
                          <input class="form-control datetimepicker" id="start-time" type="text" placeholder="hh:ii K" name="start_time" data-options='{"enableTime":true,"noCalendar":true,"dateFormat":"h:i K","disableMobile":true}' required=""/>
                        </div>

                        <div class="col-sm-6 mb-3"><label class="form-label" for="end-date">End Date</label><input class="form-control datetimepicker" id="end-date" type="text" placeholder="yyyy-mm-dd" name="date_end" data-options='{"dateFormat":"y/m/d","disableMobile":true}' required=""/></div>
                        <div class="col-sm-6 mb-3"><label class="form-label" for="end-time">End Time</label><input class="form-control datetimepicker" id="end-time" type="text" placeholder="hh:mm" name="end_time" data-options='{"enableTime":true,"noCalendar":true,"dateFormat":"H:i","disableMobile":true}' required=""/></div>
                        <div class="col-sm-6"><label class="form-label" for="registration-deadline">Registration Deadline</label><input class="form-control datetimepicker" id="registration-deadline" type="text" placeholder="yyyy-mm-dd" name="registration_deadline" data-options='{"dateFormat":"y/m/d","disableMobile":true}' /></div>
                        <div class="col-sm-6"><label class="form-label" for="registration-fee">Registration Fee</label><input class="form-control" id="registration-fee" type="text" placeholder="₱ 00.00" name="registration_fee"/></div>
                        <div class="border-bottom border-dashed my-3"></div>

                        <!-- department dropdown -->
                        <div class="col-sm-6 mb-3">
                          <label class="form-label" for="specific-dept">Department</label>
                          <select class="form-select" id="departmentSelect" name="department_name">
                              <option value="defaultdep" selected disabled>Select Department</option>
                              @foreach($departments as $department)
                                  <option value="{{$department->department_name}}" name="department_name">
                                      {{$department->department_name}}
                                  </option>
                              @endforeach
                          </select>
                      </div>

                      

  
                        <div class="col-12">
                          <div class="border-bottom border-dashed my-3"></div>
                        </div>
                        <div class="col-12"><label class="form-label" for="description">Description</label><textarea class="form-control" id="description" name="description"  rows="6"></textarea></div>

                        <div class="border-bottom border-dashed my-3"></div>

                        <!-- upload photos -->
                        <div class="card-header">
                            <h5 class="mb-1">Upload Photos</h5>
                        </div>
                        <div class="fallback">
                            <input type="file" name="image" multiple="multiple" />
                        </div>
                        <div class="dz-message" data-dz-message="data-dz-message">
                            <img class="me-2" src="{{ asset('assets/img/icons/cloud-upload.svg') }}" width="25" alt="" />
                            Drop your files here
                        </div>
                        <div class="dz-preview dz-preview-multiple m-0 d-flex flex-column">
                            <div class="d-flex media align-items-center mb-3 pb-3 border-bottom btn-reveal-trigger">
                                <img class="dz-image" src="{{ asset('assets/img/generic/image-file-2.png') }}" alt="..." data-dz-thumbnail="data-dz-thumbnail" />
                                <div class="flex-1 d-flex flex-between-center">
                                    <div>
                                        <h6 data-dz-name="data-dz-name"></h6>
                                        <div class="d-flex align-items-center">
                                            <p class="mb-0 fs-10 text-400 lh-1" data-dz-size="data-dz-size"></p>
                                            <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress=""></span></div>
                                        </div>
                                    </div>
                                    <div class="dropdown font-sans-serif">
                                        <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal dropdown-caret-none" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="fas fa-ellipsis-h"></span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end border py-2">
                                            <a class="dropdown-item" href="#!" data-dz-remove="data-dz-remove">Remove File</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="border-bottom border-dashed my-3"></div>
                        <h6>Listing Privacy</h6>
                        <div class="mb-3 form-check"><input class="form-check-input" id="customRadio4" type="radio" name="listingPrivacy" checked="checked" /><label class="form-label mb-0" for="customRadio4"> <strong>Public</strong></label>
                          <div class="form-text mt-0">Discoverable by anyone on City College of Calapan.</div>
                        </div>
                        <div class="mb-3 form-check"><input class="form-check-input" id="customRadio5" type="radio" name="listingPrivacy" /><label class="form-label mb-0" for="customRadio5"> <strong>Private</strong></label>
                          <div class="form-text mt-0">Accessible only by organization and department specified. </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <div class="card mt-3">
              <div class="card-body">
                <div class="row justify-content-between align-items-center">
                  <div class="col-md">
                    <h5 class="mb-2 mb-md-0">Nice Job! You're almost done</h5>
                  </div>
                  <div class="col-auto"><button class="btn btn-falcon-default btn-sm me-2" type="submit" form="form1">Save</button></div>
                </div>
              </div>
            </div>

@endsection