@extends('admin.layouts.main')

@section('content')
<div class="col-12">
    <div class="card">
        <h3 class="card-header">Category Edit Form*</h3>
        <div class="card-body">

            <form id="formValidationExamples" action="{{route('Category.update',$getCategory->id)}}"
                class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate" method="post"
                enctype="multipart/form-data">
                @csrf
                <!-- Account Details -->

                <div class="col-12">
                    <hr class="mt-0">
                </div>

                <div class="col-md-6 fv-plugins-icon-container">
                    <label class="form-label" for="formValidationName">*Name</label>
                    <input type="text" id="formValidationName" class="form-control" placeholder="Plese Enter Title"
                        name="name" value="{{$getCategory->name}}">
                    @error('name')
                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                </div>
                <div class="col-md-6 fv-plugins-icon-container">
                    <label class="form-label" for="formValidationDob">*Display Menu</label>
                    <select name="display_menu" class="form-control flatpickr-validation flatpickr-input">
                        <option value="">Select Menu</option>
                        <option value="1" {{$getCategory->display_menu==1?'selected':''}}>Yes</option>
                        <option value="2" {{$getCategory->display_menu==2?'selected':''}}>NO</option>
                    </select>

                    @error('display_menu')
                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="col-md-6 fv-plugins-icon-container">
                    <label class="form-label" for="formValidationDob">*Display home</label>
                    <select name="display_home" class="form-control flatpickr-validation flatpickr-input">
                        <option value="">Select HOme</option>
                        <option value="1" {{$getCategory->display_home==1?'selected':''}}>Yes</option>
                        <option value="2" {{$getCategory->display_home==2?'selected':''}}>NO</option>
                    </select>

                    @error('display_home')
                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                 
                <!-- Personal Info -->
                <div class="col-md-6 fv-plugins-icon-container">
                    <label for="formValidationFile" class="form-label">*Category Image</label>
                    <input class="form-control" type="file" id="formValidationFile" name="category_image">
                    <img src="{{asset('uploads/category/'.$getCategory->categories_image)}}" width="70">
                    
                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                         
                    </div>
                  
                </div>
                <div class="col-md-6 fv-plugins-icon-container">
                    <label class="form-label" for="formValidationDob">*Status</label>
                    <select name="status" class="form-control flatpickr-validation flatpickr-input">
                        <option value="">Select Status</option>
                        <option value="1" {{$getCategory->status==1?'selected':''}}>Active</option>
                        <option value="2" {{$getCategory->status==2?'selected':''}}>Inactive</option>
                    </select>

                    @error('status')
                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
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
@endsection