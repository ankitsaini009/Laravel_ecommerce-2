@extends('frontend.layouts.main')
@section('content')

<div id="site-main" class="site-main">
    <div id="main-content" class="main-content">
        <div id="primary" class="content-area">
            <div id="title" class="page-title">
                <div class="section-container">
                    <div class="content-title-heading">
                        <h1 class="text-title-heading">
                            Login / Register
                        </h1>
                    </div>
                    <div class="breadcrumbs">
                        <a href="index-2.html">Home</a><span class="delimiter"></span>Login / Register
                    </div>
                </div>
            </div>

            <div id="content" class="site-content" role="main">
                <div class="section-padding">
                    <div class="section-container p-l-r">
                        <div class="page-login-register">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 sm-m-b-50">
                                    <div class="box-form-login">
                                        <h2>Login</h2>
                                        <div class="box-content">
                                            <div class="form-login">
                                                <form method="post" class="login" id="loginForm">
                                                    @csrf
                                                    <div class="username">
                                                        <label>Username or email address <span class="required">*</span></label>
                                                        <input type="text" class="input-text" name="email" id="email">
                                                    </div>
                                                        <div class="password">
                                                            <label for="password">Password <span class="required">*</span></label>
                                                            <input class="input-text" type="password" name="password">
                                                        </div>
                                                    <div class="rememberme-lost">
                                                        <div class="remember-me">
                                                            <input name="rememberme" type="checkbox" value="forever">
                                                            <label class="inline">Remember me</label>
                                                        </div>
                                                        <div class="lost-password">
                                                            <a href="page-forgot-password.html">Lost your password?</a>
                                                        </div>
                                                    </div>
                                                    <div class="button-login">
                                                        <input type="submit" class="button" name="login" value="Login">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="box-form-login">
                                        <h2 class="register">Register</h2>
                                        <div class="box-content">
                                            <div class="form-register">
                                                <form method="post" class="register" id="registerForm">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Name<span class="required">*</span></label>
                                                            <input type="text" class="input-text onlyname" name="name" value="">
                                                            <div id="name-error" class="text-danger"></div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Phone No.<span class="required">*</span></label>
                                                            <input type="text" class="input-text onlynumber" name="phone" value="">
                                                            <div id="phone-error" class="text-danger"></div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Email address <span class="required">*</span></label>
                                                            <input type="email" class="input-text" name="email" value="">
                                                            <div id="email-error" class="text-danger"></div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Password <span class="required">*</span></label>
                                                            <input type="password" class="input-text" name="password">
                                                            <div id="password-error" class="text-danger"></div>
                                                        </div>
                                                    </div>
                                                    <div class="button-register">
                                                        <input type="submit" class="button" name="register" value="Register">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- #content -->
        </div><!-- #primary -->
    </div><!-- #main-content -->
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.onlynumber').keydown(function(e) {
            if ($(this).val().length >= 10 && e.keyCode !== 8 && e.keyCode !== 46) {
                e.preventDefault();
            }
            if (/\D/g.test(this.value)) {
                this.value = this.value.replace(/\D/g, '');
            }
        });
        $('.onlyname').keydown(function(e) {
            if ($(this).val().length >= 10 && e.keyCode !== 8 && e.keyCode !== 46) {
                e.preventDefault();
            }
            var regex = new RegExp("^[a-zA-Z ]+$");
            var strigChar = String.fromCharCode(!e.charCode ? e.which : e.charCode);
            if (regex.test(strigChar)) {
                return true;
            }
            return false;
        });
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        $('#loginForm').submit(function(event) {
            event.preventDefault();
            var formData = $(this).serialize();
            var indexRoute = "{{ route('frontend.index') }}";

            $.ajax({
                url: "{{ route('loginpage') }}",
                type: 'post',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: formData,
                success: function(response) {
                    if (response.success) {
                        window.location.href = indexRoute;
                        Swal.fire({
                            title: "Login Successful",
                            text: response.message,
                            icon: "success"
                        });
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Login Failed",
                            text: response.message,
                            footer: '<a href="#">Why do I have this issue?</a>'
                        });
                    }
                },
                 
            });
        });
    });
</script>


<script>
   $(document).ready(function() {
    $('#registerForm').submit(function(event) {
        event.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            url: "{{ route('frontend.register') }}",
            type: 'get',
            dataType: 'json',
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
            data: formData,
            success: function(data) {
                Swal.fire({
                    title: "Registration Successful",
                    text: data
                        .message,
                    icon: "success"
                });
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseJSON);
                var errors = xhr.responseJSON.errors;
                $.each(errors, function(key, value) {
                    $("#" + key + "-error").html(value);
                });
            }
       }); 
    });
});

</script>

@endsection
