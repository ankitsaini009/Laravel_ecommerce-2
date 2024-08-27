@extends('admin.layouts.main')

@section('content')
<br>
<div class="container-fluid">
    <!-- Info boxes -->
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Site Setting Edit </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('Setting.update',$getsetting->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Site Name</label>
                                    <input name="site_name" type="text" class="form-control" id="exampleInputEmail1"
                                        value="{{$getsetting->site_name}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Site Email</label>
                                    <input name="site_email" type="email" class="form-control" id="subject"
                                        value="{{$getsetting->site_email}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">site Contact</label>
                                    <input name="site_contact" type="text" class="form-control" id="subject"
                                        value="{{$getsetting->site_contact}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Site Address</label>
                                    <input name="site_address" class="form-control" id="description"
                                        value="{{$getsetting->site_address}}"></input>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Header Code</label>
                                    <textarea name="header_code" type="number" class="form-control"
                                        id="button_txt">{{$getsetting->header_code}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Footer Code</label>
                                    <textarea name="footer_code" type="number" class="form-control"
                                        id="button_txt">{{$getsetting->footer_code}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Facebook url</label>
                                    <input name="facebook_url" type="url" class="form-control" id="button_txt"
                                        value="{{$getsetting->facebook_url}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Insta url</label>
                                    <input name="insta_url" type="url" class="form-control" id="button_txt"
                                        value="{{$getsetting->insta_url}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Twitter url</label>
                                    <input name="twitter_url" type="url" class="form-control" id="button_txt"
                                        value="{{$getsetting->twitter_url}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Youtub url</label>
                                    <input name="youtub_url" type="url" class="form-control" id="button_txt"
                                        value="{{$getsetting->youtube_url}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Linkdin url</label>
                                    <input name="linkdin_url" type="url" class="form-control" id="button_txt"
                                        value="{{$getsetting->linkdin_url}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Site Logo</label>
                                            <input name="sitelogo" type="file" class="form-control" id="button_txt">
                                            <input name="oldlogo" type="hidden" class="form-control"
                                                value="{{$getsetting->site_logo}}">
                                            <img src="{{asset('uploads/banners/'.$getsetting->site_logo)}}" width="40%">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Site Fav Icon</label>
                                            <input name="favicon" type="file" class="form-control" id="button_txt">
                                            <input name="oldicon" type="hidden" class="form-control"
                                                value="{{$getsetting->site_fav_icon}}">
                                            <img src="{{asset('uploads/banners/'.$getsetting->site_fav_icon)}}"
                                                width="40%">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" name="submitButton" class="btn btn-success" value="Submit">

                        </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- /.row -->
</div>
@endsection
