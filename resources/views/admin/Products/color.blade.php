@extends('admin.layouts.main')
@section('content')

<div class="col-12">
    <div class="card">
        <h3 class="card-header">Gallery Image Form</h3>
        <div class="card-body">
            <form action="{{route('product.gallerycolor',$id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <label for="color" class="col-form-label" style="margin-left: 40px;">Color name</label>
                <label for="color" class="col-form-label" style="margin-left: 440px;">Color Image</label>

                <div class="bg-light rounded row">

                    @foreach($mycolor as $color)
                    <div class="row" style="margin: 50px;">
                        <div class="col-md-6">
                             <inpu name="value "  class="color " style="background-color: {{$color->hex_value}};color:white; ">
 
                                {{$color->color_name}}
                        </div>
                        <div class="col-md-6">
                          <input class="col-sm-12" name="colorimage[{{$color->id}}][]" type="file" id="formFile" multiple>
                          <div class="row">
                              @foreach($color->images as $image)
                               <div class="col-sm-3" id="gallery_{{$image->color_id}}">
                                  <img src="{{asset('uploads/banners/'.$image->galleryimg)}}" class="img-responsive" width="40">
                                  <a href="javascript:void(0);" class="text-danger" onclick="gallery('{{$image->id}}')">Remove</a>
                              </div>
                              @endforeach
                          </div>
                      </div>
                      
                       
                    </div>
                    @endforeach
                </div>
                <div class="col-md-6" style="margin-left:400px; margin-top:30px;margin-bottom:30px;">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>  
    </div>
</div>  

@endsection 
<script>
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

</script>