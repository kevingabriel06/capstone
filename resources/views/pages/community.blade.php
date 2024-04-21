@extends('layout.layout')

@section('content')
    <!-- division -->
    <div class="row g-3">
        <div class="col-lg-8">
            {{-- this is create post div --}}
            <div class="card mb-3">
                <div class="card-header bg-body-tertiary overflow-hidden">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-m">
                            <img class="rounded-circle" src="../../assets/img/team/1.jpg" alt="" />
                        </div>
                        <div class="flex-1 ms-2">
                            <h5 class="mb-0 fs-9">New Entry</h5>
                        </div>
                    </div>
                </div>
                {{-- error handling code  --}}
                <div>
                    @if($errors->any())
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <div class="card-body p-0">
                    <form method="post" action="{{ Auth::user()->user_role === 'admin' ? route('topics.store') : (Auth::user()->user_role === 'officer' ? route('officer.topics.store') : '') }}" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <textarea class="shadow-none form-control rounded-0 resize-none px-x1 border-y-0 border-200" placeholder="Enter title" rows="1" name="title"></textarea>
                        <div>
                            <br>
                        </div>
                        <textarea class="shadow-none form-control rounded-0 resize-none px-x1 border-y-0 border-200" placeholder="What do you want to talk about?" rows="4" name="description"></textarea>
                        <div class="d-flex align-items-center ps-x1 border border-200">
                            <label class="text-nowrap mb-0 me-2" for="hash-tags">
                                <span class="fas fa-plus me-1 fs-11"></span>
                                <span class="fw-medium fs-10">Category</span>
                            </label>
                            <input class="form-control border-0 fs-10 shadow-none" name="category" type="text" placeholder="Help the right person to see" />
                        </div>
                        <div class="row g-0 justify-content-between mt-3 px-x1 pb-3">
                            <div class="col">
                                <button class="btn btn-tertiary btn-sm rounded-pill shadow-none d-inline-flex align-items-center fs-10 mb-0 me-1" type="button">
                                    <img class="cursor-pointer" src="../../assets/img/icons/spot-illustrations/image.svg" width="17" alt="" />
                                    <span class="ms-2 d-none d-md-inline-block">
                                        <div class="fallback">
                                            <input id="fileInput" type="file" name="image" multiple />
                                        </div>
                                    </span>
                                </button>
                                <button class="btn btn-tertiary btn-sm rounded-pill shadow-none d-inline-flex align-items-center fs-10 me-1" type="button">
                                    <img class="cursor-pointer" src="../../assets/img/icons/spot-illustrations/calendar.svg" width="17" alt="" />
                                    <span class="ms-2 d-none d-md-inline-block">Event</span>
                                </button>
                            </div>
                            <div class="col-auto">
                                <div class="dropdown d-inline-block me-1">
                                    <button class="btn btn-sm dropdown-toggle px-1" id="dropdownMenuButton" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="fas fa-globe-americas"></span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Public</a>
                                        <a class="dropdown-item" href="#">Private</a>
                                        <a class="dropdown-item" href="#">Draft</a>
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-sm px-4 px-sm-5" type="submit">Share</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            {{-- end of create post div --}}

            {{-- start of normal post --}}
            @foreach($topics as $topic)
                <div class="card mb-3">
                    <div class="card-header bg-body-tertiary">
                        <div class="row justify-content-between">
                            <div class="col">
                                <div class="d-flex">
                                    <div class="avatar avatar-2xl status-online">
                                        <img class="rounded-circle" src="../../assets/img/team/4.jpg" alt="" />
                                    </div>
                                    <div class="flex-1 align-self-center ms-2">
                                        {{-- change elements depends on who created the post --}}
                                        <p class="mb-1 lh-1">
                                            <a class="fw-semi-bold" href="../../pages/user/profile.html">Username</a> shared a <a href="#!">post</a>
                                        </p>
                                        <p class="mb-0 fs-10">11 hrs timestamp &bull; department/organization &bull; <span class="fas fa-globe-americas"></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- start of title and description --}}
                    <div class="card-body overflow-hidden">
                        <h5>{{$topic->title}}</h5>
                        <p>{{$topic->description}}</p>
                        <h6>{{$topic->category}}</h6>
                        <div class="row mx-n1">
                            <div>
                                <a href="../../assets/img/generic/4.jpg" data-gallery="gallery-1">
                                    <img class="card-img-top" src="{{ asset($topic->image_path) }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    {{-- start of comment section --}}
                    <div class="card-footer bg-body-tertiary pt-0">
                        <div class="border-bottom border-200 fs-10 py-3">
                            <a class="text-700" href="#!">345 Likes</a> &bull; <a class="text-700" href="#!">34 Comments</a>
                        </div>
                        <div class="row g-0 fw-semi-bold text-center py-2 fs-10">
                            <div class="col-auto">
                                <a class="rounded-2 d-flex align-items-center me-3" href="#!">
                                    <img src="../../assets/img/icons/spot-illustrations/like-active.png" width="20" alt="" />
                                    <span class="ms-1">Like</span>
                                </a>
                            </div>
                            <div class="col-auto">
                                <a class="rounded-2 d-flex align-items-center me-3" href="#!">
                                    <img src="../../assets/img/icons/spot-illustrations/comment-active.png" width="20" alt="" />
                                    <span class="ms-1">Comment</span>
                                </a>
                            </div>
                            <div class="col-auto d-flex align-items-center">
                                <a class="rounded-2 text-700 d-flex align-items-center" href="#!">
                                    <img src="../../assets/img/icons/spot-illustrations/share-inactive.png" width="20" alt="" />
                                    <span class="ms-1">Share</span>
                                </a>
                            </div>
                        </div>
                        <form class="d-flex align-items-center border-top border-200 pt-3">
                            <div class="avatar avatar-xl">
                                <img class="rounded-circle" src="../../assets/img/team/3.jpg" alt="" />
                            </div>
                            <input class="form-control rounded-pill ms-2 fs-10" type="text" placeholder="Write a comment..." />
                        </form>
                        <div class="d-flex mt-3">
                            <div class="avatar avatar-xl">
                                <img class="rounded-circle" src="../../assets/img/team/4.jpg" alt="" />
                            </div>
                            <div class="flex-1 ms-2 fs-10">
                                <p class="mb-1 bg-200 rounded-3 p-2">
                                    <a class="fw-semi-bold" href="../../pages/user/profile.html">Rowan Atkinson</a>
                                    She starred as Jane Porter in The
                                    <a href="#!">@Legend of Tarzan (2016)</a>, Tanya Vanderpoel in Whiskey Tango Foxtrot (2016) and as DC comics villain Harley Quinn in Suicide Squad (2016), for which she was nominated for a Teen Choice Award, and many other awards.
                                </p>
                                <div class="px-2">
                                    <a href="#!">Like</a> &bull; <a href="#!">Reply</a> &bull; 23min
                                </div>
                            </div>
                        </div>
                        <div class="d-flex mt-3">
                            <div class="avatar avatar-xl">
                                <img class="rounded-circle" src="../../assets/img/team/3.jpg" alt="" />
                            </div>
                            <div class="flex-1 ms-2 fs-10">
                                <p class="mb-1 bg-200 rounded-3 p-2">
                                    <a class="fw-semi-bold" href="../../pages/user/profile.html">Jessalyn Gilsig</a>
                                    Jessalyn Sarah Gilsig is a Canadian-American actress known for her roles in television series, e.g., as Lauren Davis in Boston Public, Gina Russo in Nip/Tuck, Terri Schuester in Glee, and as Siggy Haraldson on the History Channel series Vikings. 🏆
                                </p>
                                <div class="px-2">
                                    <a href="#!">Like</a> &bull; <a href="#!">Reply</a> &bull; 3hrs
                                </div>
                            </div>
                        </div>
                        <a class="fs-10 text-700 d-inline-block mt-2" href="#!">Load more comments (2 of 34)</a>
                    </div>
                </div>
            @endforeach
            {{-- end of normal post --}}

            {{-- start of event post --}}
            <div class="card mb-3">
                <img class="card-img-top" src="../../assets/img/generic/13.jpg" alt="" />
                <div class="card-body overflow-hidden">
                    <div class="row justify-content-between align-items-center">
                        <div class="col">
                            <div class="d-flex">
                                <div class="calendar me-2">
                                    <span class="calendar-month">Dec</span><span class="calendar-day">31 </span>
                                </div>
                                <div class="flex-1 fs-10">
                                    <h5 class="fs-9"><a href="../events/event-detail.html">FREE New Year's Eve Midnight Harbor Fireworks</a></h5>
                                    <p class="mb-0">by <a href="#!">Boston Harbor Now</a></p><span class="fs-9 text-warning fw-semi-bold">$49.99 – $89.99</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-auto d-none d-md-block">
                            <button class="btn btn-falcon-default btn-sm px-4" type="button">Register</button>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-body-tertiary pt-0">
                    <div class="row g-0 fw-semi-bold text-center py-2 fs-10">
                        <div class="col-auto">
                            <a class="rounded-2 d-flex align-items-center me-3 text-700" href="#!">
                                <img src="../../assets/img/icons/spot-illustrations/like-inactive.png" width="20" alt="" />
                                <span class="ms-1">Like</span>
                            </a>
                        </div>
                        <div class="col-auto">
                            <a class="rounded-2 d-flex align-items-center me-3 text-700" href="#!">
                                <img src="../../assets/img/icons/spot-illustrations/comment-inactive.png" width="20" alt="" />
                                <span class="ms-1">Comment</span>
                            </a>
                        </div>
                        <div class="col-auto d-flex align-items-center">
                            <a class="rounded-2 text-700 d-flex align-items-center" href="#!">
                                <img src="../../assets/img/icons/spot-illustrations/share-inactive.png" width="20" alt="" />
                                <span class="ms-1">Share</span>
                            </a>
                        </div>
                    </div>
                    <form class="d-flex align-items-center border-top border-200 pt-3">
                        <div class="avatar avatar-xl">
                            <img class="rounded-circle" src="../../assets/img/team/3.jpg" alt="" />
                        </div>
                        <input class="form-control rounded-pill ms-2 fs-10" type="text" placeholder="Write a comment..." />
                    </form>
                </div>
            </div>
            {{-- end of event post --}}
        </div>
        {{-- end of whole post reflection --}}
        <div class="col-lg-4">
            <div class="card mb-3 mb-lg-0">
                <div class="card-header bg-body-tertiary">
                    <h5 class="mb-0">Latest Added Events</h5>
                </div>
                <div class="card-body fs-10">
                    @foreach($activities as $activity)
                        <div class="d-flex btn-reveal-trigger">
                            @php
                                $date= new DateTime($activity->date_start)
                            @endphp
                            @php
                                $startTime = new DateTime($activity->start_time)
                            @endphp
                            @php
                                $endTime = new DateTime($activity->end_time)
                            @endphp
                            <div class="calendar">
                                <span class="calendar-month">{{$date->format('M')}}</span>
                                <span class="calendar-day">{{$date->format('d')}}</span>
                            </div>
                            <div class="flex-1 position-relative ps-3">
                                <h6 class="fs-9 mb-0"><a href="{{ route('activity-details', ['activity_id' => $activity->activity_id]) }}">{{$activity->title}}</a></h6>
                                <p class="mb-1">{{$activity->description}}<a href="#!" class="text-700"></a></p>
                                <p class="text-1000 mb-0">Time: {{$startTime->format('H:i')}}</p>
                                <p class="text-1000 mb-0">Duration: {{$startTime->format('H:i')}} - {{$endTime->format('H:i')}}</p>
                                <div class="border-bottom border-dashed my-3"></div>
                            </div>
                        </div>
                        @if ($loop->iteration == 3) {{-- Limiting to 5 iterations --}}
                            @break
                        @endif
                    @endforeach
                </div>
                <div class="card-footer bg-body-tertiary p-0 border-top">
                    <a class="btn btn-link d-block w-100" href="{{route('home')}}">All Events<span class="fas fa-chevron-right ms-1 fs-11"></span></a>
                </div>
            </div>
        </div>
    </div>
@endsection
