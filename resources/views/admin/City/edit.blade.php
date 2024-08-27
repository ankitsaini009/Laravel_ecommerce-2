@extends('admin.layouts.main')

@section('content')
    <br>
    <div class="container-fluid">
        <div class="col-12">
            <div class="card">
                <h3 class="card-header">City Edit Form*</h3>
                <div class="card-body">

                    <form id="formValidationExamples" action="{{ route('City.update',$getcity->id) }}"
                        class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate" method="post"
                        enctype="multipart/form-data">
                        <!-- Account Details -->
                        @csrf

                        <div class="col-12">
                            <hr class="mt-0">
                        </div>


                        <div class="col-md-6 fv-plugins-icon-container">
                            <label class="form-label" for="formValidationName">*City Name</label>
                            <input type="text" id="name" class="form-control" placeholder="Plese Enter Name"
                                name="name" value="{{$getcity->city_name}}">
                            @error('name')
                                <div
                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div
                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            </div>
                        </div>


                        <div class="col-md-6">
                            <label for="inputEmail3" name="menu" class="col-sm-3 col-form-label">Select Sate</label>
                            <select name="State" class="form-control">
                                <option value="">Select State</option>
                                @foreach ($getstate as $get)
                                <option value="{{ $get->id }}"
                                    {{ ($get->id == $getcity->state_id) ? 'selected' : '' }}>
                                    {{ ucfirst($get->state_name) }}
                                </option>                          
                              @endforeach
                            </select>
                            <span class="text-danger">
                                @error('state')
                                    {{ $message }}
                                @enderror

                            </span>

                        </div>

                        <div class="col-md-6">
                            <label for="inputEmail3" name="menu" class="col-sm-3 col-form-label">Select Country</label>
                            <select name="country" class="form-control">
                                <option value="">Select Country</option>
                                @foreach ($category as $get)
                                <option value="{{ $get->id }}"
                                    {{ ($get->id == $getcity->country_id) ? 'selected' : '' }}>
                                    {{ ucfirst($get->countries_name) }}
                                </option>                                   @endforeach
                            </select>
                            <span class="text-danger">
                                @error('categry')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <!-- Personal Info -->

                        <div class="col-md-6 fv-plugins-icon-container">
                            <label class="form-label" for="formValidationDob">*Status</label>
                            <select name="status" class="form-control flatpickr-validation flatpickr-input">
                                <option value="">Select Status</option>
                                <option value="1" {{ $getcity->status== 1 ? 'selected' : '' }}>Active</option>
                                <option value="2" {{  $getcity->status== 2 ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                                <div
                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
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
