@extends('frontend.layouts.main')
@section('content')
    <div id="site-main" class="site-main">
        <div id="main-content" class="main-content">
            <div id="primary" class="content-area">
                <div id="title" class="page-title">
                    <div class="section-container">
                        <div class="content-title-heading">
                            <h1 class="text-title-heading">
                                Checkout
                            </h1>
                        </div>
                        <div class="breadcrumbs">
                            <a href="{{ route('frontend.index') }}">Home</a><span class="delimiter"></span><span
                                class="delimiter"></span>Checkout
                        </div>
                    </div>
                </div>

                <div id="content" class="site-content" role="main">
                    <div class="section-padding">
                        <div class="section-container p-l-r">
                            <div class="shop-checkout">

                                <div class="row">
                                    <div class="col-xl-8 col-lg-7 col-md-12 col-12">
                                        <table class="table table-bordered">
                                            <div class="card-header">

                                                @foreach ($getdata as $data)
                                                    <input type="radio" class="addressid" name="addressid" value="{{ $data['id'] }}">
											{{ $data['frist_name'] . ' ' . $data['last_name'] }}
											<a href="javascript:void(0);" class="remove" onclick="gallery('{{$data->id}}')"style="margin-left:600px;font-size:20px;">×</a>

                                                    <div class="card-header">
                                                        <div class="card-body">
                                                            Country Name: {{ $data['country_id'] }}<br>
                                                            State Name: {{ $data['state_id'] }}<br>
                                                            City Name: {{ $data['city_id'] }}<br>
                                                            Home Address: {{ $data['address'] }}<br>
                                                            Pincode: {{ $data['postcode'] }}<br></h5>
                                                            <div class="col-md-6">
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                <input type="hidden" name="addressid" id="addressid" value="0">
                                        </table>
                                        <form name="checkout" method="get" class="checkout" action="{{ route('addcart') }}"
                                            autocomplete="off" enctype="multipart/form-data">
                                            @csrf
                                            <div class="customer-details">
                                                <div class="billing-fields">
                                                    <div class="billing-fields-wrapper">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <p class="form-row form-row-first validate-required">
                                                                    <label>First name <span class="required"
                                                                            title="required">*</span></label>
                                                                    <span class="input-wrapper"><input type="text"
                                                                            class="input-text" name="name"
                                                                            value=""></span>
                                                                    <span class="text-danger">
                                                                        @error('name')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </span>
                                                                </p>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p class="form-row form-row-last validate-required">
                                                                    <label>Last name <span class="required"
                                                                            title="required">*</span></label>
                                                                    <span class="input-wrapper"><input type="text"
                                                                            class="input-text" name="lname"
                                                                            value=""></span>
                                                                    <span class="text-danger">
                                                                        @error('lname')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </span>
                                                                </p>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p class="form-row form-row-wide validate-required">
                                                                    <label>Country <span class="required"
                                                                            title="required">*</span></label>
                                                                    <span class="input-wrapper">
                                                                        <select name="country" class="input-wrapper">
                                                                            <option value="">Select a country</option>
                                                                            @foreach ($countrylist as $country)
                                                                                <option value="{{ $country->id }}">
                                                                                    {{ $country->countries_name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </span>
                                                                    <span class="text-danger">
                                                                        @error('country')
                                                                            {{ $message }}
                                                                        @enderror

                                                                    </span>
                                                                </p>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p
                                                                    class="form-row address-field validate-required validate-state form-row-wide">
                                                                    <label>State <span class="required"
                                                                            title="required">*</span></label>
                                                                    <span class="input-wrapper">
                                                                        <select name="state" class="input-wrapper">
                                                                            <option value="">Select a state </option>
                                                                            @foreach ($statelist as $state)
                                                                                <option value="{{ $state->id }}">
                                                                                    {{ $state->state_name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </span>
                                                                    <span class="text-danger">
                                                                        @error('state')
                                                                            {{ $message }}
                                                                        @enderror

                                                                    </span>
                                                                </p>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p
                                                                    class="form-row address-field validate-required form-row-wide">
                                                                    <label for="city" class=""> City <span
                                                                            class="required"
                                                                            title="required">*</span></label>
                                                                    <span class="input-wrapper">
                                                                        <select name="city" class="input-wrapper">
                                                                            <option value="">Select a state </option>
                                                                            @foreach ($citylist as $city)
                                                                                <option value="{{ $city->id }}">
                                                                                    {{ $city->city_name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </span> </span>
                                                                    <span class="text-danger">
                                                                        @error('city')
                                                                            {{ $message }}
                                                                        @enderror

                                                                    </span>
                                                                </p>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p
                                                                    class="form-row address-field validate-required validate-postcode form-row-wide">
                                                                    <label>Postcode / ZIP <span class="required"
                                                                            title="required">*</span></label>
                                                                    <span class="input-wrapper">
                                                                        <input type="text" class="input-text"
                                                                            name="postcode" value="">
                                                                    </span>
                                                                    <span class="text-danger">
                                                                        @error('postcode')
                                                                            {{ $message }}
                                                                        @enderror

                                                                    </span>
                                                                </p>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <p
                                                                    class="form-row address-field validate-required form-row-wide">
                                                                    <label> address <span class="required"
                                                                            title="required">*</span></label>
                                                                    <span class="input-wrapper">
                                                                        <textarea type="text" class="input-text" name="address" placeholder="House number and street name"
                                                                            value=""></textarea>
                                                                    </span>
                                                                    <span class="text-danger">
                                                                        @error('address')
                                                                            {{ $message }}
                                                                        @enderror

                                                                    </span>
                                                                </p>
                                                            </div>





                                                            



                                                            
                                                            <div class="col-md-6">
                                                                <p
                                                                    class="form-row form-row-wide validate-required validate-phone">
                                                                    <label>Phone <span class="required"
                                                                            title="required">*</span></label>
                                                                    <span class="input-wrapper">
                                                                        <input type="tel" class="input-text"
                                                                            name="phone" value="">
                                                                    </span>
                                                                    <span class="text-danger">
                                                                        @error('phone')
                                                                            {{ $message }}
                                                                        @enderror

                                                                    </span>
                                                                </p>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p
                                                                    class="form-row form-row-wide validate-required validate-email">
                                                                    <label>Email address <span class="required"
                                                                            title="required">*</span></label>
                                                                    <span class="input-wrapper">
                                                                        <input type="email" class="input-text"
                                                                            name="email" value=""
                                                                            autocomplete="off">
                                                                    </span>
                                                                    <span class="text-danger">
                                                                        @error('email')
                                                                            {{ $message }}
                                                                        @enderror

                                                                    </span>
                                                                </p>
                                                            </div>
                                                            <div class="card-footer">
                                                                <button type="submit" style="margin-left: 379px;"
                                                                    class="btn btn-outline-dark">Submit</button>
                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>
                                        </form>

                                    </div>
                                    <div class="col-xl-4 col-lg-5 col-md-12 col-12">
                                        <div class="checkout-review-order">
                                            <div class="checkout-review-order-table">
                                                <h3 class="review-order-title">Product</h3>
                                                <div class="cart-items">
                                                    @foreach ($cartList as $cart)

												<div class="cart-item">
													<div class="info-product">
														<div class="product-thumbnail">
															<img width="600" height="600" src="{{ asset('uploads/banners/'.$cart->products->main_image) }}" alt="">
														</div>
														<div class="product-name">
															{{ $cart->products->name }}
															<strong class="product-quantity">QTY :{{ $cart->qty }}</strong>
														</div>
													</div>
													@php

													$totalPrice = $cart->products->price * $cart->qty;

													@endphp
													<div class="product-total">
														<span>₹{{ $totalPrice }}</span>
													</div>
												</div>
												@endforeach
                                                </div>
                                                @php
                                                    $subtotalprice = 0;
                                                    $qty = 0;
                                                @endphp
{{-- 
                                                {{-- @foreach ($cartList as $cartdata)
											{{-- @php
											$total = $cartdata->product->price * $cartdata->qty;
											$subtotalprice += $total;
											$qty += $cartdata->qty;

											$shipping = 100;
											$shippingCharge = \App\Helpers\Helper::shippingcharges($shipping);

											$discountAmount = 0;

											if (Session::has('coupon_code') && !empty(Session::get('coupon_code'))) {
											if ($cupndata->type == 1) {
											$discountAmount = ($subtotalprice * $cupndata->amount) / 100;
											} else {
											$discountAmount = $cupndata->amount;
											}
											}


											@endphp
											@endforeach --}} -


                                                <div class="cart-subtotal">
                                                    <div class="title">Subtotal</div>
                                                    {{-- <div><span>{{ \App\Helpers\Helper::displayPrice($subtotalprice) }}</span></div> --}}
                                                </div>

                                                <div class="shipping-totals">
                                                    <div class="title">Shipping</div>
                                                    <div>
                                                        <ul class="shipping-methods custom-radio">

                                                        </ul>
                                                        <p class="shipping-desc" id="couponSection">
                                                            {{-- @if (Session::post('coupon_code'))
                                                                {{-- <div>Coupon ({{ session('coupon_code') }})<span>{{ \App\Helpers\Helper::displayPrice($discountAmount) }}</span> <a href="javascript:void(0);" onclick="deleteCoupon({{ $cupndata['id'] }})" class="text-danger">X</a></div> --}}
                                                           
                                                            {{-- <div><span>{{ \App\Helpers\Helper::displayPrice($subtotalprice) }} + {{ \App\Helpers\Helper::displayPrice($qty * $shipping) }}</span></div> --}}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="order-total">
                                                    <div class="title">Total</div>
                                                    {{-- <div><span>{{ \App\Helpers\Helper::displayPrice($subtotalprice + ($qty * $shipping) - $discountAmount) }}</span></div> --}}
                                                </div>
                                            </div>
                                            <div id="payment" class="checkout-payment">
                                                <ul class="payment-methods methods custom-radio">


                                                    <li class="payment-method">
                                                        <input type="radio" class="codtype" name="codtype"
                                                            value="1">
                                                        <label>Cash on delivery</label>
                                                        <div class="payment-box">
                                                            <p>Pay with cash upon delivery.</p>
                                                        </div>
                                                    </li>
                                                    <li class="payment-method">
                                                        <input type="radio" class="codtype" name="codtype"
                                                            value="2">
                                                        <label>PayPal</label>
                                                        <div class="payment-box">
                                                            <p>Pay via PayPal; you can pay with your credit card if you
                                                                don’t have a PayPal account.</p>
                                                        </div>
                                                    </li>
                                                    <form action="" method="POST" id="valid">
                                                        @csrf
                                                        <input type="hidden" name="addid" id="addid">
                                                        <input type="hidden" name="codtype" id="codtype">
                                                        <p class="adderr text-danger"></p>
                                                        <p class="coderr text-danger"></p>
                                                    </form>

                                                </ul>

                                                <div class="form-row place-order">
                                                    <div class="terms-and-conditions-wrapper">
                                                        <div class="privacy-policy-text"></div>
                                                    </div>
                                                    <button type="submit" class="button alt ordertype"
                                                        onclick="ordertype();" name="checkout_place_order"
                                                        value="Place order">Place order</button>
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
@endsection
<script>
    function ordertype() {

        if ($('.addressid:checked').length < 1) {
            $('.adderr').text('');

            $(".adderr").text('plese select  address id');

        }
        if ($('.codtype:checked').length < 1) {
            $('.coderr').text('');

            $(".coderr").text('plese select payment type');

        } else {
            id = $("input[name= addressid ]:checked").val();
            type = $("input[name= codtype]:checked").val();

            $('#addid').val(id);
            $('#codtype').val(type);
            $('#valid').submit();
            return false;

        }
    }

    function deleteCoupon() {
        $.ajax({
            url: "",
            type: "POST",
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.success) {
                    // Display success message with SweetAlert
                    Swal.fire({
                        icon: 'success',
                        title: 'Coupon deleted',
                        text: 'The coupon has been successfully deleted.',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        // Reload the page after the alert is closed
                        location.reload();
                    });
                } else {
                    // Display error message with SweetAlert
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed to delete coupon',
                        text: 'An error occurred while deleting the coupon.',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX request failed:', error);
            }
        });
    }

    function gallery(addressId) {
        console.log("Address ID: ", addressId); // Check if addressId is received properly

        $.ajax({
            type: 'get',
            url: "",
            data: {
                add_id: addressId,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.success) {
                    // Address deleted successfully, handle success with SweetAlert
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message,
                    }).then((result) => {
                        // Reload the page after the alert is closed
                        location.reload();
                    });
                } else {
                    // Address not found or other error occurred, handle error with SweetAlert
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message,
                    });
                }
            },
            error: function(xhr, status, error) {
                // Handle AJAX errors with SweetAlert
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An error occurred while processing your request.',
                });
                console.error(error);
            }
        });
    }
</script>
