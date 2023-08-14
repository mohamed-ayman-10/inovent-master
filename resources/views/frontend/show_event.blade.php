@extends('frontend.layouts.master')
@section('title', 'Event')
@section('events', 'active')
@section('content')

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">@lang('Get Ticket')</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('payment') }}" method="post">
                    @csrf
                    <div class="modal-body">

                        <div class="form-group mb-3">
                            <label class="form-label">First Name</label>
                            <input type="text" name="first_name" class="form-control" placeholder="First Name" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Last Name</label>
                            <input type="text" name="last_name" class="form-control" placeholder="Last Name" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Phone</label>
                            <input type="number" name="phone" class="form-control" placeholder="Phone" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email" required>
                        </div>
                        <input type="hidden" name="event_id" value="{{ $event->id }}">
                        <input type="hidden" name="ticket_id" value="{{ $event->tickets[0]->id }}">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="bg-secondary py-2 px-4 text-light rounded-pill border-0"
                            data-bs-dismiss="modal">Close
                        </button>
                        <button type="submit" class="bg-main-2 py-2 px-4 text-light rounded-pill border-0">Save
                            changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Ticket --}}
    <section class="ticket py-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-6">
                    <div class="content">
                        <h2 class="text-main-color text-center text-lg-start fw-bold">{{ $event->title }}</h2>
                    </div>
                </div>
                <div class="col-lg-6 bg-black d-flex  align-items-center">
                    @if ($event->tickets->isEmpty())
                        <p class="text-light">Not Available Ticket Now</p>
                    @else
                        <div class="row w-100 py-5">
                            <div class="col-6">
                                <h3 class="text-main-color mx-4">{{ $event->title }}</h3>
                            </div>
                            <div class="col-6">
                                <p class="d-block date text-main-2">{{ date('N M Y', strtotime($event->start_date)) }}
                                </p>
                                <p class="d-block date text-main-2">{{ date('N M Y', strtotime($event->end_date)) }}</p>
                                <p class="d-block price text-light">{{ $event->tickets[0]->price }}</p>
                            </div>
                        </div>
                    @endif
                </div>

            </div>
            <div class="row ticket_footer mt-5 pt-5">
                <div class="col-md-8 text-center text-md-start mb-5 mb-md-0">
                    <p class="text-muted me-md-5 m-0 ">{{ $event->description }}</p>
                </div>
                <div class="col-md-4 d-flex align-items-center justify-content-center">
                    @if ($event->tickets->isEmpty())
                    @else
                        <a type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"
                            class="bg-main-2 py-2 px-4 text-light rounded-pill">@lang('Get Ticket')</a>
                    @endif
                </div>
            </div>
        </div>
    </section>

    {{-- Join Event --}}
    <style>
        .play {
            position: relative;
            height: 600px;
            width: 650px;
            margin: 0 auto;
        }

        @media (max-width: 676px) {
            .play {
                width: 100%;
                height: auto;
            }
        }

        .play::before {
            content: '';
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            width: 0;
            height: 0;
            background-color: #0000009e;
            transition: .4s;
            border-radius: 50%
        }

        .play:hover::before {
            width: 100%;
            height: 100%;
            border-radius: 0;
        }

        .icon-play {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            font-size: 100px;
            width: 100px;
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .icon-play i {
            transform: translate(4px, -5px);
        }
    </style>
    <div class="carousel py-5">
        <div class="container">
            <div class="play">
                @if ($event->start_date <= now() and $event->end_date > now())
                    <button form="form" type="submit">
                        <div class="icon-play rounded-circle bg-main-2">
                            <i class="bi bi-play-fill text-light"></i>
                        </div>
                    </button>
                    <form id="form" action="{{ url('showIframe') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $event->id }}">
                    </form>
                @endif
                <img src="{{ asset('images/carousel.png') }}" class="d-block w-100 h-100" alt="...">
            </div>
        </div>
    </div>


    {{-- Current Events --}}

    {{-- Upcoming Now --}}

@endsection
