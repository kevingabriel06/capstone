@extends('layout.layout')

@section('content')
<div class="card mb-3">
  <img class="card-img-top" src="{{ url($activity->image_path) }}" alt="">

            <div class="card-body">
              <div class="row justify-content-between align-items-center">
                <div class="col">
                  <div class="d-flex">
                    <div class="calendar me-2">
                      @if(isset($activity->date_start))
                          @php
                              $startDate = \Carbon\Carbon::parse($activity->date_start);
                          @endphp
                          <span class="calendar-month">{{ $startDate->format('M') }}</span>
                          <span class="calendar-day">{{ $startDate->format('d') }}</span>
                      @endif
                    </div>
    
                    <div class="flex-1 fs-10">
                    @if(isset($activity->title))
                        <h5 class="fs-9">{{ $activity->title }}</h5>
                    @endif

                    <p class="mb-0">by  
                      @if($activity->department_id == $department->department_id)
                          <span class="mb-1">
                              {{ $department->department_name }} 
                          </span>
                      @endif
                    </p>

                    @if(isset($activity->title))
                    <span class="fs-9 text-warning fw-semi-bold">
                      {{ \Carbon\Carbon::parse($activity->am_in)->format('h:i A') }} - 
                      {{ \Carbon\Carbon::parse($activity->pm_out)->format('h:i A') }}
                    </span>
                    @endif
                    </div>
                  </div>
                </div>

                @if(isset($activity->status) && $activity->status == 'Ongoing')
                    <div class="col-md-auto mt-4 mt-md-0">
                        <button class="btn btn-falcon-default btn-sm me-2" type="button">
                            <span class="fas far fa-user text-danger me-1"></span>-0-
                        </button>
                        <button class="btn btn-falcon-default btn-sm me-2" type="button">
                            <span class="fas far fa-user text-danger me-1"></span>Edit Schedules
                        </button>
                        <button class="btn btn-falcon-default btn-sm me-2" type="button">
                            <span class="fas fa-share-alt me-1"></span>Share
                        </button>
                        <button class="btn btn-falcon-primary btn-sm px-4 px-sm-5" id="redirectButton">
                            <span class="far fa-address-card me-1"></span>Scan QR
                        </button>
                    </div>
                @else
                    <div class="col-md-auto mt-4 mt-md-0">
                        <button class="btn btn-falcon-default btn-sm me-2" type="button">
                            <span class="fas fa-share-alt me-1"></span>Share
                        </button>
                    </div>
                @endif


                <!-- Script to handle button click -->
                <script>
                    // Get the button element by its ID
                    const button = document.getElementById('redirectButton');

                    // Add an event listener to the button
                    button.addEventListener('click', function() {
                        // Redirect to another page
                        window.location.href = "{{ route('qr-scanner',  ['activity_id' => $activity_id] )}}";
                    });
                </script>
                
                </div>
                
            </div>
          </div>

          <div class="row g-0">
            <div class="col-lg-8 pe-lg-2">
                <div class="card mb-2 mb-lg-0">
                    <div class="card-body">
                        <p>{{ $activity->description }}</p>  
                    </div>
                </div>
            </div>


            <div class="col-lg-4 ps-lg-2">
              <div class="sticky-sidebar">
                <div class="card mb-3 mb-lg-0">
                  <div class="card-header bg-body-tertiary">
                    <h5 class="mb-0">Upcoming Activities</h5>
                  </div>

                  @if(isset($activities) && count($activities) > 0)
                      @foreach($activities as $activityUp)
                          @if($activityUp->status == 'Upcoming' && $activityUp->activity_id != $activity_id)
                              <div class="card-body fs-10">
                                  <div class="d-flex btn-reveal-trigger">
                                      <div class="calendar">
                                          @if(isset($activityUp->date_start))
                                              @php
                                                  $startDate = \Carbon\Carbon::parse($activityUp->date_start);
                                              @endphp
                                              <span class="calendar-month">{{ $startDate->format('M') }}</span>
                                              <span class="calendar-day">{{ $startDate->format('d') }}</span>
                                          @endif
                                      </div>

                                      <div class="flex-1 position-relative ps-3">
                                          <h6 class="fs-9 mb-0"><a href="event-detail.html">{{ $activityUp->title }}</a></h6>
                                          <p class="mb-1">Organized by
                                              <strong>
                                                  @foreach($departments as $departmentUp)
                                                      @if($activityUp->department_id == $departmentUp->department_id)
                                                          {{ $departmentUp->department_name }}
                                                      @endif
                                                  @endforeach
                                              </strong>
                                          </p>
                                          <p class="text-1000 mb-0">Time: {{ \Carbon\Carbon::parse($activityUp->am_im)->format('h:i A') }}</p>
                                          <p class="text-1000 mb-0">Duration: {{ \Carbon\Carbon::parse($activityUp->am_in)->format('h:i A') }} - {{ \Carbon\Carbon::parse($activityUp->pm_in)->format('h:i A') }}</p>
                                          <div class="border-bottom border-dashed my-3"></div>
                                      </div>
                                  </div>
                              </div>
                          @endif
                      @endforeach
                  @else
                      <div class="card-body bg-body-tertiary text-center">
                          <h6 class="mb-0">No upcoming activities found.</h6>
                      </div>
                  @endif

                </div>
              </div>
            </div>
          </div>

@endsection