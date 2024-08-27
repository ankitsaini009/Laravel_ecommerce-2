        @extends('frontend.layouts.main')
        @section('content')
            <div id="site-main" class="site-main">
                <div id="main-content" class="main-content">
                    <div id="primary" class="content-area">
                        <div id="title" class="page-title">
                            <div class="section-container">
                                <div class="content-title-heading">
                                    <h1 class="text-title-heading">
                                        Shopping Cart
                                    </h1>
                                </div>
                                <div class="breadcrumbs">
                                    <a href="index-2.html">Home</a><span class="delimiter"></span><a
                                        href="shop-grid-left.html">Shop</a><span class="delimiter"></span>Shopping Cart
                                </div>
                            </div>
                        </div>
                        <div id="content" class="site-content" role="main">
                            <div class="section-padding">
                                <div class="section-container p-l-r">
                                    <div class="shop-cart">
                                        <div class="row">
                                            <div class="col-xl-8 col-lg-12 col-md-12 col-12">
                                                <form class="cart-form" action="{{ route('cart.update') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="qty" value="updateqty">
                                                    <div class="table-responsive">
                                                        <table class="cart-items table" cellspacing="0">
                                                            <thead>
                                                                <tr>
                                                                    <th class="product-thumbnail">Product</th>
                                                                    <th class="product-price">Price</th>
                                                                    <th class="product-quantity">Quantity</th>
                                                                    <th class="product-subtotal">Subtotal</th>
                                                                    <th class="product-remove">&nbsp;</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @php
                                                                    $total = 0;
                                                                    $qty = 0;
                                                                @endphp
                                                                @foreach ($cartItems as $cartdata)
                                                                    @php
                                                                        $total +=
                                                                            $cartdata->qty *
                                                                            $cartdata->products->mrp_price;
                                                                        $qty += $cartdata->qty;
                                                                    @endphp
                                                                    <tr class="cart-item">
                                                                        <td class="product-thumbnail">
                                                                            <a
                                                                                href="{{ route('frontend.single', $cartdata->products->id) }}">
                                                                                <img width="600" height="600"
                                                                                    src="{{ asset('uploads/banners/' . $cartdata->products->main_image) }}"
                                                                                    class="product-image" alt="">
                                                                            </a>
                                                                            <div class="product-name">
                                                                                <a
                                                                                    href="{{ route('frontend.single', $cartdata->products->id) }}">{{ $cartdata->products->name }}</a>
                                                                            </div>
                                                                        </td>
                                                                        <td class="product-price">
                                                                            <span
                                                                                class="price">{{ \App\helper\helper::displayPrice($cartdata->products->mrp_price) }}</span>
                                                                        </td>
                                                                        <td class="product-quantity">
                                                                            <div class="quantity">
                                                                                <button type="button"
                                                                                    class="minus">-</button>
                                                                                <input type="number" class="qty"
                                                                                    step="1" min="0"
                                                                                    max=""
                                                                                    name="quantity[{{ $cartdata->id }}]"
                                                                                    Shopping Cart
                                                                                    value="{{ $cartdata->qty }}"
                                                                                    title="Qty" size="4"
                                                                                    placeholder="" inputmode="numeric"
                                                                                    autocomplete="off">
                                                                                <button type="button"
                                                                                    class="plus">+</button>
                                                                            </div>
                                                                        </td>
                                                                        <td class="product-subtotal">
                                                                            <span>{{ \App\helper\helper::displayPrice($cartdata->qty * $cartdata->products->mrp_price) }}</span>
                                                                        </td>
                                                                        <td class="product-remove"> <a
                                                                                href="javascript:void(0);"
                                                                                class="remove"onclick="gallery({{ $cartdata->id }})"></a>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                                <!-- Cart Actions -->
                                                                <tr>
                                                                    <td colspan="6" class="actions">
                                                                        <div class="bottom-cart">
                                                                            @if ($cartdata)
                                                                                <h2><a
                                                                                        href="{{ route('frontend.shop-grid-left', $cartdata->products->category_id) }}">Continue
                                                                                        Shopping</a>
                                                                                </h2>
                                                                            @endif
                                                                            <button type="submit" name="update_cart"
                                                                                class="button" value="Update cart">Update
                                                                                cart</button>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </form>
                                            </div>

                                            <div class="col-xl-4 col-lg-12 col-md-12 col-12">
                                                <div class="coupon">

                                                    <form action="{{ route('apply.coupon') }}" method="post">
                                                        @csrf
                                                        <input type="text" name="coupan_code" class="input-text"
                                                            id="coupon-code" value="{{ old('coupan_code') }}"
                                                            placeholder="coupan_code">
                                                        <button type="submit" class="button">Apply coupon</button>
                                                        @if (session('success'))
                                                            <div class="text-danger">
                                                                {{ session('success') }}
                                                            </div>
                                                        @endif
                                                        @if (session('error'))
                                                            <div class="text-danger">
                                                                {{ session('error') }}
                                                            </div>
                                                        @endif
                                                    </form>


                                                    <div class="cart-totals">
                                                        <h2>Cart totals</h2>
                                                        @php
                                                            $shippingCharge = env('SHIPPING_CHARGE', 100);
                                                            $couponPrice = 0;
                                                            $totalAmount = 0;
                                                        @endphp
                                                        @if (session('coupon') && session('coupon')->type == 1)
                                                            @php
                                                                $couponPrice =
                                                                    ($total * session('coupon')->amount) / 100;
                                                                $totalAmount = $total - $couponPrice + $shippingCharge;
                                                            @endphp
                                                        @elseif(session('coupon'))
                                                            @php
                                                                $couponPrice = session('coupon')->amount;
                                                                $totalAmount = $total - $couponPrice + $shippingCharge;
                                                            @endphp
                                                        @else
                                                            @php
                                                                $totalAmount = $total + $shippingCharge;
                                                            @endphp
                                                        @endif
                                                        <div>
                                                            <div class="cart-subtotal">
                                                                <div class="title">Subtotal</div>
                                                                <div>
                                                                    <span>{{ \App\helper\helper::displayPrice($total) }}</span>
                                                                </div>
                                                            </div>
                                                            @if (session()->has('coupon'))
                                                                <div class="cart-subtotal">
                                                                    <div class="title">
                                                                        *Coupon ({{ session('coupon')->coupans_code }})
                                                                        <a href="javascript:void(0);"
                                                                            onclick="retancoupan({{ session('coupon')->id }})"
                                                                            class="text-danger">ddd</a>
                                                                    </div>
                                                                    <span>{{ \App\helper\helper::displayPrice($couponPrice) }}</span>
                                                                </div>
                                                            @endif
                                                            <div class="shipping-totals">
                                                                <div class="title">Shipping</div>
                                                                <div>
                                                                    <span>{{ \App\helper\helper::displayPrice($shippingCharge * $qty) }}</span>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <ul class="shipping-methods custom-radio">
                                                                </ul>
                                                                <p class="shipping-desc">
                                                                </p>
                                                            </div>
                                                            <div class="order-total">
                                                                <div class="title">Total</div>
                                                                <div>{{ \App\helper\helper::displayPrice($totalAmount) }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="proceed-to-checkout">
                                                            <a href="{{ route('frontend.chekout') }}"
                                                                class="checkout-button button">
                                                                Proceed to checkout
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="shop-cart-empty">
                                                        <div class="notices-wrapper">
                                                            <p class="cart-empty">Your cart is currently empty.</p>
                                                        </div>
                                                        <div class="return-to-shop">
                                                            <a class="button" href="shop-grid-left.html">
                                                                Return to shop
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="shop-cart-empty">
                                        <div class="notices-wrapper">
                                            <p class="cart-empty">Your cart is currently empty.</p>
                                        </div>
                                        <div class="return-to-shop">
                                            <a class="button" href="shop-grid-left.html">
                                                Return to shop
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- #content -->
                    </div><!-- #primary -->
                </div><!-- #main-content -->
            </div>
        @endsection
        @section('script')
            <script>
                function gallery(cart_id) {
                    $.ajax({
                        url: "{{ route('delete.removed') }}", // Ensure correct route function and URL
                        type: "get", // Change the request type to POST for more secure operations
                        data: {
                            cart_id: cart_id
                        },
                        success: function(response) {
                            console.log(response);
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX Error:', error);
                        }
                    });

                }
            </script>
        @endsection