@extends('admin.body.master')
@section('title','Admin Profile')
@section('content')


    {{-- page header start --}}
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">

                <h4 class="page-title">Profile</h4>
            </div>
        </div>
    </div>
    {{-- page header end --}}
<div class="row">
{{--    left image start--}}
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start mb-3">
                    <img class="d-flex me-3 rounded-circle avatar-lg" src="{{ (!empty($adminData->photo))? url('upload/adminImages/'.$adminData->photo):url('upload/no_image.jpg') }}" alt="Generic placeholder image">
                    <div class="w-100">
                        <h4 class="mt-0 mb-1">{{ $adminData->name }}</h4>
                        <p class="text-muted">{{ $adminData->email }}</p>

                    </div>
                </div>

                <h5 class="mb-3 mt-4 text-uppercase bg-light p-2"><i class="mdi mdi-account-circle me-1"></i> Personal Information</h5>
                <div class="">
{{--                    <h4 class="font-13 text-muted text-uppercase">About Me :</h4>--}}
{{--                    <p class="mb-3">--}}
{{--                        Believe in yourself--}}
{{--                    </p>--}}

                    <h4 class="font-13 text-muted text-uppercase mb-1">Name :</h4>
                    <p class="mb-3">{{ $adminData->name }}</p>

                    <h4 class="font-13 text-muted text-uppercase mb-1">Username :</h4>
                    <p class="mb-3">{{ $adminData->username }}</p>

                    <h4 class="font-13 text-muted text-uppercase mb-1">Phone :</h4>
                    <p class="mb-3"> {{ $adminData->phone }}</p>

                    <h4 class="font-13 text-muted text-uppercase mb-1">Joined: :</h4>
                    @if(empty($adminData->created_at))
                        <p class="text-muted mb-3"> - </p>
                    @else
                        <p class="text-muted mb-3">{{$adminData->created_at->thaidate()}}</p>
                    @endif

                    <h4 class="font-13 text-muted text-uppercase mb-1">Updated: :</h4>
                    @if(empty($adminData->updated_at))
                        <p class="text-muted mb-3"> - </p>
                    @else
                        <p class="text-muted mb-3">{{$adminData->updated_at->thaidate()}}</p>
                    @endif

                </div>
            </div>
        </div> <!-- end card-->
    </div>
{{--    left image End--}}

{{--    right start--}}
    <div class="col-lg-8 col-xl-8">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-pills nav-fill navtab-bg" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a href="#edit" data-bs-toggle="tab" aria-expanded="false" class="nav-link active" aria-selected="false" tabindex="-1" role="tab">
                            Edit Profile
                        </a>
                    </li>
{{--                    <li class="nav-item" role="presentation">--}}
{{--                        <a href="#changepassword" data-bs-toggle="tab" aria-expanded="false" class="nav-link" aria-selected="false" tabindex="-1" role="tab">--}}
{{--                            Change Password--}}
{{--                        </a>--}}
{{--                    </li>--}}
                </ul>
                <div class="tab-content">
                    <!-- begin settings content-->
                    <div class="tab-pane show active" id="edit" role="tabpanel">
                        <form method="POST" action="{{ route('admin.update.profile') }}" enctype="multipart/form-data">
                            @csrf
                            <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Personal Info</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{$adminData->name}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 form-group">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" value="{{ $adminData->username }}">
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email Address</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{$adminData->email}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 form-group">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $adminData->phone }}">
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Image</label>
                                        <input type="file" class="form-control" id="image" name="photo">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-start mb-3">
                                        <img class="d-flex me-3 rounded-circle avatar-xxl " id="showImage" src="{{ (!empty($adminData->photo))? url('upload/adminImages/'.$adminData->photo):url('upload/no_image.jpg') }}" alt="Generic placeholder image">
                                    </div>

                                </div> <!-- end col -->
                            </div> <!-- end row -->

                            <div class="text-end">
                                <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Save</button>
                            </div>
                        </form>
                    </div>
                    <!-- end settings content-->
                    <!-- bgin change password content -->
{{--                    <div class="tab-pane" id="changepassword" role="tabpanel">--}}

{{--                        <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-lock me-1"></i>--}}
{{--                            Change Password</h5>--}}
{{--                        <div class="row">--}}
{{--                            <form action="{{ route('admin.update.password') }}" method="POST">--}}
{{--                                @csrf--}}

{{--                                <div class="mb-3 form-group">--}}
{{--                                    <label for="old_password" class="form-label">Current Password</label>--}}
{{--                                    <input type="password" class="form-control" id="old_password" name="old_password">--}}
{{--                                </div>--}}

{{--                                <div class="mb-3 form-group">--}}
{{--                                    <label for="new_password" class="form-label">New Password</label>--}}
{{--                                    <input type="password" class="form-control" id="new_password" name="new_password">--}}
{{--                                </div>--}}

{{--                                <div class="mb-3 form-group">--}}
{{--                                    <label for="new_password_confirmation" class="form-label">Confirm New Password</label>--}}
{{--                                    <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation">--}}
{{--                                </div>--}}

{{--                                <div class="text-end">--}}
{{--                                    <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Update Password</button>--}}
{{--                                </div>--}}

{{--                            </form>--}}
{{--                        </div>--}}
{{--                        --}}{{--row--}}





{{--                    </div> <!-- end tab-pane -->--}}
                    <!-- end change password content -->
                </div> <!-- end tab-content -->
            </div>
        </div> <!-- end card-->

    </div>

{{--    right end--}}
</div>
    @push('scripts')
        {{--  <script src="{{asset('jquery-3.7.1.min.js')}}"></script>  --}}
        <script type="text/javascript">

            $(document).ready(function(){
                $('#image').change(function(e){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('#showImage').attr('src',e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });
            });

        </script>
    @endpush
@endsection
