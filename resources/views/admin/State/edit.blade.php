@extends('admin.layouts.main')

@section('content')
    <div class="col-12">
        <div class="card">
            <h3 class="card-header">State Edit Form*</h3>
            <div class="card-body">

                <form id="formValidationExamples" action="{{ route('State.update', $getState->id) }}"
                    class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <!-- Account Details -->
                    <div class="col-12">
                        <hr class="mt-0">
                    </div>

                    <div class="col-md-6 fv-plugins-icon-container">
                        <label class="form-label" for="name">*State name</label>
                        <input type="text" id="name" class="form-control" placeholder="Please Enter Name"
                            name="name" value="{{$getState->state_name  }}">
                        @error('name')
                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                     <div class="col-md-6 fv-plugins-icon-container">
                        <label for="country_id">Select Country</label>
                        <select name="country_id" class="form-control" id="country_id">
                            <option value="">Select Country</option>
                            @foreach($getcont as $get)
                                <option value="{{ $get->id }}"
                                    {{ ($get->id == $getState->country_id) ? 'selected' : '' }}>
                                    {{ ucfirst($get->countries_name) }}
                                </option>
                            @endforeach
                        </select>
                        @error('country_id')
                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6 fv-plugins-icon-container">
                        <label class="form-label" for="status">*Status</label>
                        <select name="status" class="form-control" id="status">
                            <option value="">Select Status</option>
                            <option value="1" {{ ($getState->status == 1) ? 'selected' : '' }}>Active</option>
                            <option value="2" {{ ($getState->status == 2) ? 'selected' : '' }}>Inactive</option>
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
