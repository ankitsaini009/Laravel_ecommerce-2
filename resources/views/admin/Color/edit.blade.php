@extends('admin.layouts.main')

@section('content')
<div class="col-12">
    <div class="card">
        <h3 class="card-header">Color Edit Form*</h3>
        <div class="card-body">

            <form id="formValidationExamples" action="{{route('Color.update', $getcolor->id)}}"
                class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate" method="post"
                enctype="multipart/form-data">
                @csrf
                <!-- Color Details -->
                <div class="col-12">
                    <hr class="mt-0">
                </div>

                <div class="col-md-6 fv-plugins-icon-container">
                    <label class="form-label" for="color_name">*Name</label>
                    <input type="text" id="color_name" class="form-control" placeholder="Please Enter Name"
                        name="color_name" value="{{$getcolor->color_name}}">
                    @error('color_name')
                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="col-md-6 fv-plugins-icon-container">
                    <label class="form-label" for="hex_value">*Hex Value</label>
                    <input type="color" id="hex_value" class="form-control" placeholder="Please Enter Hex Value"
                        name="hex_value" value="{{ $getcolor->hex_value }}">
                    @error('hex_value')
                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <!-- Status Info -->
                <div class="col-md-6 fv-plugins-icon-container">
                    <label class="form-label" for="status">*Status</label>
                    <select name="status" class="form-control flatpickr-validation flatpickr-input">
                        <option value="">Select Status</option>
                        <option value="1" {{ $getcolor->status == 1 ? 'selected' : '' }}>Active</option>
                        <option value="2" {{ $getcolor->status == 2 ? 'selected' : '' }}>Inactive</option>
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
