@extends('dashboard.layouts.master')
@section('title', 'Tickets')
@section('page_title', 'Tickets')
@section('page_title_main_nav', 'Tickets')
@section('content')
    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <a href="{{route('dashboard.tickets.create', $event->id)}}" class="btn btn-primary">Create New Ticket</a>
                    <h3 class="m-0">{{$event->getTranslation('title', 'en') . ' - ' . $event->getTranslation('title', 'ar')}}</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">#</th>
                                <th class="wd-15p border-bottom-0">Title</th>
                                <th class="wd-20p border-bottom-0">price</th>
                                <th class="wd-15p border-bottom-0">Start Sale</th>
                                <th class="wd-15p border-bottom-0">End Sale</th>
                                <th class="wd-25p border-bottom-0">Description</th>
                                <th class="wd-25p border-bottom-0">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($tickets as $index=>$ticket)
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td>{{$ticket->title}}</td>
                                        <td>{{$ticket->price}}</td>
                                        <td>{{$ticket->start_sale}}</td>
                                        <td>{{$ticket->end_sale}}</td>
                                        <td title="{{$ticket->description}}"><span class="text-truncate d-inline-block" style="width: 150px">{{$ticket->description}}</span></td>
                                        <td>
                                            <a href="{{route('dashboard.tickets.edit', $ticket->id)}}" class="btn btn-success btn-sm" data-bs-toggle="tooltip" data-bs-original-title="Edit"><i class="fa fa-edit"></i></a>
                                            <a class="btn btn-danger btn-sm" data-bs-target="#delete{{$ticket->id}}" data-bs-toggle="modal" href="javascript:void(0)"><i class="fa fa-trash"  data-bs-toggle="tooltip" data-bs-original-title="Delete"></i></a>
                                        </td>
                                    </tr>
                                    <!-- modal-Delete-Ticket -->
                                    <div class="modal fade" id="delete{{$ticket->id}}">
                                        <div class="modal-dialog modal-dialog-centered text-center" role="document">
                                            <div class="modal-content tx-size-sm">
                                                <div class="modal-body text-center p-4 pb-5">
                                                    <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                                                    <i class="icon icon-close fs-70 text-danger lh-1 my-5 d-inline-block"></i>
                                                    <h4 class="text-danger">Error: Are You Sure Delete!</h4>
                                                    <a href="{{route('dashboard.tickets.destroy', $ticket->id)}}" aria-label="Close" class="btn btn-danger pd-x-25">Continue</a>
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
