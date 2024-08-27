@extends('admin.layouts.main')

@section('content')
<br>
<div class="container-fluid">
<div class="col-12">
    <div class="card">
        <h3 class="card-header">Banner Position Add Form*</h3>
        <div class="card-body">

            <form id="formValidationExamples" action="{{route('Bannerposition.store')}}" class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework"
                novalidate="novalidate" method="post" enctype="multipart/form-data">

                @csrf
 
                <!-- Account Details -->

                <div class="col-12">
                      <hr class="mt-0">
                </div>
                <div class="col-md-6 fv-plugins-icon-container">
                    <label class="form-label" for="formValidationName">*Name</label>
                    <input type="text" id="formValidationName" class="form-control" placeholder="Plese Enter Title"
                        name="name" value="{{old('name')}}">
                         @error('name')
 
                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                          {{ $message }}
                    </div>
                     @enderror
                </div>
 
               
                <!-- Personal Info -->
              
                <div class="col-md-6 fv-plugins-icon-container">
                    <label class="form-label" for="formValidationDob">*Status</label>
                    <select name="status" class="form-control flatpickr-validation flatpickr-input">
                        <option value="">Select Status</option>
                        <option value="1" {{old('status')==1?'selected':''}}>Active</option>
                        <option value="2" {{old('status')==2?'selected':''}}>Inactive</option>
                    </select>
                    @error('status')
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