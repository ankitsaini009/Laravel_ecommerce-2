@extends('admin.layouts.main')

@section('content')
    <br>
    <br>
    <div class="container">
        <div class="col-12">
            <div class="card">
                <h3 class="card-header">Products Add Form*</h3>
                <div class="card-body">

                    <form id="formValidationExamples" action="{{ route('Products.update', $getproduct->id) }}" method="post"
                        enctype="multipart/form-data" class="row g-3 fv-plugins-bootstrap5 fv-plugins-fram ework"
                        novalidate="novalidate">
                        @csrf
                        <!-- Account Details -->
                        <div class="col-12">
                            <hr class="mt-0">
                        </div>
                        <div class="col-md-6 fv-plugins-icon-container">
                            <label class="form-label" for="formValidationName">*Code</label>
                            <input type="number" id="code" class="form-control" placeholder="Plese Enter Code"
                                name="code" value="{{ $getproduct->code }}">
                            @error('code')
                                <div
                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                        <div class="col-md-6 fv-plugins-icon-container">
                            <label class="form-label" for="formValidationName">*Name</label>
                            <input type="text" id="formValidationName" class="form-control"
                                placeholder="Plese Enter Name" name="name" value="{{ $getproduct->name }}">
                            @error('name')
                                <div
                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Description*</label>
                                <textarea name="description" class="form-control" id="summernote" placeholder=" Enter Your Description">{{ $getproduct->description }}</textarea>
                                <p class="text-danger" id='descriptionerr'></p>
                            </div>
                        </div>
                        <div class="col-md-6 fv-plugins-icon-container">
                            <label class="form-label" for="formValidationName">*Qty</label>
                            <input type="number" id="formValidationName" class="form-control" placeholder="Plese Enter Qty"
                                name="qty" value="{{ $getproduct->category_id }}">
                            @error('qty')
                                <div
                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 fv-plugins-icon-container">
                            <label for="exampleInputPassword1">Select Brand</label>
                            <select name="brand_id" class="form-control" id="brand_id">
                                <option value="">Select Brand</option>
                                @foreach ($getbrand as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $item->id == $getproduct->brand_id ? 'selected' : '' }}>{{ $item->brands_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('brand_id')
                                <div
                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 fv-plugins-icon-container">
                            <label for="category_id">Select Category</label>
                            <select name="category_id" class="form-control" id="category_id"
                                onchange="getsubcategory(this.value);">
                                <option value="">Select Category</option>
                                @foreach ($getcadat as $cate)
                                    <option value="{{ $cate->id }}"
                                        {{ $cate->id == $getproduct->category_id ? 'selected' : '' }}>
                                        {{ $cate->name }}
                                    </option>
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
                            <label for="exampleInputPassword1">Select Subcategory</label>
                            <select name="subcategory_id" class="form-control" id="subcategory_id">
                                <option value="">Select Subcategory</option>
                                @foreach ($getsubcategory as $subcat)
                                    <option value="{{ $subcat->id }}"
                                        {{ $subcat->id == $getproduct->subcategory_id ? 'selected' : '' }}>
                                        {{ $subcat->subcategories_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('subcategory_id')
                                <div
                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 fv-plugins-icon-container">
                            <label class="form-label" for="formValidationName">*Price</label>
                            <input type="number" id="formValidationName" class="form-control"
                                placeholder="Plese Enter price" name="price" value="{{ $getproduct->price }}">
                            @error('price')
                                <div
                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                        <div class="col-md-6 fv-plugins-icon-container">
                            <label class="form-label" for="formValidationName">*Sale Price</label>
                            <input type="number" id="formValidationName" class="form-control"
                                placeholder="Plese sale price" name="sale_price" value="{{ $getproduct->mrp_price }}">
                            @error('sale_price')
                                <div
                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="col-md-6 fv-plugins-icon-container">
                            <label class="form-label" for="formValidationEmail">*Fatured</label>
                            <select name="is_featured" class="form-control">
                                <option value="">Fatured</option>
                                <option value="1" {{ $getproduct->is_featured == 1 ? 'selected' : '' }}>Yes</option>
                                <option value="2" {{ $getproduct->is_featured == 2 ? 'selected' : '' }}>No</option>
                            </select>
                            @error('is_featured')
                                <div
                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 fv-plugins-icon-container">
                            <label class="form-label" for="formValidationEmail">*Latest</label>
                            <select name="is_latest" class="form-control">
                                <option value="">Latest</option>
                                <option value="1" {{ $getproduct->is_latest == 1 ? 'selected' : '' }}>Yes</option>
                                <option value="2" {{ $getproduct->is_latest == 2 ? 'selected' : '' }}>No</option>
                            </select>
                            @error('is_latest')
                                <div
                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 fv-plugins-icon-container">
                            <label class="form-label" for="formValidationEmail">*Status</label>
                            <select name="status" class="form-control">
                                <option value="">Status</option>
                                <option value="1" {{ $getproduct->status == 1 ? 'selected' : '' }}>Active</option>
                                <option value="2" {{ $getproduct->status == 2 ? 'selected' : '' }}>Inactive</option>
                                n>
                            </select>
                            @error('status')
                                <div
                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!-- Personal Info -->
                        <div class="col-md-6 fv-plugins-icon-container">
                            <label for="formValidationFile" class="form-label">*Min.Image</label>
                            <input class="form-control" type="file" id="formValidationFile" name="main_image">
                            <img src="{{ asset('uploads/banners/' . $getproduct->main_image) }}" width="100">

                            @error('main_image')
                                <div
                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6 fv-plugins-icon-container">
                            <label for="formValidationFile" class="form-label">*Back Image</label>
                            <input class="form-control" type="file" id="formValidationFile" name="back_img">
                            <img src="{{ asset('uploads/banners/' . $getproduct->back_img) }}" width="100">

                            @error('back_img')
                                <div
                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="row">
                            <div class="row">
                                <div class="form-group col-4">
                                    <label for="exampleInputFile">Gallery Images*</label>
                                    <div class="input-group">
                                        <input type="file" id="productgalleryimg" name="galleryimage[]"
                                            class="form-control col-12" multiple>
                                    </div>
                                    <p class="text-danger" id="productgalleryimger"></p>
                                </div>
                                <div class="row">
                                    @if ($getgalleryimg->count() > 0)
                                        @foreach ($getgalleryimg as $singleimg)
                                            <div class="col-md-2 mt-2 text-center" id="gallery_{{ $singleimg->id }}">
                                                <img src="{{ asset('uploads/banners/' . $singleimg->galleryimg) }}"
                                                    class="imge-responsive" style="width:70%;">
                                                    <a href="javascript:void(0);" class="text-danger"
                                                    onclick="gallery('{{$singleimg->id}}')">Remove</a>
                
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="form-group col-4">
                                <label for="exampleInputFile">Product Type*</label>
                                <div class="input-group">
                                    <select name="product_type" id="product_type" class="form-control"
                                        onchange="displaydiv(this.value)">
                                        <option value="">Select</option>
                                        <option value="1" {{ $getproduct->product_type == '1' ? 'selected' : '' }}>
                                            Simple
                                        </option>
                                        <option value="2" {{ $getproduct->product_type == '2' ? 'selected' : '' }}>
                                            Configurable
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 confirgurable">
                            @if ($getproduct->product_type == 2)
                                @php
                                    $start = 0;
                                @endphp
                                @foreach ($configration as $config)
                                    <div class="row" id="addmore_{{ $config->id }}">
                                        <input type="hidden" name="allreadyadded[]" value="{{ $config->id}}">
                                        <div class="row">
                                            <div class="form-group col-3">
                                                <label for="exampleInputFile">Product Size*</label>
                                                <div class="input-group">
                                                    <select class="form-control addsize" name="addsize[]" id="">
                                                        <option value="">Select Product Size</option>
                                                        @foreach ($sizedata as $singlesize)
                                                            <option value="{{ $singlesize->id }}"
                                                                {{ $singlesize->id == $config->size_id ? 'selected' : '' }}>
                                                                {{ ucfirst($singlesize->size_name) }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <p class="text-danger" id="sizerr"></p>
                                            </div>
                                            <div class="form-group col-3">
                                                <label for="exampleInputFile">Product Color*</label>
                                                <div class="input-group">
                                                    <select class="form-control addcolor" name="addcolor[]"
                                                        id="">
                                                        <option value="">Select Product Color</option>
                                                        @foreach ($colordata as $singlecolordd)
                                                            <option value="{{ $singlecolordd->id }}"
                                                                {{ $singlecolordd->id == $config->color_id ? 'selected' : '' }}>
                                                                {{ ucfirst($singlecolordd->color_name) }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <br>
                                                    <p class="text-danger" id="colorrr"></p>
                                                </div>
                                            </div>
                                            <div class="form-group col-3">
                                                <label for="exampleInputFile">Qty*</label>
                                                <div class="input-group">
                                                    <input type="number" name="addqty[]" class="form-control addqty"
                                                        value="{{ $config->qty }}">
                                                    <br>
                                                    <p class="text-danger" id="addqtyer"></p>
                                                </div>
                                            </div>
                                            <div class="form-group col-3">
                                                <label for="exampleInputFile"
                                                    style="visibility: hidden;">Action</label><br>
                                                @if ($start == 0)
                                                    <a class="btn btn-success rounded-pill addmore"
                                                        href="javascript:void(0);">Add
                                                        More</a>
                                                @else
                                                <a href="javascript:void(0);" class="btn btn-danger rounded-pill removeadded"
                                                onclick="removeid('{{$config->id}}')">Remove</a>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                    @php $start++;@endphp
                                @endforeach
                            @endif
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
@section('inlinescript')
    <script>
        function displaydiv(product_type) {
            if (product_type == 2) {
                $('.confirgurable').css('display', 'block');
            } else {
                $('.confirgurable').css('display', 'none');
            }
        }

        $('.addmore').click(function() {
    var html = `<div class="row">
               <input type="hidden" name="allreadyadded[]" value="0">
                      <div class="form-group col-3">
                        <label for="exampleInputFile">Product Size</label>
                        <div class="input-group">
                          <select class="form-control addsize" name="addsize[]" id="">
                            <option value="">Select Product Size</option>
                            @foreach($sizedata as $singlesize)
                                        <option value="{{$singlesize->id}}">{{ucfirst($singlesize->size_name)}}</option>
                                        @endforeach
                          </select>
                        </div>
                        <p class="text-danger"></p>
                      </div>
                      <div class="form-group col-3">
                        <label for="exampleInputFile">Product Color</label>
                        <div class="input-group">
                          <select class="form-control addcolor" name="addcolor[]" id="">
                            <option value="">Select Product Color</option>
                            @foreach($colordata as $singlecolordd)
                                        <option value="{{$singlecolordd->id}}">{{ucfirst($singlecolordd->color_name)}}
                                        </option>
                                 @endforeach
                          </select>
                          <br>
                          <p class="text-danger"></p>
                        </div>
                      </div>
                      <div class="form-group col-3">
                        <label for="exampleInputFile">Qty</label>
                        <div class="input-group">
                              <input type="number" name="addqty[]" class="form-control addqty" >
                          <br>
                          <p class="text-danger"></p>
                        </div>
                      </div>

                      <div class="form-group col-3">
                      <label for="exampleInputFile" style="visibility: hidden;">Action</label><br>
                        <a class="btn btn-danger rounded-pill  removemore" href="javascript:void(0);">Remove</a>
                      </div>
                    </div>`;

            $('.confirgurable').append(html);
        });

        $(document).on("click", ".removemore", function() {
            $(this).parent().parent().remove();
        });



        function getsubcategory(category_id) {
            $.ajax({
                type: "POST",
                url: "{{ route('ajax.subcategory') }}",
                data: {
                    catid: category_id
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                success: function(subcategory) {
                    var html = '<option value="">Select subcategory</option>';
                    $.each(subcategory, function(index, subcat) {
                        html += '<option value="' + subcat.id + '">' + subcat.subcategories_name +
                            '</option>';
                    });
                    $("#subcategory_id").html(html);
                },
            });
        }
        function gallery(galleryid) {
    $.ajax({
        type: "GET",
        url: "{{route('delete.gallery')}}",
        data: {
            galleryid: galleryid
        },
        success: function(response) {
            if (response.success) {
                $('#gallery_' + galleryid).fadeOut(500, function() {
                    $(this).remove();
                });
            }
        },
    });
}
function removeid(id) {
   
            $.ajax({
                type: "GET",
                url: "{{route('delete.reove')}}",
                data: {
                    id: id
                },
                success: function(response) {
                    if (response.success) {
                        $('#addmore_' + id).fadeOut(500, function() {
                            $(this).remove();
                        });
                    }
                },
            });
        }
    



    </script>
@endsection
