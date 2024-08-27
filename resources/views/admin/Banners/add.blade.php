@extends('admin.layouts.main')

@section('content')
<br>
<div class="container-fluid">
    <div class="col-12">
        <div class="card">
            <h3 class="card-header">Banner Add Form*</h3>
            <div class="card-body">
                <form id="formValidationExamples" action="{{ route('Banners.store') }}"
                    class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate" method="post"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="col-12">
                        <hr class="mt-0">
                    </div>

                    <div class="col-md-6 fv-plugins-icon-container">
                        <label class="form-label" for="formValidationName">*Title</label>
                        <input type="text" id="formValidationName" class="form-control" placeholder="Please Enter Title"
                            name="title" value="{{ old('title') }}">
                        @error('title')
                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>  

                    <div class="col-md-6">
                        <label for="inputEmail3" class="form-label">Select Position</label>
                        <select name="name" class="form-control">
                            <option value="">Select Position</option>
                            @foreach($getcont as $get)
                                <option value="{{ $get->id }}">{{ $get->name }}</option>
                            @endforeach
                        </select>
                       
                    </div>

                    <div class="col-md-6 fv-plugins-icon-container">
                        <label class="form-label" for="formValidationEmail">*Sub Title</label>
                        <input class="form-control" type="text" id="formValidationEmail" name="sub_title"
                            placeholder="Please Enter Sub Title" value="{{ old('sub_title') }}">
                        @error('sub_title')
                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6 fv-plugins-icon-container">
                        <label class="form-label" for="formValidationPass">*URL</label>
                        <div class="form-password-toggle">
                            <input class="form-control" type="url" id="formValidationPass" name="url"
                                placeholder="Please Enter URL" aria-describedby="multicol-password2">
                        </div>
                        @error('url')
                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6 fv-plugins-icon-container">
                        <label for="formValidationFile" class="form-label">*Banner Image</label>
                        <input class="form-control" type="file" id="formValidationFile" name="banner_image">
                        @error('banner_image')
                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                     <div class="col-md-6 fv-plugins-icon-container">
                        <label class="form-label" for="formValidationDob">*Status</label>
                        <select name="status" class="form-control flatpickr-validation flatpickr-input">
                            <option value="">Select Status</option>
                            <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active</option>
                            <option value="2" {{ old('status') == 2 ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')
                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6 fv-plugins-icon-container">
                        <label class="form-label" for="formValidationBio">*Bio</label>
                        <textarea class="form-control" id="formValidationBio" name="description"
                            rows="3">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <button type="submit" name="submitButton" class="btn btn-primary">Submit</button>
                    </div>
                    <input type="hidden">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
