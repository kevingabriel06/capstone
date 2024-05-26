@extends('layout.layout')

@section('content')

  <!-- list of activities -->
  <div class="card mb-3">
    <div class="card-header">
      <div class="row align-items-center">
        <div class="col">
          <h5 class="mb-0">Excuse Application</h5>
        </div>
      </div>
    </div>

    <!-- table -->
    <div class="table-responsive scrollbar">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Student Name</th>
                <th scope="col">Document</th>
                <th class="text-end" scope="col">Status</th>
            </tr>
            </thead>
            <tbody>


            {{-- @foreach($activities as $activity) --}}
             {{-- <tr>
                  <td>.</td> {{$activity->date_start}} --}}
             {{--     <td>.</td> {{-- {{$activity->title}} --}}
              {{--    <td>
                      {{-- @if($activity->status == 'Upcoming')
                          <span class="badge badge rounded-pill d-block p-2 badge-subtle-primary">{{$activity->status}}<span class="ms-1 fas fa-redo" data-fa-transform="shrink-2"></span></span>
                      @elseif($activity->status == 'Ongoing')php artisan make:migration create_excuse_form_table --create=excuse_form

                          <span class="badge badge rounded-pill d-block p-2 badge-subtle-warning">{{$activity->status}}<span class="ms-1 fas fa-stream" data-fa-transform="shrink-2"></span></span>
                      @else
                          <span class="badge badge rounded-pill d-block p-2 badge-subtle-success">{{$activity->status}}<span class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span></span>
                      @endif --}}
                      .
             {{--     </td>
                  <td class="text-end">
                      <div>
                      {{-- @if($activity->status == 'Completed' || $activity->status == 'Ongoing' )
                          <a href="{{ route('activity-details', ['activity_id' => $activity->activity_id]) }}" class="btn btn-link p-0" data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                              <span class="text-500 far fa-eye"></span>
                          </a>
                      @else
                        <a href="{{ route('edit', ['activity' => $activity]) }}" class="btn btn-link p-0 ms-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                        <span class="text-500 fas fa-edit"></span>
                        </a>
                        <a href="{{ route('activity-details', ['activity_id' => $activity->activity_id]) }}" class="btn btn-link p-0" data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                            <span class="text-500 far fa-eye"></span>
                        </a>
                        <a href="{{ route('delete', ['activity_id' => $activity->activity_id]) }}" class="btn btn-link p-0 ms-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                        <span class="text-500 fas fa-trash-alt"></span>
                        </a>
                      @endif --}}

             {{--         </div>
                  </td>
              </tr>
          {{-- @endforeach --}}

             <tbody>
            <!-- Example row, you will likely loop through your data here -->
            <tr>
                <td>1</td>
                <td>John Doe</td>
                <td>Document 1</td>
                <td class="text-end">
                    <select class="form-select" name="status[]">
                        <option value="approve">Approve</option>
                        <option value="disapprove">Disapprove</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Jane Smith</td>
                <td>Document 2</td>
                <td class="text-end">
                    <select class="form-select" name="status[]">
                        <option value="approve">Approve</option>
                        <option value="disapprove">Disapprove</option>
                    </select>
                </td>
            </tr>
            <!-- Add more rows as needed -->
        </tbody>




            </tbody>
        </table>
    </div>








@endsection
