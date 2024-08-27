@extends('admin.layouts.main')

@section('content')
<br>
<br>
<div class="container">
    <div class="col-12">
        <div class="card">
            <h3 class="card-header">Profile Update*</h3>
            <div class="card-body">

                <form id="formValidationExamples" action="{{route('profile.update',$getadmin->id)}}"
                    class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <!-- Account Details -->

                    <div class="col-12">
                        <hr class="mt-0">
                    </div>


                    <div class="col-md-6 fv-plugins-icon-container">
                        <label class="form-label" for="formValidationName">*Profile name</label>
                        <input type="text" id="formValidationName" class="form-control"
                            placeholder="Plese Enter Brand Name" name="name" value="{{$getadmin->name}}">
                        @error('name')
                        <div
                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>
                    <div class="col-md-6 fv-plugins-icon-container">
                        <label class="form-label" for="formValidationName">*Email</label>
                        <input type="email" id="formValidationName" class="form-control" placeholder="Plese Enter email"
                            name="email" value="{{$getadmin->email}}">
                        @error('email')
                        <div
                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>
                    <!-- Personal Info -->
                    <div class="col-md-6 fv-plugins-icon-container">
                        <label for="formValidationFile" class="form-label">*Password</label>
                        <input class="form-control" type="numbar" id="formValidationFile" name="password" value="">

                        @error('password')
                        <div
                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-6 fv-plugins-icon-container">
                        <label for="formValidationFile" class="form-label">*Profile Image</label>
                        <input class="form-control" type="file" id="formValidationFile" name="profile">
                        <img src="{{asset('uploads/banners/'.$getadmin->profilepk)}}" width="70">
                        @error('profile')
                        <div
                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <button type="submit" name="submitButton" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
