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
                            <h5 class="mb-1">Upload Photo</h5>
                        </div>
                        <div class="dropzone dropzone-single p-0" id="myDropzone" data-dropzone="data-dropzone" data-options='{"url":"{{ route("create.store") }}"}'>
                            <div class="fallback">
                                <input type="file" name="file" />
                            </div>
                            <div class="dz-preview dz-preview-single">
                                <div class="dz-preview-cover dz-complete">
                                    <img class="dz-preview-img" src="{{ asset('assets/img/generic/image-file-2.png') }}" alt="..." data-dz-thumbnail="" />
                                    <a class="dz-remove text-danger" href="#!" data-dz-remove="data-dz-remove"><span class="fas fa-times"></span></a>
                                    <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress=""></span></div>
                                    <div class="dz-errormessage m-1"><span data-dz-errormessage="data-dz-errormessage"></span></div>
                                </div>
                                <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress=""></span></div>
                            </div>
                            <div class="dz-message" data-dz-message="data-dz-message">
                                <div class="dz-message-text">
                                    <img class="me-2" src="{{ asset('assets/img/icons/cloud-upload.svg') }}" width="25" alt="" />Drop your file here
                                </div>
                            </div>
                        </div>

                        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script>
                        <script>
                            Dropzone.autoDiscover = false;
                            $(document).ready(function () {
                                var myDropzone = new Dropzone(".dropzone-single", {
                                    acceptedFiles: 'image/*', // Allow only image files
                                    addRemoveLinks: true,
                                    dictRemoveFile: 'Remove File',
                                    previewsContainer: ".dz-preview",
                                    thumbnailWidth: 120,
                                    thumbnailHeight: 120,
                                    init: function () {
                                        this.on("success", function (file, response) {
                                            console.log(response); // Handle success response from server
                                        });
                                        this.on("removedfile", function (file) {
                                            console.log(file); // Handle remove file event
                                        });
                                    }
                                });

                                // Customize remove file button
                                $(".dz-remove").on("click", function (e) {
                                    e.preventDefault();
                                    var file = $(this).closest(".dz-preview");
                                    myDropzone.removeFile(file.get(0));
                                });
                            });
                        </script>

                        

                        <!--post privacy -->
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