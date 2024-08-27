@extends('frontend.layouts.main')
@section('content')
    <div id="site-main" class="site-main">
        <div id="main-content" class="main-content">
            <div id="primary" class="content-area">
                <div id="content" class="site-content" role="main">
                    <section class="section m-b-70">
                        <!-- Block Sliders -->
                        <div class="block block-sliders auto-height color-white nav-center">
                            <div class="slick-sliders" data-autoplay="true" data-dots="true" data-nav="true"
                                data-columns4="1" data-columns3="1" data-columns2="1" data-columns1="1" data-columns1440="1"
                                data-columns="1">
                                @foreach ($getbanner as $banner)
                                    @if ($banner->position_id == 3)
                                        <div class="item slick-slide">
                                            <div class="item-content">
                                                <div class="content-image">
                                                    <img width="1920" height="1080"
                                                        src="{{ asset('uploads/banners/' . $banner->banner_image) }}"
                                                        alt="Image Slider">
                                                </div>
                                                <div class="item-info horizontal-start vertical-middle">
                                                    <div class="content">
                                                        <h2 class="title-slider">
                                                            {{ $banner->title }}<br>{{ $banner->sub_title }}</h2>
                                                        <a class="button-slider button button-white button-outline thick-border"
                                                            href="shop-grid-left.html">Explore Bestseller</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                    </section>

                    <section class="section section-padding m-b-70">
                        <div class="section-container large">
                            <div class="block block-banners layout-1 banners-effect">
                                <div class="block-widget-wrap small-space">
                                    <div class="row">
                                        @foreach ($getbanner as $banner)
                                            @if ($banner->position_id == 2)
                                                <div class="col-md-4"><!-- Adjust the column width based on your layout -->
                                                    <div class="block-widget-banner">
                                                        <div class="bg-banner">
                                                            <div class="banner-wrapper banners">
                                                                <div class="banner-image">
                                                                    <a href="shop-grid-left.html">
                                                                        <img src="{{ asset('uploads/banners/' . $banner->banner_image) }}"
                                                                            alt="Banner Image">
                                                                    </a>
                                                                </div>
                                                                <div class="banner-wrapper-infor">
                                                                    <div class="info">
                                                                        <div class="content">
                                                                            <h3 class="title-banner">New Arrivals</h3>
                                                                            <a class="button"
                                                                                href="shop-grid-left.html">Shop Now</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        </div>
                    </section>


                    <section class="section section-padding m-b-70">
                        <div class="section-container">
                            <!-- Block Product Categories -->
                            <div class="block block-product-cats slider round-border">
                                <div class="block-widget-wrap">
                                    <div class="block-title">
                                        <h2>Top Categories</h2>
                                    </div>
                                    <div class="block-content">
                                        <div class="product-cats-list slick-wrap">
                                            <div class="slick-sliders content-category" data-dots="0"
                                                data-slidestoscroll="true" data-nav="1" data-columns4="2"
                                                data-columns3="3" data-columns2="3" data-columns1="5" data-columns1440="5"
                                                data-columns="5">
                                                @foreach ($getcate as $category)
                                                    <div class="item item-product-cat slick-slide">
                                                        <div class="item-product-cat-content">
                                                            <a href="{{ route('frontend.shop-grid-left', $category->id) }}">
                                                                <div class="item-image animation-horizontal">
                                                                    <img width="258" height="258"
                                                                        src="{{ asset('uploads/category/' . $category['categories_image']) }}"
                                                                        alt="{{ $category->name }}">
                                                                </div>
                                                            </a>
                                                            <div class="product-cat-content-info">
                                                                <h2 class="item-title">
                                                                    <a href="php">{{ $category->name }}</a>
                                                                </h2>
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
                    </section>

                    <section class="section background-img bg-img-1 m-b-70">
                        <div class="block block-intro">
                            <div class="row">
                                <div class="section-column left">
                                    <div class="intro-wrap">
                                        @foreach ($getpage as $introItem)
                                            <h2 class="intro-title">{{ $introItem['title'] }}</h2>
                                            <div class="intro-item">
                                                <div class="icon">
                                                    <span class="wrap animation-horizontal">
                                                        {!! $introItem['icon'] !!}
                                                        <!-- Assuming $introItem['icon'] contains the SVG code -->
                                                    </span>
                                                </div>
                                                <div class="content">
                                                    <h3 class="title">{{ $introItem['subtitle'] }}</h3>
                                                    <div class="text">{{ $introItem['description'] }}</div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="intro-btn">
                                            <a href="shop-grid-left.html"
                                                class="button button-black button-arrow animation-horizontal">LEARN MORE</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="section-column right">
                                    <a href="#">
                                        <img class="hover-opacity" width="820" height="674"
                                            src="{{ asset('uploads/banners/' . $introItem['image']) }}" alt="intro">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="section section-padding m-b-70">
                        <div class="section-container large">
                            <!-- Block Products -->
                            <div class="block block-products slider">
                                <div class="block-widget-wrap">
                                    <div class="block-title">
                                        <h2>Trending Products</h2>
                                    </div>
                                    <div class="block-content">
                                        <div class="content-product-list slick-wrap">
                                            <div class="slick-sliders products-list grid" data-slidestoscroll="true"
                                                data-dots="false" data-nav="1" data-columns4="1" data-columns3="2"
                                                data-columns2="2" data-columns1="3" data-columns1440="4"
                                                data-columns="4">
                                                @foreach ($getproduct as $product)
                                                    <div class="item-product slick-slide">
                                                        <div class="items">
                                                            <div class="products-entry clearfix product-wapper">
                                                                <div class="products-thumb">
                                                                    <div class="product-lable">
                                                                        <div class="hot">Hot</div>
                                                                    </div>
                                                                    <div class="product-thumb-hover">
                                                                        <a href="{{ route('frontend.single', $product->id) }}">
                                                                            <img width="600" height="600"
                                                                                src="{{ asset('uploads/banners/' . $product['main_image']) }}"
                                                                                class="post-image" alt="">
                                                                            <img width="300" height="600"
                                                                                src="{{ asset('uploads/font/' . $product['back_img']) }}"
                                                                                class="hover-image back" alt="">
                                                                        </a>
                                                                    </div>
                                                                    <div class="product-button">
                                                                        <div class="btn-add-to-cart"
                                                                            data-title="Add to cart">
                                                                            <a rel="nofollow" href="#"
                                                                                class="product-btn button">Add to cart</a>
                                                                        </div>
                                                                        <div class="btn-wishlist" data-title="Wishlist">
                                                                            <button class="product-btn">Add to
                                                                                wishlist</button>
                                                                        </div>
                                                                        <div class="btn-compare" data-title="Compare">
                                                                            <button class="product-btn">Compare</button>
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
                                                                    <div class="contents">
                                                                        <div class="rating">
                                                                            <div class="star star-0"></div><span
                                                                                class="count">(0 review)</span>
                                                                        </div>
                                                                        <h3 class="product-title"><a
                                                                                href="shop-details.html">{{ $product->name }}</a>
                                                                        </h3>
                                                                        <span
                                                                            class="price">₹{{ $product->mrp_price }}</span>
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

                    </section>


                    <section class="section section-padding">
                        <div class="section-container large">
                            <!-- Block Banners (Layout 2) -->
                            <div class="block block-banners layout-2 banners-effect">
                                <div class="block-widget-wrap">
                                    <div class="row">
                                        @foreach ($getbanner as $banner)
                                            @if ($banner->position_id == 1)
                                                <div class="col-md-6">
                                                    <div class="block-widget-banner m-b-15">
                                                        <div class="bg-banner">
                                                            <div class="banner-wrapper banners">
                                                                <div class="banner-image">
                                                                    <a href="shop-grid-left.html">
                                                                        <img width="856" height="496"
                                                                            src="{{ asset('uploads/banners/' . $banner['banner_image']) }}"
                                                                            alt="Banner Image">
                                                                    </a>
                                                                </div>
                                                                <div class="banner-wrapper-infor">
                                                                    <div class="info">
                                                                        <div class="content">
                                                                            <h3 class="title-banner">Summer Collections
                                                                            </h3>
                                                                            <div class="banner-image-description">
                                                                                Freshwater pearl necklace and earrings
                                                                            </div>

                                                                            <a class="button button-outline thick-border border-white button-arrow"
                                                                                href="shop-grid-left.html">Explore</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="section section-padding background-img bg-img-2 m-b-70 p-t-140 p-b-70 m-t-n-130">
                        <div class="section-container">
                            <!-- Block Testimonial -->
                            <div class="block block-testimonial layout-2">
                                <div class="block-widget-wrap">
                                    <div class="block-title">
                                        <h2>What Our Customers Say</h2>
                                    </div>
                                    <div class="block-content">
                                        <div class="testimonial-wrap slick-wrap">
                                            <div class="slick-sliders" data-slidestoscroll="true"
                                                data-slidestoscroll="true" data-nav="1" data-dots="0"
                                                data-columns4="1" data-columns3="1" data-columns2="1" data-columns1="2"
                                                data-columns="3">
                                                <div class="testimonial-content">
                                                    <div class="item">
                                                        <div class="testimonial-item">
                                                            <div class="testimonial-icon">
                                                                <div class="rating">
                                                                    <div class="star star-5"></div>
                                                                </div>
                                                            </div>
                                                            <h2 class="testimonial-title">“Amazing piece of history”</h2>
                                                            <div class="testimonial-excerpt">
                                                                Blood bank canine teeth larynx occupational therapist
                                                                oncologist optician plaque spinal tap stat strep...
                                                            </div>
                                                        </div>
                                                        <div class="testimonial-image image-position-top">
                                                            <div class="thumbnail">
                                                                <img width="110" height="110"
                                                                    src="{{ url('media/testimonial/1.jpg') }}"
                                                                    alt="">
                                                            </div>
                                                            <div class="testimonial-info">
                                                                <h2 class="testimonial-customer-name">Robet Smith</h2>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="testimonial-content">
                                                    <div class="item">
                                                        <div class="testimonial-item">
                                                            <div class="testimonial-icon">
                                                                <div class="rating">
                                                                    <div class="star star-4"></div>
                                                                </div>
                                                            </div>
                                                            <h2 class="testimonial-title">“Fabulous Grounds”</h2>
                                                            <div class="testimonial-excerpt">
                                                                Blood bank canine teeth larynx occupational therapist
                                                                oncologist optician plaque spinal tap stat strep...
                                                            </div>
                                                        </div>
                                                        <div class="testimonial-image image-position-top">
                                                            <div class="thumbnail">
                                                                <img width="110" height="110"
                                                                    src="{{ url('media/testimonial/2.jpg') }}"
                                                                    alt="">
                                                            </div>
                                                            <div class="testimonial-info">
                                                                <h2 class="testimonial-customer-name">Saitama One</h2>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="testimonial-content">
                                                    <div class="item">
                                                        <div class="testimonial-item">
                                                            <div class="testimonial-icon">
                                                                <div class="rating">
                                                                    <div class="star star-5"></div>
                                                                </div>
                                                            </div>
                                                            <h2 class="testimonial-title">“Great vineyard tour and
                                                                tasting!”</h2>
                                                            <div class="testimonial-excerpt">
                                                                Blood bank canine teeth larynx occupational therapist
                                                                oncologist optician plaque spinal tap stat strep...
                                                            </div>
                                                        </div>
                                                        <div class="testimonial-image image-position-top">
                                                            <div class="thumbnail">
                                                                <img width="110" height="110"
                                                                    src="{{ url('media/testimonial/3.jpg') }}"
                                                                    alt="">
                                                            </div>
                                                            <div class="testimonial-info">
                                                                <h2 class="testimonial-customer-name">Sara Colinton</h2>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="testimonial-content">
                                                    <div class="item">
                                                        <div class="testimonial-item">
                                                            <div class="testimonial-icon">
                                                                <div class="rating">
                                                                    <div class="star star-5"></div>
                                                                </div>
                                                            </div>
                                                            <h2 class="testimonial-title">“Stunning Design”</h2>
                                                            <div class="testimonial-excerpt">
                                                                Blood bank canine teeth larynx occupational therapist
                                                                oncologist optician plaque spinal tap stat strep...
                                                            </div>
                                                        </div>
                                                        <div class="testimonial-image image-position-top">
                                                            <div class="thumbnail">
                                                                <img width="110" height="110"
                                                                    src="{{ url('media/testimonial/4.jpg') }}"
                                                                    alt="">
                                                            </div>
                                                            <div class="testimonial-info">
                                                                <h2 class="testimonial-customer-name">Shetty Jamie</h2>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="section section-padding m-b-80">
                        <div class="section-container">
                            <!-- Block Newsletter (Layout 2) -->
                            <div class="block block-newsletter layout-2 one-col">
                                <div class="block-widget-wrap">
                                    <div class="newsletter-title-wrap">
                                        <h2 class="newsletter-title">Latest From MoJuri!</h2>
                                        <div class="newsletter-text">Sign-up to receive 10% off your next purchase. Plus
                                            hear about new arrivals and offers.</div>
                                    </div>
                                    <form action="#" method="post" class="newsletter-form">
                                        <input type="email" name="your-email" value="" size="40"
                                            placeholder="Email address">
                                        <span class="btn-submit">
                                            <input type="submit" value="SUBSCRIBE">
                                        </span>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="section section-padding top-border p-t-10 p-b-10 m-b-0">
                        <div class="section-container">
                            <!-- Block Image -->
                            <div class="block block-image slider">
                                <div class="block-widget-wrap">
                                    <div class="slick-wrap">
                                        <div class="slick-sliders" data-nav="0" data-columns4="1" data-columns3="2"
                                            data-columns2="3" data-columns1="4" data-columns1440="4" data-columns="5">

                                            @foreach ($brandImages as $brand)
                                                <div class="item slick-slide">
                                                    <div class="item-image animation-horizontal">
                                                        <a href="#">
                                                            <img width="450" height="450"
                                                                src="{{ asset('uploads/Category/' . $brand['brand_image']) }}"
                                                                alt="{{ $brand['alt_text'] }}">
                                                        </a>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                </div><!-- #content -->
            </div><!-- #primary -->
        </div><!-- #main-content -->
    </div>
@endsection
