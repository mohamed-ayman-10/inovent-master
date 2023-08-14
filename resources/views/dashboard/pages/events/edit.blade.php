@extends('dashboard.layouts.master')
@section('title', 'Edit Event')
@section('page_title', 'Edit Event')
@section('page_title_main_nav', 'Events')
@section('page_title_nav', 'Edit')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Update Event</h3>
        </div>
        <div class="card-body">
            <form action="{{route('dashboard.events.update', $event->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        {{-- Start Title --}}
                        <div class="form-group">
                            <label class="form-label">Title In English <span class="text-red">*</span></label>
                            <input type="text" name="title_en" value="{{old('title_en', $event->getTranslation('title', 'en'))}}" class="form-control" placeholder="Title In English" required>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Title In Arabic <span class="text-red">*</span></label>
                            <input type="text" name="title_ar" value="{{old('title_ar', $event->getTranslation('title', 'ar'))}}" class="form-control" placeholder="Title In Arabic" required>
                        </div>
                    </div>
                    {{-- End Title --}}
                    {{-- Start Venue --}}
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Venue In English <span class="text-red">*</span></label>
                            <input type="text" name="venue_en" value="{{old('venue_en', $event->getTranslation('venue', 'en'))}}" class="form-control" placeholder="Venue In English" required>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Venue In Arabic <span class="text-red">*</span></label>
                            <input type="text" name="venue_ar" value="{{old('venue_ar', $event->getTranslation('venue', 'ar'))}}" class="form-control" placeholder="Venue In Arabic" required>
                        </div>
                    </div>
                    {{-- End Venue --}}
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Link <span class="text-red">*</span></label>
                            <input type="url" name="link" value="{{old('link', $event->link)}}" class="form-control" placeholder="Link" required>
                        </div>
                    </div>
                    {{-- Date --}}
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Start Date <span class="text-red">*</span></label>
                            <input type="datetime-local" name="start_date" value="{{old('start_date', $event->start_date)}}" class="form-control" placeholder="Start Date" required>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">End Date <span class="text-red">*</span></label>
                            <input type="datetime-local" name="end_date" value="{{old('end_date', $event->end_date)}}" class="form-control" placeholder="End Date" required>
                        </div>
                    </div>
                    {{-- Date --}}
                    {{-- Start Description --}}
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Description In English <span class="text-red">*</span></label>
                            <textarea name="description_en" class="form-control" required>{{old('description_en', $event->getTranslation('description', 'en'))}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Description In Arabic <span class="text-red">*</span></label>
                            <textarea name="description_ar" class="form-control" required>{{old('description_ar', $event->getTranslation('description', 'ar'))}}</textarea>
                        </div>
                    </div>
                    {{-- End Description --}}
                    {{-- Start File --}}
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Image <span class="text-red">*</span></label>
                            <input type="file" accept="image/*" name="image" class="form-control">
                        </div>
                    </div>
                    {{-- End File --}}
                </div>
                <div class="card-footer">
                    <input type="submit" value="Update" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection
