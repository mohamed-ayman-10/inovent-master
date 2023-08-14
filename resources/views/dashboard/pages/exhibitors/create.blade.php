@extends('dashboard.layouts.master')
@section('title', 'Create exhibitor')
@section('page_title', 'Create exhibitor')
@section('page_title_main_nav', 'exhibitor')
@section('page_title_nav', 'Create')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Create New exhibitor</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard.exhibitor.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">title In English <span class="text-red">*</span></label>
                            <input type="text" name="title_en" value="{{ old('title_en') }}" class="form-control"
                                placeholder="title In English">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">title In Arabic <span class="text-red">*</span></label>
                            <input type="text" name="title_ar" value="{{ old('title_ar') }}" class="form-control"
                                placeholder="title In Arabic">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">sponsor <span class="text-red">*</span></label>
                            <input type="text" name="sponsor" value="{{ old('sponsor') }}" class="form-control"
                                placeholder="sponsor">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">grade <span class="text-red">*</span></label>
                            <input type="text" name="grade" value="{{ old('grade') }}" class="form-control"
                                placeholder="grade">
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
                <input type="hidden" name="event_id" value="{{ $event_id }}">
                <div class="card-footer">
                    <input type="submit" value="Create" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection
