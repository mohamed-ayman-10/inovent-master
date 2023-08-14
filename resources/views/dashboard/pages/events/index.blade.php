@extends('dashboard.layouts.master')
@section('title', 'Events')
@section('page_title', 'Events')
@section('page_title_main_nav', 'Events')
@section('content')
    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('dashboard.events.create')}}" class="btn btn-primary">Create New Event</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">#</th>
                                <th class="wd-15p border-bottom-0">Title</th>
                                <th class="wd-20p border-bottom-0">Venue</th>
                                <th class="wd-15p border-bottom-0">Start date</th>
                                <th class="wd-15p border-bottom-0">End date</th>
                                <th class="wd-25p border-bottom-0">Description</th>
                                <th class="wd-25p border-bottom-0">Image</th>
                                <th class="wd-25p border-bottom-0">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($events as $index=>$event)
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td>{{$event->title}}</td>
                                        <td>{{$event->venue}}</td>
                                        <td>{{$event->start_date}}</td>
                                        <td>{{$event->end_date}}</td>
                                        <td title="{{$event->description}}"><span class="text-truncate d-inline-block" style="width: 150px">{{$event->description}}</span></td>
                                        <td><img src="{{asset('images/'.$event->image)}}" alt="Image Event" width="80" height="80"></td>
                                        <td>
                                            <a href="{{route('dashboard.events.edit', $event->id)}}" class="btn btn-success btn-sm"  data-bs-toggle="tooltip" data-bs-original-title="Edit"><i class="fa fa-edit"></i></a>
                                            <a class="btn btn-danger btn-sm" data-bs-target="#delete{{$event->id}}" data-bs-toggle="modal" href="javascript:void(0)"><i class="fa fa-trash"  data-bs-toggle="tooltip" data-bs-original-title="Delete"></i></a>
                                            <a href="{{route('dashboard.tickets.index', $event->id)}}" class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-original-title="Tickets"><i class="fa fa-ticket"></i></a>
                                            {{-- speakers --}}
                                            <a href="{{route('dashboard.speakers.show', $event->id)}}" class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-original-title="speaker"><i class="fa fa-video-camera"></i></a>
                                            {{-- exhibitors --}}
                                             <a href="{{route('dashboard.exhibitor.show', $event->id)}}" class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-original-title="exhibitors"><i class="fa fa-user"></i></a>
                                        </td>
                                    </tr>
                                    <!-- modal-Delete-Event -->
                                    <div class="modal fade" id="delete{{$event->id}}">
                                        <div class="modal-dialog modal-dialog-centered text-center" role="document">
                                            <div class="modal-content tx-size-sm">
                                                <div class="modal-body text-center p-4 pb-5">
                                                    <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                                                    <i class="icon icon-close fs-70 text-danger lh-1 my-5 d-inline-block"></i>
                                                    <h4 class="text-danger">Error: Are You Sure Delete!</h4>
                                                    <a href="{{route('dashboard.events.destroy', $event->id)}}" aria-label="Close" class="btn btn-danger pd-x-25">Continue</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- modal-Delete-Event -->
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->
@endsection
@section('scripts')
    <!-- DATA TABLE JS-->
    <script src="{{asset('backend')}}/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('backend')}}/assets/plugins/datatable/js/dataTables.bootstrap5.js"></script>
    <script src="{{asset('backend')}}/assets/plugins/datatable/js/dataTables.buttons.min.js"></script>
    <script src="{{asset('backend')}}/assets/plugins/datatable/js/buttons.bootstrap5.min.js"></script>
    <script src="{{asset('backend')}}/assets/plugins/datatable/js/jszip.min.js"></script>
    <script src="{{asset('backend')}}/assets/plugins/datatable/pdfmake/pdfmake.min.js"></script>
    <script src="{{asset('backend')}}/assets/plugins/datatable/pdfmake/vfs_fonts.js"></script>
    <script src="{{asset('backend')}}/assets/plugins/datatable/js/buttons.html5.min.js"></script>
    <script src="{{asset('backend')}}/assets/plugins/datatable/js/buttons.print.min.js"></script>
    <script src="{{asset('backend')}}/assets/plugins/datatable/js/buttons.colVis.min.js"></script>
    <script src="{{asset('backend')}}/assets/plugins/datatable/dataTables.responsive.min.js"></script>
    <script src="{{asset('backend')}}/assets/plugins/datatable/responsive.bootstrap5.min.js"></script>
    <script src="{{asset('backend')}}/assets/js/table-data.js"></script>
@endsection
