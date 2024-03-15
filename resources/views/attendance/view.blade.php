@extends('layout.layout')

@section('content')
<div class="card mb-3" id="customersTable" data-list='{"valueNames":["name","email","phone","address","joined"],"page":10,"pagination":true}'>
            <div class="card-header">
              <div class="row flex-between-center">
                <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
                  <h5 class="fs-9 mb-0 text-nowrap py-2 py-xl-0">Attendance</h5>
                </div>
                <div class="col-8 col-sm-auto text-end ps-2">
                  <div class="d-none" id="table-customers-actions">
                  </div>
                  <div id="table-customers-replace-element">
                    <button class="btn btn-falcon-default btn-sm mx-2" type="button"><span class="fas fa-filter" data-fa-transform="shrink-3 down-2"></span><span class="d-none d-sm-inline-block ms-1">Filter</span></button>
                    <button class="btn btn-falcon-default btn-sm" type="button"><span class="fas fa-external-link-alt" data-fa-transform="shrink-3 down-2"></span><span class="d-none d-sm-inline-block ms-1">Export</span></button></div>
                </div>
              </div>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive scrollbar">
                <table class="table table-sm table-striped fs-10 mb-0 overflow-hidden">
                  <thead class="bg-200">
                    <tr>
                      <th class="text-900 align-middle white-space-wrap" data-sort="id-number" style="min-width: 150px;">ID Number</th>
                      <th class="text-900 sort pe-1 align-middle white-space-wrap" data-sort="name">Name</th>
                      <th class="text-900 align-middle white-space-wrap" data-sort="date">Date</th>
                      <th class="text-900 align-middle white-space-wrap" data-sort="activity" style="min-width: 150px;">Activity</th>
                      <th class="text-900 align-middle white-space-wrap" data-sort="status">Status</th>
                      <th class="align-middle no-sort"></th>
                    </tr>
                  </thead>
                  <tbody class="list" id="table-customers-body">
                    <tr class="btn-reveal-trigger">
                    @foreach ($attendances as $attendance)
                      <tr>
                          <td class="id-number align-middle white-space-nowrap py-2">
                              <a href="customer-details.html">
                                  <div class="d-flex align-items-center"> <!-- Removed duplicate "d-flex" class -->
                                      <div class="flex-1">
                                          {{-- Check if the user relationship exists and if the student_id is not null --}}
                                          @if($attendance->user && $attendance->user->student_id === $attendance->student_id) <!-- Fixed variable name -->
                                              {{-- Display the student_id of the associated user --}}
                                              <h5 class="mb-0 fs-10">{{ $attendance->user->student_id }}</h5> <!-- Fixed variable name -->
                                          @else
                                              <h5 class="mb-0 fs-10">N/A</h5>
                                          @endif
                                      </div>
                                  </div>
                              </a>
                          </td>
                          <td class="name align-middle py-2">
                              {{-- Check if the user relationship exists --}}
                              {{ $attendance->user ? $attendance->user->name : 'N/A' }}
                          </td>
                          <td class="date align-middle py-2">
                              {{-- Check if the activity relationship exists --}}
                              {{ $attendance->activity ? $attendance->activity->start_date : 'N/A' }}
                          </td>
                          <td class="activity align-middle white-space-nowrap py-2">
                              {{-- Check if the activity relationship exists --}}
                              {{ $attendance->activity ? $attendance->activity->activity_name : 'N/A' }}
                          </td>
                          <td class="status align-middle white-space-wrap py-2">
                              <span class="badge badge rounded-pill d-block p-2 badge-subtle-success">Present<span class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span></span>
                          </td>
                      </tr>
                  @endforeach




                      
                      <td class="align-middle white-space-nowrap py-2 text-end">
                        <div class="dropdown font-sans-serif position-static"><button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" id="customer-dropdown-0" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs-10"></span></button>
                          <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="customer-dropdown-0">
                            <div class="py-2"><a class="dropdown-item" href="#!">Edit</a></div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    
                    <tr class="btn-reveal-trigger">
                      <td class="id-number align-middle white-space-nowrap py-2"><a href="customer-details.html">
                          <div class="d-flex d-flex align-items-center">
                            <div class="flex-1">
                              <h5 class="mb-0 fs-10">12-70001</h5>
                            </div>
                          </div>
                        </a></td>
                      <td class="name align-middle py-2">Pedro Gomez</td>
                      <td class="date align-middle py-2">30/03/2024</td>
                      <td class="activity align-middle white-space-nowrap py-2">Valentines Day 2024</td>
                      <td class="status align-middle white-space-wrap py-2">
                        <span class="badge badge rounded-pill d-block p-2 badge-subtle-warning">Absent<span class="ms-1 fas fa-times" data-fa-transform="shrink-2"></span></span>
                      </td>
                      
                      <td class="align-middle white-space-nowrap py-2 text-end">
                        <div class="dropdown font-sans-serif position-static"><button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" id="customer-dropdown-0" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs-10"></span></button>
                          <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="customer-dropdown-0">
                            <div class="py-2"><a class="dropdown-item" href="#!">Edit</a></div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <!-- dito ifefetch ang data from data base -->
                  </tbody>
                </table>

              </div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-center"><button class="btn btn-sm btn-falcon-default me-1" type="button" title="Previous" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
              <ul class="pagination mb-0"></ul><button class="btn btn-sm btn-falcon-default ms-1" type="button" title="Next" data-list-pagination="next"><span class="fas fa-chevron-right"></span></button>
            </div>
          </div>

@endsection