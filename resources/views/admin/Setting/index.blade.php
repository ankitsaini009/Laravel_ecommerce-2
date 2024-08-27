@extends('admin.layouts.main')
@section('content')
<br>

<div class="container-fluid">
    <div class="row">
        <form action="" method="post">
            @csrf
            <div class="card col-12">
                <div class="row g-0">
                    <div class="col-md-4  text-center "
                        style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                        <h3 class="mt-5">Site Logo</h3>
                        <img src="{{asset('uploads/banners/'.$getsetting->site_logo)}}" width="40%">

                        <h3 class="mt-5">Site Fav-Icon</h3>
                        <img src="{{asset('uploads/banners/'.$getsetting->site_fav_icon)}}" width="40%">

                    </div>
                    <div class="col-md-8">
                        <div class="card-body p-4">
                            <a style="text-decoration: none;" class="editicon" href=" ">
                            </a>
                            <h3>Information</h3>
                            <hr class="mt-0 mb-4">
                            <div class="row pt-1">
                                <div class="col-6 mb-3">
                                    <h4>Site Name</h4>
                                    <p class="text-muted">{{$getsetting->site_name}}</p>
                                </div>
                                <div class="col-6 mb-3">
                                    <h4>Site Email</h4>
                                    <p class="text-muted">{{$getsetting->site_email}}</p>
                                </div>
                            </div>
                            <div class="row pt-1">
                                <div class="col-6 mb-3">
                                    <h4>Site Contact</h4>
                                    <p class="text-muted">{{$getsetting->site_contact}}</p>
                                </div>
                                <div class="col-6 mb-3">
                                    <h4>Site Address</h4>
                                    <p class="text-muted">{{$getsetting->site_address}}</p>
                                </div>
                            </div>
                            <div class="row pt-1">
                                <div class="col-6 mb-3">
                                    <h4>Header-Code</h4>
                                    <p class="text-muted">{{$getsetting->header_code}}</p>
                                </div>
                                <div class="col-6 mb-3">
                                    <h4>Footer-Code</h4>
                                    <p class="text-muted">{{$getsetting->footer_code}}</p>
                                </div>
                            </div>
                            <div class="row pt-1">
                                <div class="col-12 mb-3">
                                    <h4>Social Media Handels</h4>
                                    <div class="d-flex">
                                        <p><a href="{{$getsetting['facebook_url']}}" class="h3" target="_blank"><i
                                                    class="fa-brands fa-facebook col-2 "></i></i></a></p>
                                        <a href="{{$getsetting['insta_url']}}" class="h3" target="_blank"><i
                                                class="fa-brands fa-instagram col-2"></i></a>
                                        </p>
                                        </p>
                                        <p><a href="{{$getsetting['twitter_url']}}" class="h3" target="_blank"><i
                                                    class="fa-brands fa-twitter col-2"></i></i></a></p>
                                        <p><a href="{{$getsetting['linkdin_url']}}" class="h3" target="_blank"><i
                                                    class="fa-brands fa-linkedin col-2"></i></i></a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3" style="margin-left: 80%;">
                                <a href="{{route('Setting.edit',$getsetting->id)}}" name="submitButton"
                                    class="btn btn-success">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
