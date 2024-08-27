@extends('frontend.layout.main')
@section('content')
    <div id="site-main" class="site-main">
        <div id="main-content" class="main-content">
            <div id="primary" class="content-area">
                <div id="title" class="page-title">
                    <div class="section-container">
                        <div class="content-title-heading">
                            <h1 class="text-title-heading">
                                Bracelets
                            </h1>
                        </div>
                        <div class="breadcrumbs">
                            <a href="index-2.html">Home</a><span class="delimiter"></span><a
                                href="shop-grid-left.html">Shop</a><span class="delimiter"></span>Bracelets
                        </div>
                    </div>
                </div>

                <div id="content" class="site-content" role="main">
                    <div class="section-padding">
                        <div class="section-container p-l-r">
                            <div class="row">
                                <div class="col-xl-3 col-lg-3 col-md-12 col-12 sidebar left-sidebar md-b-50 p-t-10">
                                    <!-- Block Product Categories -->
                                    <div class="block block-product-cats">
                                        <div class="block-title">
                                            <h2>SubCategories</h2>
                                        </div>
                                        <div class="block-content">
                                            <div class="product-cats-list">
                                                <ul>
                                                    @foreach ($subcategory as $get)
                                                        <li class="current      ">
                                                            <a href="shop-grid-left.html">{{ $get->subcategories_name }}
                                                                <span class="count">{{ $get->id }}</span></a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Block Product Filter -->
                                    <div class="block block-product-filter">
                                        <div class="block-title">
                                            <h2>Price</h2>
                                        </div>
                                        <div class="block-content">
                                            <div id="slider-range" class="price-filter-wrap">
                                                <div class="filter-item price-filter">
                                                    <div class="layout-slider">
                                                        <input id="price-filter" name="price" value="0;100" />
                                                    </div>
                                                    <div class="layout-slider-settings"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Block Product Filter -->
                                    <div class="block block-product-filter clearfix">
                                        <div class="block-title">
                                            <h2>Color</h2>
                                        </div>
                                        <div class="block-content">
                                            <ul class="filter-items color">
                                                @foreach ($colorlist as $get)
                                                    <li><a href="shop-grid-left.html"><span class="color-wrap"><span
                                                                    class="color"
                                                                    style="background-color: {{ $get->hex_value }}"></span>{{ $get->name }}</span><span
                                                                class="count">{{ $get->id }}</span></a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>

                                    <!-- Block Product Filter -->
                                    <div class="block block-product-filter clearfix">
                                        <div class="block-title">
                                            <h2>Size</h2>
                                        </div>
                                        <div class="block-content">
                                            <ul class="filter-items text">
                                                @foreach ($size as $sizes)
                                                    <li><a
                                                            href="shop-grid-left.html"><span>{{ $sizes->size_name }}</span></a>
                                                    </li>
                                                @endforeach

                                            </ul>
                                        </div>
                                    </div>

                                    <!-- Block Product Filter -->
                                    <div class="block block-product-filter clearfix">
                                        <div class="block-title">
                                            <h2>Brands</h2>
                                        </div>
                                        <div class="block-content">
                                            <ul class="filter-items image">
                                                @foreach ($brands as $brand)
                                                    <li><a href="shop-grid-left.html"><span><img
                                                                    src="{{ asset('uploads/Category/' . $brand->brand_image) }}"
                                                                    alt="Brand"></span></a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>

                                    <!-- Block Products -->

                                </div>

                                <div class="col-xl-9 col-lg-9 col-md-12 col-12">
                                    <div class="products-topbar clearfix">
                                        <div class="products-topbar-left">
                                            <div class="products-count">
                                                Showing all 21 results
                                            </div>
                                        </div>
                                        <div class="products-topbar-right">
                                            <div class="products-sort dropdown">
                                                <span class="sort-toggle dropdown-toggle" data-toggle="dropdown"
                                                    aria-expanded="true">Default sorting</span>
                                                <ul class="sort-list dropdown-menu" x-placement="bottom-start">
                                                    <li class="active"><a href="#">Default sorting</a></li>
                                                    <li><a href="#">Sort by popularity</a></li>
                                                    <li><a href="#">Sort by average rating</a></li>
                                                    <li><a href="#">Sort by latest</a></li>
                                                    <li><a href="#">Sort by price: low to high</a></li>
                                                    <li><a href="#">Sort by price: high to low</a></li>
                                                </ul>
                                            </div>
                                            <ul class="layout-toggle nav nav-tabs">
                                                <li class="nav-item">
                                                    <a class="layout-grid nav-link active" data-toggle="tab"
                                                        href="#layout-grid" role="tab"><span class="icon-column"><span
                                                                class="layer first"><span></span><span></span><span></span></span><span
                                                                class="layer middle"><span></span><span></span><span></span></span><span
                                                                class="layer last"><span></span><span></span><span></span></span></span></a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="layout-list nav-link" data-toggle="tab" href="#layout-list"
                                                        role="tab"><span class="icon-column"><span
                                                                class="layer first"><span></span><span></span></span><span
                                                                class="layer middle"><span></span><span></span></span><span
                                                                class="layer last"><span></span><span></span></span></span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
 
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="layout-grid" role="tabpanel">
                                            <div class="products-list grid">
                                                <div class="row">
                                                    @foreach ($products as $product)
                                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                                            <div class="products-entry clearfix product-wapper">
                                                                <div class="products-thumb">
                                                                    <div class="product-lable">
                                                                        <div class="hot">Hot</div>
                                                                    </div>
                                                                    <div class="product-thumb-hover">
                                                                        <a href="shop-details.html">
                                                                            <img width="600" height="600"
                                                                                src="{{ asset('uploads/banners/' . $product->main_image) }}"
                                                                                class="post-image" alt="">
                                                                            <img width="600" height="600"
                                                                                src="{{ asset('uploads/banners/' . $product->back_img) }}"
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
                                                                    <div class="contents text-center">
                                                                        <div class="rating">
                                                                            <div class="star star-0"></div><span
                                                                                class="count">(0 review)</span>
                                                                        </div>
                                                                        <h3 class="product-title"><a
                                                                                href="shop-details.html">{{ $product->name }}</a>
                                                                        </h3>
                                                                        <span class="price">${{ $product->price }}</span>
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
                                <nav class="pagination">
                                    <ul class="page-numbers">
                                        <li><a class="prev page-numbers" href="#">Previous</a></li>
                                        <li><span aria-current="page" class="page-numbers current">1</span></li>
                                        <li><a class="page-numbers" href="#">2</a></li>
                                        <li><a class="page-numbers" href="#">3</a></li>
                                        <li><a class="next page-numbers" href="#">Next</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
