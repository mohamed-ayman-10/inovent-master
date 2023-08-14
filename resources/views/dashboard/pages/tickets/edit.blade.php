@extends('dashboard.layouts.master')
@section('title', 'Edit Ticket')
@section('page_title', 'Edit Ticket')
@section('page_title_main_nav', 'Tickets')
@section('page_title_nav', 'Edit')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Ticket</h3>
        </div>
        <div class="card-body">
            <form action="{{route('dashboard.tickets.update', $ticket->id)}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        {{-- Start Title --}}
                        <div class="form-group">
                            <label class="form-label">Title In English <span class="text-red">*</span></label>
                            <input type="text" name="title_en" value="{{old('title_en', $ticket->getTranslation('title', 'en'))}}" class="form-control"
                                   placeholder="Title In English">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Title In Arabic <span class="text-red">*</span></label>
                            <input type="text" name="title_ar" value="{{old('title_ar', $ticket->getTranslation('title', 'ar'))}}" class="form-control"
                                   placeholder="Title In Arabic">
                        </div>
                    </div>
                    {{-- End Title --}}
                    {{-- Start Sale --}}
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Start Sale <span class="text-red">*</span></label>
                            <input type="date" name="start_sale" value="{{old('start_sale', $ticket->start_sale)}}" class="form-control"
                                   placeholder="Start Sale">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">End Sale <span class="text-red">*</span></label>
                            <input type="date" name="end_sale" value="{{old('end_sale', $ticket->end_sale)}}" class="form-control"
                                   placeholder="End Sale">
                        </div>
                    </div>
                    {{-- End Sale --}}
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Price <span class="text-red">*</span></label>
                            <input type="number" name="price" value="{{old('price', $ticket->price)}}" class="form-control"
                                   placeholder="Price">
                        </div>
                    </div>
                    {{-- Start Description --}}
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Description In English <span class="text-red">*</span></label>
                            <textarea name="description_en" class="form-control">{{old('description_en', $ticket->getTranslation('description', 'en'))}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Description In Arabic <span class="text-red">*</span></label>
                            <textarea name="description_ar" class="form-control">{{old('description_ar', $ticket->getTranslation('description', 'ar'))}}</textarea>
                        </div>
                    </div>
                    {{-- End Description --}}
                </div>
                <input type="hidden" name="event_id" value="{{$ticket->event_id}}">
                <div class="card-footer">
                    <input type="submit" value="Create" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection
