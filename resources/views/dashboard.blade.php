@include('partials.header')

          <!-- division -->
          <div class="card mb-3">
                <div class="card-body px-xxl-0 pt-4">
                <div class="row g-0">
                    <div class="col-xxl-3 col-md-6 px-3 text-center border-end-md border-bottom border-bottom-xxl-0 pb-3 p-xxl-0 ps-md-0">
                    <div class="icon-circle icon-circle-primary"><span class="fs-7 fas fa-user-graduate text-primary"></span></div>
                    <h4 class="mb-1 font-sans-serif"><span class="text-700 mx-2" data-countup='{"endValue":"4968"}'>0</span><span class="fw-normal text-600">Students</span></h4>
                    <p class="fs-10 fw-semi-bold mb-0">4203 <span class="text-600 fw-normal">last month</span></p>
                    </div>
                    <div class="col-xxl-3 col-md-6 px-3 text-center border-end-xxl border-bottom border-bottom-xxl-0 pb-3 pt-4 pt-md-0 pe-md-0 p-xxl-0">
                    <div class="icon-circle icon-circle-info"><span class="fs-7 fas fa-chalkboard-teacher text-info"></span></div>
                    <h4 class="mb-1 font-sans-serif"><span class="text-700 mx-2" data-countup='{"endValue":"324"}'>0</span><span class="fw-normal text-600">Admins</span></h4>
                    <p class="fs-10 fw-semi-bold mb-0">301 <span class="text-600 fw-normal">last month</span></p>
                    </div>
                    <div class="col-xxl-3 col-md-6 px-3 text-center border-end-md border-bottom border-bottom-md-0 pb-3 pt-4 p-xxl-0 pb-md-0 ps-md-0">
                    <div class="icon-circle icon-circle-success"><span class="fs-7 fas fa-book-open text-success"></span></div>
                    <h4 class="mb-1 font-sans-serif"><span class="text-700 mx-2" data-countup='{"endValue":"3712"}'>0</span><span class="fw-normal text-600">Activity</span></h4>
                    <p class="fs-10 fw-semi-bold mb-0">2779 <span class="text-600 fw-normal">last month</span></p>
                    </div>
                    <div class="col-xxl-3 col-md-6 px-3 text-center pt-4 p-xxl-0 pb-0 pe-md-0">
                    <div class="icon-circle icon-circle-warning"><span class="fs-7 fas fa-dollar-sign text-warning"></span></div>
                    <h4 class="mb-1 font-sans-serif"><span class="text-700 mx-2" data-countup='{"endValue":"1054"}'>0</span><span class="fw-normal text-600">Fines</span></h4>
                    <p class="fs-10 fw-semi-bold mb-0">1201 <span class="text-600 fw-normal">last month</span></p>
                    </div>
                </div>
                </div>
            </div>

            <!-- profile updates -->
          <div class="card mb-3">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col">
                  <h5 class="mb-0">Activity</h5>
                </div>
              </div>
            </div>

            <!-- table -->
            <div class="table-responsive scrollbar">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Activity</th>
                        <th scope="col">Status</th>
                        <th class="text-end" scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>


                    @foreach($activities as $activity)
                      <tr>
                          <td>{{$activity->date_start}}</td>
                          <td>{{$activity->title}}</td>
                          <td>
                              @if($activity->status == 'Upcoming')
                                  <span class="badge badge rounded-pill d-block p-2 badge-subtle-primary">{{$activity->status}}<span class="ms-1 fas fa-redo" data-fa-transform="shrink-2"></span></span>
                              @elseif($activity->status == 'Ongoing')
                                  <span class="badge badge rounded-pill d-block p-2 badge-subtle-warning">{{$activity->status}}<span class="ms-1 fas fa-stream" data-fa-transform="shrink-2"></span></span>
                              @else
                                  <span class="badge badge rounded-pill d-block p-2 badge-subtle-success">{{$activity->status}}<span class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span></span>
                              @endif
                          </td>
                          <td class="text-end">
                              <div>
                              @if($activity->status == 'Completed' || $activity->status == 'Ongoing' )
                                  <a href="{{ route('activity-details', ['activity_id' => $activity->activity_id]) }}" class="btn btn-link p-0" data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                      <span class="text-500 far fa-eye"></span>
                                  </a>
                              @else
                                  <button class="btn btn-link p-0 ms-2" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                      <span class="text-500 fas fa-edit"></span>
                                  </button>
                                  <a href="{{ route('activity-details', ['activity_id' => $activity->activity_id]) }}" class="btn btn-link p-0" data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                      <span class="text-500 far fa-eye"></span>
                                  </a>
                                  <button class="btn btn-link p-0 ms-2" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                      <span class="text-500 fas fa-trash-alt"></span>
                                  </button>
                              @endif

                              </div>
                          </td> 
                      </tr>
                  @endforeach



                    
                    </tbody>
                </table>
            </div>
            
 @include('partials.footer')         