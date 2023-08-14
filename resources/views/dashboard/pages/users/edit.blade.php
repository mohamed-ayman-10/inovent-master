@extends('dashboard.layouts.master')
@section('title', 'Edit User')
@section('page_title', 'Edit User')
@section('page_title_main_nav', 'Users')
@section('page_title_nav', 'Edit')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Update User</h3>
        </div>
        <div class="card-body">
            <form action="{{route('dashboard.users.update', $user->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">First Name <span class="text-red">*</span></label>
                            <input type="text" name="first_name" value="{{old('first_name', $user->first_name)}}" class="form-control" placeholder="First Name" required>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Last Name <span class="text-red">*</span></label>
                            <input type="text" name="last_name" value="{{old('last_name', $user->last_name)}}" class="form-control" placeholder="Last Name" required>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Phone <span class="text-red">*</span></label>
                            <input type="number" name="phone" value="{{old('phone', $user->phone)}}" class="form-control" placeholder="Phone" required>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Email <span class="text-red">*</span></label>
                            <input type="email" name="email" value="{{old('email', $user->email)}}" class="form-control" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">New Password</label>
                            <div class="wrap-input100 validate-input input-group" id="Password-toggle1">
                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                    <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                </a>
                                <input class="input100 form-control" name="password" type="password" placeholder="New Password" autocomplete="new-password">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Confirm Password</label>
                            <div class="wrap-input100 validate-input input-group" id="Password-toggle2">
                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                    <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                </a>
                                <input class="input100 form-control" name="password_confirmation" type="password" placeholder="Confirm Password" autocomplete="new-password">
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="id" value="{{$user->id}}">
                <div class="card-footer">
                    <input type="submit" value="Update" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <!-- SHOW PASSWORD JS -->
    <script src="{{asset('backend')}}/assets/js/show-password.min.js"></script>
@endsection
