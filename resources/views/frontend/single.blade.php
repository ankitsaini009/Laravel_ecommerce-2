@extends('frontend.layout.main')
@section('content')
    <div id="site-main" class="site-main">
        <div id="main-content" class="main-content">
            <div id="primary" class="content-area">
                <div id="title" class="page-title">
                    <div class="section-container">
                        <div class="content-title-heading">
                            <h1 class="text-title-heading">
                                Bora Armchair
                            </h1>
                        </div>
                        <div class="breadcrumbs">
                            <a href="frontend.single">Home</a><span class="delimiter"></span><a
                                href="shop-grid-left.html">Shop</a><span class="delimiter"></span>Bora Armchair
                        </div>
                    </div>
                </div>

                <div id="content" class="site-content" role="main">
                    <div class="shop-details zoom" data-product_layout_thumb="scroll" data-zoom_scroll="true"
                        data-zoom_contain_lens="true" data-zoomtype="inner" data-lenssize="200" data-lensshape="square"
                        data-lensborder="" data-bordersize="2" data-bordercolour="#f9b61e" data-popup="false">

                        @foreach ($prolist as $vjs)
                            <div class="product-top-info">
                                <div class="section-padding">
                                    <div class="section-container p-l-r">
                                        <div class="row">
                                            <div class="product-images col-lg-7 col-md-12 col-12">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="content-thumbnail-scroll">
                                                            <i class="slick-arrow fa fa-angle-left" style=""></i>
                                                            <div class="image-thumbnail slick-carousel slick-vertical slick-initialized slick-slider"
                                                                data-asnavfor=".image-additional" data-centermode="true"
                                                                data-focusonselect="true" data-columns4="5"
                                                                data-columns3="4" data-columns2="4" data-columns1="4"
                                                                data-columns="4" data-nav="true"
                                                                data-vertical="&quot;true&quot;"
                                                                data-verticalswiping="&quot;true&quot;">
                                                                @foreach ($galleryimg as $gimage)
                                                                    <div class="img-item">
                                                                        <span class="img-thumbnail-scroll">
                                                                            <img width="600" height="600"
                                                                                src="{{ asset('uploads/banners/' . $gimage['galleryimg']) }}"
                                                                                alt="">
                                                                        </span>
                                                                    </div>
                                                                @endforeach

                                                            </div>
                                                            <i class="slick-arrow fa fa-angle-right" style=""></i>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-10">
                                                        <div class="scroll-image main-image">
                                                            <div class="image-additional slick-carousel"
                                                                data-asnavfor=".image-thumbnail" data-fade="true"
                                                                data-columns4="1" data-columns3="1" data-columns2="1"
                                                                data-columns1="1" data-columns="1" data-nav="true">
                                                                <div class="img-item slick-slide">
                                                                    <img width="900" height="900" src=""
                                                                        alt="" title="">
                                                                </div>
                                                                <img width="900" height="900"
                                                                    src="{{ asset('uploads/banners/' . $vjs['main_image']) }}"
                                                                    alt="" title="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="product-info col-lg-5 col-md-12 col-12 ">
                                                <h1 class="title">{{ $vjs->name }}</h1>
                                                <span class="price">
                                                    <del aria-hidden="true"><span>₹{{ $vjs->price }}</span></del>
                                                    <ins><span>₹{{ $vjs->mrp_price }}</span></ins>
                                                </span>
                                                <div class="rating">
                                                    <div class="star star-5"></div>
                                                    <div class="review-count">
                                                        (3<span> reviews</span>)
                                                    </div>
                                                </div>
                                                <div class="description">
                                                    <p>{{ $vjs->description }}</p>
                                                </div>
                                                <div class="variations">
                                                    <table cellspacing="0">
                                                        <tbody>
                                                            <tr>
                                                                <td class="label">Size</td>
                                                                <td class="attributes">
                                                                    <ul class="text">
                                                                        @foreach ($sizes as $size)
                                                                            <li class="sizeid" size_id="{{ $size->id }}"
                                                                                product_id="{{ $vjs->id }}">
                                                                                <span>{{ $size->size_name }}</span>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                    <p class="sizeerr text-danger"></p>

                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="label">Color</td>
                                                                <td class="attributes">
                                                                    <ul class="colors">
                                                                        <div class="colordata">
                                                                            @foreach ($colors as $color)
                                                                                <li><span class="colorid"
                                                                                        color_id="{{ $color->id }}"
                                                                                        product_id="{{ $vjs->id }}"
                                                                                        style="background:{{ $color->hex_value }} !important"
                                                                                        value="{{ $color->hex_value }}"></span>
                                                                                </li>
                                                                            @endforeach
                                                                        </div>
                                                                    </ul>
                                                                    <p class="colorerr text-danger"></p>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="buttons">
                                                    <div class="add-to-cart-wrap">
                                                        <div class="quantity">
                                                            <button type="button" class="plus">+</button>
                                                            <input type="number" class="qty" step="1"
                                                                min="0" max="" name="quantity"
                                                                value="1" title="Qty" size="4"
                                                                placeholder="" inputmode="numeric" autocomplete="off">
                                                            <button type="button" class="minus">-</button>
                                                        </div>
                                                        @if ($user)
                                                            <div class="btn-add-to-cart productcart">
                                                                <a type="submit" id="add-to-cart" tabindex="0">Add to
                                                                    cart</a>
                                                            </div>
                                                        @else
                                                            <div class="btn-add-to-cart">
                                                                <a href="{{ route('frontend.login') }}"
                                                                    tabindex="0">Login</a>
                                                            </div>
                                                        @endif
                                                        <input type="hidden" id="slectedcolorid" value="0">
                                                        <input type="hidden" id="slectedsizeid" value="0">
                                                        <input type="hidden" id="isrunning" value="0">
                                                    </div>
                                                    <div class="btn-quick-buy" data-title="Wishlist">
                                                        <button class="product-btn">Buy It Now</button>
                                                    </div>
                                                    <div class="btn-wishlist" data-title="Wishlist">
                                                        <button class="product-btn">Add to wishlist</button>
                                                    </div>
                                                    <div class="btn-compare" data-title="Compare">
                                                        <button class="product-btn">Compare</button>
                                                    </div>
                                                </div>

                                                <div class="product-meta">
                                                    <span class="sku-wrapper">SKU: <span
                                                            class="sku">D2300-3-2-2</span></span>
                                                    <span class="posted-in">Category: <a href="shop-grid-left.html"
                                                            rel="tag">Bracelets</a></span>
                                                    <span class="tagged-as">Tags: <a href="shop-grid-left.html"
                                                            rel="tag">Hot</a>, <a href="shop-grid-left.html"
                                                            rel="tag">Trend</a></span>
                                                </div>
                                                <div class="social-share">
                                                    <a href="#" title="Facebook" class="share-facebook"
                                                        target="_blank"><i class="fa fa-facebook"></i>Facebook</a>
                                                    <a href="#" title="Twitter" class="share-twitter"><i
                                                            class="fa fa-twitter"></i>Twitter</a>
                                                    <a href="#" title="Pinterest" class="share-pinterest"><i
                                                            class="fa fa-pinterest"></i>Pinterest</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="product-tabs">
                            <div class="section-padding">
                                <div class="section-container p-l-r">
                                    <div class="product-tabs-wrap">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#description"
                                                    role="tab">Description</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#additional-information"
                                                    role="tab">Additional information</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#reviews"
                                                    role="tab">Reviews (1)</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="description" role="tabpanel">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                                    veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                                    commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                                                    velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
                                                    occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                                    mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus
                                                    error sit voluptatem accusantium doloremque laudantium, totam rem
                                                    aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                    beatae vitae dicta sunt explicabo.</p>
                                                <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut
                                                    fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem
                                                    sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor
                                                    sit amet, consectetur, adipisci velit, sed quia non numquam eius modi
                                                    tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.
                                                </p>
                                            </div>
                                            <div class="tab-pane fade" id="additional-information" role="tabpanel">
                                                <table class="product-attributes">
                                                    <tbody>
                                                        <tr class="attribute-item">
                                                            <th class="attribute-label">Color</th>
                                                            <td class="attribute-value">Antique, Chestnut, Grullo</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade" id="reviews" role="tabpanel">
                                                <div id="reviews" class="product-reviews">
                                                    <div id="comments">
                                                        <h2 class="reviews-title">1 review for <span>Bora Armchair</span>
                                                        </h2>
                                                        <ol class="comment-list">
                                                            <li class="review">
                                                                <div class="content-comment-container">
                                                                    <div class="comment-container">
                                                                        <img src="media/user.jpg" class="avatar"
                                                                            height="60" width="60" alt="">
                                                                        <div class="comment-text">
                                                                            <div class="rating small">
                                                                                <div class="star star-5"></div>
                                                                            </div>
                                                                            <div class="review-author">Peter Capidal</div>
                                                                            <div class="review-time">January 12, 2023</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="description">
                                                                        <p>Lorem ipsum dolor sit amet, consectetur
                                                                            adipiscing elit. Nam fringilla augue nec est
                                                                            tristique auctor. Donec non est at libero
                                                                            vulputate rutrum. Morbi ornare lectus quis justo
                                                                            gravida semper. Nulla tellus mi, vulputate
                                                                            adipiscing cursus eu, suscipit id nulla.</p>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ol>
                                                    </div>
                                                    <div id="review-form">
                                                        <div id="respond" class="comment-respond">
                                                            <span id="reply-title" class="comment-reply-title">Add a
                                                                review</span>
                                                            <form action="#" method="post" id="comment-form"
                                                                class="comment-form">
                                                                <p class="comment-notes">
                                                                    <span id="email-notes">Your email address will not be
                                                                        published.</span> Required fields are marked <span
                                                                        class="required">*</span>
                                                                </p>
                                                                <div class="comment-form-rating">
                                                                    <label for="rating">Your rating</label>
                                                                    <p class="stars">
                                                                        <span>
                                                                            <a class="star-1" href="#">1</a><a
                                                                                class="star-2" href="#">2</a><a
                                                                                class="star-3" href="#">3</a><a
                                                                                class="star-4" href="#">4</a><a
                                                                                class="star-5" href="#">5</a>
                                                                        </span>
                                                                    </p>
                                                                </div>

                                                                <p class="comment-form-comment">
                                                                    <textarea id="comment" name="comment" placeholder="Your Reviews *" cols="45" rows="8"
                                                                        aria-required="true" required=""></textarea>
                                                                </p>
                                                                <div class="content-info-reviews">
                                                                    <p class="comment-form-author">
                                                                        <input id="author" name="author"
                                                                            placeholder="Name *" type="text"
                                                                            value="" size="30"
                                                                            aria-required="true" required="">
                                                                    </p>
                                                                    <p class="comment-form-email">
                                                                        <input id="email" name="email"
                                                                            placeholder="Email *" type="email"
                                                                            value="" size="30"
                                                                            aria-required="true" required="">
                                                                    </p>
                                                                    <p class="form-submit">
                                                                        <input name="submit" type="submit"
                                                                            id="submit" class="submit" value="Submit">
                                                                    </p>
                                                                </div>
                                                            </form><!-- #respond -->
                                                        </div>
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-related">
                            <div class="section-padding">
                                <div class="section-container p-l-r">
                                    <div class="block block-products slider">
                                        <div class="block-title">
                                            <h2>Related Products</h2>
                                        </div>
                                        <div class="block-content">
                                            <div class="content-product-list slick-wrap">
                                                <div class="slick-sliders products-list grid" data-slidestoscroll="true"
                                                    data-dots="false" data-nav="1" data-columns4="1" data-columns3="2"
                                                    data-columns2="3" data-columns1="3" data-columns1440="4"
                                                    data-columns="4">
                                                    @foreach ($getsubcategory as $related)
                                                        <div class="item-product slick-slide">
                                                            <div class="items">
                                                                <div class="products-entry clearfix product-wapper">
                                                                    <div class="products-thumb">
                                                                        <div class="product-lable">
                                                                            <div class="hot">Hot</div>
                                                                        </div>
                                                                        <div class="product-thumb-hover">
                                                                            <a
                                                                                href="{{ route('frontend.single', $related->id) }}">
                                                                                <img width="300" height="300"
                                                                                    src="{{ asset('uploads/banners/' . $related->main_image) }}"
                                                                                    class="post-image" alt="">
                                                                                <img width="300" height="300"
                                                                                    src="{{ asset('uploads/banners/' . $related->back_img) }}"
                                                                                    class="hover-image back"
                                                                                    alt="">

                                                                            </a>
                                                                        </div>
                                                                        <div class="product-button">
                                                                            <div class="btn-add-to-cart cartproduct"
                                                                                data-title="Add to cart">
                                                                                <a rel="nofollow" href="#"
                                                                                    class="product-btn button">Add to
                                                                                    cart</a>
                                                                            </div>

                                                                            <div class="btn-wishlist"
                                                                                data-title="Wishlist">
                                                                                <button class="product-btn">Add to
                                                                                    wishlist</button>
                                                                            </div>
                                                                            <div class="btn-compare" data-title="Compare">
                                                                                <button
                                                                                    class="product-btn">Compare</button>
                                                                            </div>
                                                                            <span class="product-quickview"
                                                                                data-title="Quick View">
                                                                                <a href="#"
                                                                                    class="quickview quickview-button">Quick
                                                                                    View <i class="icon-search"></i></a>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="products-content">
                                                                        <div class="contents text-center">
                                                                            <h3 class="product-title"><a
                                                                                    href="{{ route('frontend.single', $related->id) }}">{{ $related->name }}
                                                                                </a></h3>
                                                                            <div class="rating">
                                                                                <div class="star star-5"></div>
                                                                            </div>
                                                                            <span
                                                                                class="price">₹{{ $related->mrp_price }}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Include jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {

            $(document).on('click', '.sizeid', function() {
                var size_id = $(this).attr('size_id');
                var product_id = $(this).attr('product_id');

                $('#selectedsizeid').val(size_id);

                $.ajax({
                    url: '{{ route('color.sizedata') }}',
                    method: 'get',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        sizeid: size_id,
                        productid: product_id,
                    },
                    success: function(data) {
                        var colorHtml = '';
                        $.each(data, function(index, color) {
                            colorHtml += '<li><span class="colorid" color_id="' + color
                                .id + '" product_id="' + product_id +
                                '" style="background: ' + color.color_name +
                                ' !important;" value="' + color.color_name +
                                '"></span></li>';
                        });
                        $(".colordata").html(colorHtml);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });

            $(document).on('click', '.colorid', function() {
                var color_id = $(this).attr('color_id');
                var product_id = $(this).attr('product_id');
                $('#slectedcolorid').val(color_id);
                $.ajax({
                    url: "{{ route('ajax.sizeimg') }}",
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        colorid: color_id,
                        productid: product_id,
                    },
                    success: function(data) {
                        // Handle success response
                        var imagesHtml = '';
                        $.each(data, function(index, image) {
                            imagesHtml += '<img src="' + image.url + '" alt="' + image
                                .alt + '">';
                        });
                        $(".productimagesection").html(imagesHtml);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });

        $(document).on('click', '.productcart', function() {
            var productType = "{{ $vjs->product_type }}";
            var productId = "{{ $vjs->id }}";
            <?php if (isset($user)):?>
            var userId = "{{ $user->id }}";
            <?php endif;?>

            if (productType == 2) {
                var mcolorid = $('#slectedcolorid').val();
                var msizeid = $('#slectedsizeid').val();
                var isrunning = $('#isrunning').val();

                $('.sizeerr').text('');
                $('.colorerr').text('');
                var isvalid = 1;
                if (mcolorid == 0) {
                    isvalid = 0;
                    $('.colorerr').text('Please select color.');
                }
                if (msizeid == 0) {
                    isvalid = 0;
                    $('.sizeerr').text('Please select size.');
                }
                if (isvalid == 1 && isrunning == 0) {
                    $('#isrunning').val(1);
                    $.ajax({
                        url: "{{ route('ajax.addtocart') }}",
                        method: "get",
                        dataType: "json",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {

                            color_id: mcolorid,
                            size_id: msizeid,
                            product_id: productId,
                            user_id: userId
                        },
                        success: function(data) {
                            if (data.message == 'Cart data saved successfully') {
                                Swal.fire({
                                    title: "Cart",
                                    text: "Product added to Cart successfully.",
                                    icon: "success"
                                });
                            }
                        }
                    });
                }
            }
        });

        $(document).on('click', '.colorid', function() {
            // Selected color ID ko hidden input field me set karna
            var colorId = $(this).attr('color_id');
            $('#slectedcolorid').val(colorId);
        });

        // Size option par click hone par
        $(document).on('click', '.sizeid', function() {
            // Selected size ID ko hidden input field me set karna
            var sizeId = $(this).attr('size_id');
            $('#slectedsizeid').val(sizeId);
        });
    </script>
@endsection
