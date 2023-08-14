@extends('dashboard.layouts.master')
@section('title', 'exhibitors')
@section('page_title', 'exhibitors')
@section('page_title_main_nav', 'exhibitors')
@section('content')
    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <a href="{{ url('dashboard/exhibitor/create?event_id=' . $id) }}" class="btn btn-primary">Create New
                        exhibitor</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">#</th>
                                    <th class="wd-15p border-bottom-0">title</th>
                                    <th class="wd-20p border-bottom-0">sponsor</th>
                                    <th class="wd-25p border-bottom-0">grade</th>
                                    <th class="wd-25p border-bottom-0">Event</th>
                                    <th class="wd-25p border-bottom-0">Image</th>
                                    <th class="wd-25p border-bottom-0">Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($exhibitors as $index => $exhibitor)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $exhibitor->title }}</td>
                                        <td>{{ $exhibitor->sponsor }}</td>
                                        <td>{{ $exhibitor->grade }}</td>
                                        <td>{{ $exhibitor->event->title }}</td>
                                        <td>
                                            <img src="{{ asset('images/' . $exhibitor->image) }}" height="100"
                                                alt="{{ $exhibitor->name }}">
                                        </td>
                                        <td>
                                            <a href="{{ route('dashboard.exhibitor.edit', $exhibitor->id) }}"
                                                class="btn btn-success btn-sm" data-bs-toggle="tooltip"
                                                data-bs-original-title="Edit"><i class="fa fa-edit"></i></a>
                                            <a class="btn btn-danger btn-sm" data-bs-target="#delete{{ $exhibitor->id }}"
                                                data-bs-toggle="modal" href="javascript:void(0)"><i class="fa fa-trash"
                                                    data-bs-toggle="tooltip" data-bs-original-title="Delete"></i></a>
                                        </td>
                                    </tr>
                                    <!-- modal-Delete-Speaker -->
                                    <div class="modal fade" id="delete{{ $exhibitor->id}}">
                                        <div class="modal-dialog modal-dialog-centered text-center" role="document">
                                            <div class="modal-content tx-size-sm">
                                                <div class="modal-body text-center p-4 pb-5">
                                                    <button aria-label="Close" class="btn-close position-absolute"
                                                        data-bs-dismiss="modal"><span
                                                            aria-hidden="true">&times;</span></button>
                                                    <i
                                                        class="icon icon-close fs-70 text-danger lh-1 my-5 d-inline-block"></i>
                                                    <h4 class="text-danger">Error: Are You Sure Delete!</h4>
                                                    <form action="{{ route('dashboard.exhibitor.destroy', $exhibitor->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button aria-label="Close"
                                                            class="btn btn-danger pd-x-25">Continue</button>
                                                    </form>
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
    <script src="{{ asset('backend') }}/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('backend') }}/assets/plugins/datatable/js/dataTables.bootstrap5.js"></script>
    <script src="{{ asset('backend') }}/assets/plugins/datatable/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('backend') }}/assets/plugins/datatable/js/buttons.bootstrap5.min.js"></script>
    <script src="{{ asset('backend') }}/assets/plugins/datatable/js/jszip.min.js"></script>
    <script src="{{ asset('backend') }}/assets/plugins/datatable/pdfmake/pdfmake.min.js"></script>
    <script src="{{ asset('backend') }}/assets/plugins/datatable/pdfmake/vfs_fonts.js"></script>
    <script src="{{ asset('backend') }}/assets/plugins/datatable/js/buttons.html5.min.js"></script>
    <script src="{{ asset('backend') }}/assets/plugins/datatable/js/buttons.print.min.js"></script>
    <script src="{{ asset('backend') }}/assets/plugins/datatable/js/buttons.colVis.min.js"></script>
    <script src="{{ asset('backend') }}/assets/plugins/datatable/dataTables.responsive.min.js"></script>
    <script src="{{ asset('backend') }}/assets/plugins/datatable/responsive.bootstrap5.min.js"></script>
    <script src="{{ asset('backend') }}/assets/js/table-data.js"></script>
@endsection
