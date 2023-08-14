@extends('dashboard.layouts.master')
@section('title', 'Edit speaker')
@section('page_title', 'Edit speaker')
@section('page_title_main_nav', 'speaker')
@section('page_title_nav', 'Edit')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Update New Speaker</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard.exhibitor.update', $speaker->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Name In English <span class="text-red">*</span></label>
                            <input type="text" name="name_en"
                                value="{{ old('name_en', $speaker->getTranslation('name', 'en')) }}" class="form-control"
                                placeholder="Name In English">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Name In Arabic <span class="text-red">*</span></label>
                            <input type="text" name="name_ar" value="{{ old('name_ar', $speaker->getTranslation('name', 'ar')) }}"
                                class="form-control" placeholder="Name In Arabic">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Job <span class="text-red">*</span></label>
                            <input type="text" name="job" value="{{ old('job', $speaker->job) }}"
                                class="form-control" placeholder="Job">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Company <span class="text-red">*</span></label>
                            <input type="text" name="company_name"
                                value="{{ old('company_name', $speaker->company_name) }}" class="form-control"
                                placeholder="Company">
                        </div>
                    </div>
                    {{-- End Image --}}
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Image</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                    </div>
                </div>
                <input type="hidden" name="event_id" value="{{ $speaker->event_id }}">
                <div class="card-footer">
                    <input type="submit" value="Create" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection
