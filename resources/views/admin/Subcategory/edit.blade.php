@extends('admin.layouts.main')

@section('content')
    <div class="col-12">
        <div class="card">
            <h3 class="card-header">Subcategory Edit Form*</h3>
            <div class="card-body">

                <form id="formValidationExamples" action="{{ route('Subcategory.update',$getcategory->id) }}"
                    class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <!-- Account Details -->

                    <div class="col-12">
                        <hr class="mt-0">
                    </div>

                    <div class="col-md-6 fv-plugins-icon-container">
                        <label class="form-label" for="formValidationName">*Subcategory Name</label>
                        <input type="text" id="formValidationName" class="form-control" placeholder="Plese Enter Title"
                            name="name" value="{{ $getcategory->subcategories_name }}">
                        @error('name')
                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>
                    <!-- Personal Info -->
                    <div class="col-md-6 fv-plugins-icon-container">
                        <label for="exampleInputPassword1">Select Category</label>
                        <select name="category_id" class="form-control" id="category_id">
                            <option value="">Select Category</option>
                            @foreach($category as $get)
                            <option value="{{ $get->id }}"
                                {{ ( $get->id == $getcategory->category_id) ? 'selected' : '' }}>
                                {{ ucfirst($get->name) }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div
                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                     </div>


                    <div class="col-md-6 fv-plugins-icon-container">
                        <label for="formValidationFile" class="form-label">*Subcategory Image</label>
                        <input class="form-control" type="file" id="formValidationFile" name="subcategory_name">
                        <img src="{{ asset('uploads/subcategory/' . $getcategory->subcategories_image) }}" width="70">

                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">

                        </div>

                    </div>
                    <div class="col-md-6 fv-plugins-icon-container">
                        <label class="form-label" for="formValidationDob">*Status</label>
                        <select name="status" class="form-control flatpickr-validation flatpickr-input">
                            <option value="">Select Status</option>
                            <option value="1" {{ $getcategory->status == 1 ? 'selected' : '' }}>Active</option>
                            <option value="2" {{ $getcategory->status == 2 ? 'selected' : '' }}>Inactive</option>
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
