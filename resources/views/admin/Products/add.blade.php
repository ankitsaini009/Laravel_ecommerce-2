@extends('admin.layouts.main')

@section('content')
<br>
<br>
<div class="container">
    <div class="col-12">
        <div class="card">
            <h3 class="card-header">Products Add Form*</h3>
            <div class="card-body">

                <form id="formValidationExamples" action="{{route('Products.store')}}" method="post"
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
                            name="code">
                        @error('code')
                        <div
                        
                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            {{ $message }}
                            
                        </div>
                        @enderror
                        

                    </div>
                    <div class="col-md-6 fv-plugins-icon-container">
                        <label class="form-label" for="formValidationName">*Name</label>
                        <input type="text" id="formValidationName" class="form-control" placeholder="Plese Enter Name"
                            name="name">
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
                            <textarea name="description" class="form-control" id="summernote"
                                placeholder=" Enter Your Description"></textarea>
                            <p class="text-danger" id='descriptionerr'></p>
                        </div>
                    </div>
                    <div class="col-md-6 fv-plugins-icon-container">
                        <label class="form-label" for="formValidationName">*Qty</label>
                        <input type="number" id="formValidationName" class="form-control" placeholder="Plese Enter Qty"
                            name="qty">
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
                            @foreach($getbrand as $brand)
                            <option value="{{$brand->id}}">{{ucfirst($brand->brands_name)}}</option>
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
                        <label for="exampleInputPassword1">Select Category</label>
                        <select name="category_id" class="form-control" id="category_id"
                            onchange="getsubcategory(this.value);">
                            <option value="">Select Category</option>
                            @foreach($getcadat as $category)
                            <option value="{{$category->id}}">{{ucfirst($category->name)}}</option>
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
                            @foreach($getsubdat as $subcategory)
                            <option value="{{$subcategory->id}}">{{ucfirst($subcategory->subcategories_name)}}</option>
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
                            placeholder="Plese Enter price" name="price">
                        @error('price')
                        <div
                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>
                    <div class="col-md-6 fv-plugins-icon-container">
                        <label class="form-label" for="formValidationName">*Sale Price</label>
                        <input type="number" id="formValidationName" class="form-control" placeholder="Plese sale price"
                            name="sale_price">
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
                            <option value="1" {{old('is_featured')==1?'selected':''}}>Yes</option>
                            <option value="2" {{old('is_featured')==2?'selected':''}}>No</option>
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
                            <option value="1" {{old('is_latest')==1?'selected':''}}>Yes</option>
                            <option value="2" {{old('is_latest')==2?'selected':''}}>No</option>
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
                            <option value="1" {{old('status')==1?'selected':''}}>Active</option>
                            <option value="2" {{old('status')==2?'selected':''}}>Inactive</option>
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
                        @error('main_image')
                        <div
                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-md-6 fv-plugins-icon-container">
                        <label for="formValidationFile" class="form-label">*Back image</label>
                        <input class="form-control" type="file" id="formValidationFile" name="back_img">
                        @error('back_img')
                        <div
                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>


                    <div class="row">
                        <div class="form-group col-4">
                            <label for="exampleInputFile">Gallery Images*</label>
                            <div class="input-group">
                                <input type="file" id="productgalleryimg" name="galleryimage[]"
                                    class="form-control col-12" multiple>
                            </div>
                            <p class="text-danger" id="productgalleryimger"></p>
                        </div>
                        <div class="form-group col-4">
                            <label for="exampleInputFile">Product Type*</label>
                            <div class="input-group">
                                <select name="product_type" id="$product_type" class="form-control"
                                    onchange="producttype(this.value)">
                                    <option value="">Select</option>
                                    <option value="1" {{ old('product_type') == '1' ? 'selected' : '' }}>Simple
                                    </option>
                                    <option value="2" {{ old('product_type') == '2' ? 'selected' : '' }}>Configurable
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12  confirgurable" style="display: none;">
                        <div class="row">
                            <div class="form-group col-3">
                                <label for="exampleInputFile">Product Size*</label>
                                <div class="input-group">
                                    <select class="form-control addsize" name="addsize[]" id="">
                                        <option value="">Select Product Size</option>
                                        @foreach($getsize as $singlesize)
                                        <option value="{{$singlesize->id}}">{{ucfirst($singlesize->size_name)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <p class="text-danger" id="sizerr"></p>
                            </div>
                            <div class="form-group col-3">
                                <label for="exampleInputFile">Product Color*</label>
                                <div class="input-group">
                                    <select class="form-control addcolor" name="addcolor[]" id="">
                                        <option value="">Select Product Color</option>
                                        @foreach($getcolor as $singlecolordd)
                                        <option value="{{$singlecolordd->id}}">{{ucfirst($singlecolordd->color_name)}}
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
                                    <input type="number" name="addqty[]" class="form-control addqty" value="">
                                    <br>
                                    <p class="text-danger" id="addqtyer"></p>
                                </div>
                            </div>
                            <div class="form-group col-3">
                                <label for="exampleInputFile" style="visibility: hidden;">Action</label><br>
                                <a class="btn btn-success rounded-pill addmore" href="javascript:void(0);">Add More</a>
                            </div>
                        </div>
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
 

 function producttype(product_type) {
    if (product_type == 2) {
        $('.confirgurable').css('display', 'block');
    } else {
        $('.confirgurable').css('display', 'none');
    }
}

$('.addmore').click(function() {
    var html = `<div class="row">
                      <div class="form-group col-3">
                        <label for="exampleInputFile">Product Size</label>
                        <div class="input-group">
                          <select class="form-control addsize" name="addsize[]" id="">
                            <option value="">Select Product Size</option>
                            @foreach($getsize as $sizedata)
                                        <option value="{{$sizedata->id}}">{{ucfirst($sizedata->size_name)}}</option>
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
                            @foreach($getcolor as $colordata)
                                        <option value="{{$colordata->id}}">{{ucfirst($colordata->color_name)}}
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
                        <a class="btn btn-danger rounded-pill removemore" href="javascript:void(0);">Remove</a>
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


</script>
@endsection
