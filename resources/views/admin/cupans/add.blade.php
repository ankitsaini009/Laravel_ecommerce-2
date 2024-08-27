@extends('admin.layouts.main')

@section('content')
    <br>
    <div class="container-fluid">
        <div class="col-12">
            <div class="card">
                <h3 class="card-header">Cupan Add Form*</h3>
                <div class="card-body">

                    <form id="formValidationExamples" action="{{ route('cupans.store') }}"
                        class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate" method="post"
                        enctype="multipart/form-data">
                        <!-- Account Details -->
                        @csrf
                        <div class="col-12">
                            <hr class="mt-0">
                        </div>

                        <div class="col-md-6 fv-plugins-icon-container">
                            <label class="form-label" for="formValidationName">*Code</label>
                            <input type="number" id="code" class="form-control" placeholder="Plese Enter Name"
                                name="code" value="{{ old('code') }}">
                            @error('code')
                                <div
                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div
                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            </div>
                        </div>
                        <div class="col-md-6 fv-plugins-icon-container">
                            <label class="form-label" for="user_id">*User ID</label>
                            <select id="user_id" class="form-select @error('user_id') is-invalid @enderror" name="user_id">
                                <option value="">Select User ID</option>
                                @foreach ($users as $userId)
                                    <option value="{{ $userId->id }}">{{ ucfirst($userId->name) }}</option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        

                        <div class="col-md-6 fv-plugins-icon-container">
                            <label class="form-label" for="formValidationName">*Amount</label>
                            <input type="number" id="amount" class="form-control" placeholder="Plese Enter Name"
                                name="amount" value="{{ old('amount') }}">
                            @error('amount')
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
                            <div class="form-group">
                                <label for="start_date">Start Date</label>
                                <input type="date" name="start_date" id="start_date" class="form-control"
                                       value="{{ old('start_date') }}">
                                @error('start_date')
                                <div
                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="end_date">End Date</label>
                                <input type="date" name="end_date" id="end_date" class="form-control"
                                    value="{{ old('end_date') }}">
                                @error('end_date')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>


                        <!-- Personal Info -->
                        <div class="col-md-6 fv-plugins-icon-container">
                            <label class="form-label" for="formValidationDob">*Type</label>
                            <select name="type" class="form-control flatpickr-validation flatpickr-input">
                                <option value="">Select Type</option>
                                <option value="1" {{ old('type') == 1 ? 'selected' : '' }}>Percentage</option>
                                <option value="2" {{ old('type') == 2 ? 'selected' : '' }}>Fixed amount</option>
                            </select>

                            @error('type')
                                <div
                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
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
