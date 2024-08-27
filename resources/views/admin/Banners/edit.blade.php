@extends('admin.layouts.main')

@section('content')
<div class="col-12">
    <div class="card">
        <h3 class="card-header">Banner Edit Form*</h3>
        <div class="card-body">

            <form id="formValidationExamples" action="{{route('Banners.update',$getbanner->id)}}"
                class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate" method="post"
                enctype="multipart/form-data">
                @csrf
                <!-- Account Details -->

                <div class="col-12">
                    <hr class="mt-0">
                </div>

                <div class="col-md-6 fv-plugins-icon-container">
                    <label class="form-label" for="formValidationName">*Title</label>
                    <input type="text" id="formValidationName" class="form-control" placeholder="Plese Enter Title"
                        name="title" value="{{$getbanner->title}}">
                    @error('title')
                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="inputEmail3" class="form-label">Select Position</label>
                    <select name="position_id" class="form-control">
                        <option value="">Select Position</option>
                        @foreach($getcont as $get)
                            <option value="{{ $get->id }}"{{ ($get->id == $getbanner->position_id) ? 'selected' : '' }}>{{ $get->name }}</option>
                        @endforeach
                    </select>
                   
                </div>                <div class="col-md-6 fv-plugins-icon-container">
                    <label class="form-label" for="formValidationEmail">Sub Title</label>
                    <input class="form-control" type="text" id="formValidationEmail" name="sub_title"
                        placeholder="Plese Enter Sub Title" value="{{$getbanner->sub_title}}">
                    @error('sub_title')
                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="col-md-6 fv-plugins-icon-container">
                    <div class="form-password-toggle">
                        <label class="form-label" for="formValidationPass">URL</label>
                        <div class="input-group input-group-merge has-validation">
                            <input class="form-control" type="url" id="formValidationPass" name="url"
                                placeholder="Plese Enter URL" aria-describedby="multicol-password2"
                                value="{{$getbanner->url}}">
                            <span class="input-group-text cursor-pointer" id="multicol-password2"></span>
                        </div>
                        @error('url')
                        <div
                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                 
                <!-- Personal Info -->
                <div class="col-md-6 fv-plugins-icon-container">
                    <label for="formValidationFile" class="form-label">*Banner Image</label>
                    <input class="form-control" type="file" id="formValidationFile" name="banner_image">
                    <img src="{{asset('uploads/banners/'.$getbanner->banner_image)}}" width="70">
                    
                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                         
                    </div>
                  
                </div>
                <div class="col-md-6 fv-plugins-icon-container">
                    <label class="form-label" for="formValidationDob">*Status</label>
                    <select name="status" class="form-control flatpickr-validation flatpickr-input">
                        <option value="">Select Status</option>
                        <option value="1" {{$getbanner->status==1?'selected':''}}>Active</option>
                        <option value="2" {{$getbanner->status==2?'selected':''}}>Inactive</option>
                    </select>

                    @error('status')
                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-6 fv-plugins-icon-container">
                    <label class="form-label" for="formValidationBio">Description</label>
                    <textarea class="form-control" id="formValidationBio" name="description"
                        rows="3">{{$getbanner->description}}</textarea>
                    @error('description')
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