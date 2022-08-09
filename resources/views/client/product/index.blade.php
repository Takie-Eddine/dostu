@extends('client_layout.client')

@section('title','Shop')

@section('style')



    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/'.getFolder().'/plugins/extensions/ext-component-sliders.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/'.getFolder().'/pages/app-ecommerce.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/'.getFolder().'/plugins/extensions/ext-component-toastr.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/select/select2.min.css') }}">
@endsection

@section('content')

<div class="app-content content ecommerce-application">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Products</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('client.client')}}">Home</a>
                                </li>

                                </li>
                                <li class="breadcrumb-item active">Products
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                <div class="mb-1 breadcrumb-right">

                </div>
            </div>
        </div>
        <div class="content-detached content-right">
            <div class="content-body">
                <!-- E-commerce Content Section Starts -->
                <section id="ecommerce-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="ecommerce-header-items">
                                <div class="result-toggler">
                                    <button class="navbar-toggler shop-sidebar-toggler" type="button" data-bs-toggle="collapse">
                                        <span class="navbar-toggler-icon d-block d-lg-none"><i data-feather="menu"></i></span>
                                    </button>
                                    <div class="search-results">16285 results found</div>
                                </div>
                                <div class="view-options d-flex">


                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                @include('client.alerts.errors')
                @include('client.alerts.success')
                <!-- E-commerce Content Section Starts -->

                <!-- background Overlay when sidebar is shown  starts-->
                <div class="body-content-overlay"></div>
                <!-- background Overlay when sidebar is shown  ends-->

                <!-- E-commerce Search Bar Starts -->
                <section id="ecommerce-searchbar" class="ecommerce-searchbar">
                    <div class="row mt-1">
                        <div class="col-sm-12">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control search-product" id="shop-search" placeholder="Search Product" aria-label="Search..." aria-describedby="shop-search" />
                                <span class="input-group-text"><i data-feather="search" class="text-muted"></i></span>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- E-commerce Search Bar Ends -->

                <!-- E-commerce Products Starts -->
                <section id="ecommerce-products" class="grid-view">
                    @foreach ($products as $product)
                    <div class="card ecommerce-card">
                        <div class="item-img text-center">
                            <a href="{{route('client.product.details',$product -> slug)}}"  class="thumbnail product-thumbnail two-image">
                                <img class="img-fluid image-cover"
                                src="{{$product -> images[0] -> photo ?? ''}}"
                                alt=""
                                data-full-size-image-url="{{$product -> images[0] -> photo ?? ''}}"
                                width="600" height="600">

                            </a>
                        </div>
                        <div class="card-body">
                            <div class="item-wrapper">
                                <div class="item-rating">
                                    <ul class="unstyled-list list-inline">
                                        <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                        <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                        <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                        <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                        <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
                                    </ul>
                                </div>
                                <div>
                                    <h6 class="item-price">${{$product->price}}</h6>
                                </div>
                            </div>
                            <h6 class="item-name">
                                <a class="text-body" href="{{route('client.product.details',$product -> slug)}}">{{$product->name}}</a>
                                <span class="card-text item-company">By <a href="#" class="company-name">{{$product->title}}</a></span>
                            </h6>
                            <p class="card-text item-description"> {{$product->description}} </p>
                        </div>
                        <div class="item-options text-center">
                            <div class="item-wrapper">
                                <div class="item-cost">
                                    <h4 class="item-price">${{$product->price}} </h4>
                                </div>
                            </div>
                            <a href="{{route('client.product.wishlist')}}" class="btn btn-light btn-wishlist">
                                <i data-feather="heart"></i>
                                <span>Wishlist</span>
                            </a>
                            <a href="{{route('client.product.addtostore')}}" class="btn btn-primary btn-cart">
                                <i data-feather="shopping-cart"></i>
                                <span class="add-to-cart">Add to store</span>
                            </a>
                        </div>
                    </div>
                    @endforeach
                    </section>
                <!-- E-commerce Products Ends -->

                <!-- E-commerce Pagination Starts -->
                <section id="ecommerce-pagination">
                    <div class="row">
                        <div class="col-sm-12">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center mt-2">
                                    <li class="page-item prev-item"><a class="page-link" href="#"></a></li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item" aria-current="page"><a class="page-link" href="#">4</a></li>
                                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                                    <li class="page-item"><a class="page-link" href="#">6</a></li>
                                    <li class="page-item"><a class="page-link" href="#">7</a></li>
                                    <li class="page-item next-item"><a class="page-link" href="#"></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </section>
                <!-- E-commerce Pagination Ends -->

            </div>
        </div>
        <div class="sidebar-detached sidebar-left">
            <div class="sidebar">
                <!-- Ecommerce Sidebar Starts -->
                <div class="sidebar-shop">
                    <div class="row">
                        <div class="col-sm-12">
                            <h6 class="filter-heading d-none d-lg-block">Filters</h6>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <!-- Price Filter starts -->
                            <div class="multi-range-price">
                                <h6 class="filter-title mt-0">Multi Range</h6>
                                <ul class="list-unstyled price-range" id="price-range">
                                    <li>
                                        <div class="form-check">
                                            <input type="radio" id="priceAll" name="price-range" class="form-check-input" checked />
                                            <label class="form-check-label" for="priceAll">All</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input type="radio" id="priceRange1" name="price-range" class="form-check-input" />
                                            <label class="form-check-label" for="priceRange1">&lt;=$10</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input type="radio" id="priceRange2" name="price-range" class="form-check-input" />
                                            <label class="form-check-label" for="priceRange2">$10 - $100</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input type="radio" id="priceARange3" name="price-range" class="form-check-input" />
                                            <label class="form-check-label" for="priceARange3">$100 - $500</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input type="radio" id="priceRange4" name="price-range" class="form-check-input" />
                                            <label class="form-check-label" for="priceRange4">&gt;= $500</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- Price Filter ends -->

                            <!-- Price Slider starts -->
                            <div class="price-slider">
                                <h6 class="filter-title">Price Range</h6>
                                <div class="price-slider">
                                    <div class="range-slider mt-2" id="price-slider"></div>
                                </div>
                            </div>
                            <!-- Price Range ends -->

                            <!-- Categories Starts -->
                            <div id="product-categories">
                                <h6 class="filter-title">Categories</h6>
                                <ul class="list-unstyled categories-list">
                                    <li>
                                        <div class="form-check">
                                            <input type="radio" id="category1" name="category-filter" class="form-check-input" checked />
                                            <label class="form-check-label" for="category1">Appliances</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input type="radio" id="category2" name="category-filter" class="form-check-input" />
                                            <label class="form-check-label" for="category2">Audio</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input type="radio" id="category3" name="category-filter" class="form-check-input" />
                                            <label class="form-check-label" for="category3">Cameras & Camcorders</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input type="radio" id="category4" name="category-filter" class="form-check-input" />
                                            <label class="form-check-label" for="category4">Car Electronics & GPS</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input type="radio" id="category5" name="category-filter" class="form-check-input" />
                                            <label class="form-check-label" for="category5">Cell Phones</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input type="radio" id="category6" name="category-filter" class="form-check-input" />
                                            <label class="form-check-label" for="category6">Computers & Tablets</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input type="radio" id="category7" name="category-filter" class="form-check-input" />
                                            <label class="form-check-label" for="category7">Health, Fitness & Beauty</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input type="radio" id="category8" name="category-filter" class="form-check-input" />
                                            <label class="form-check-label" for="category8">Office & School Supplies</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input type="radio" id="category9" name="category-filter" class="form-check-input" />
                                            <label class="form-check-label" for="category9">TV & Home Theater</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input type="radio" id="category10" name="category-filter" class="form-check-input" />
                                            <label class="form-check-label" for="category10">Video Games</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- Categories Ends -->

                            <!-- Brands starts -->
                            <div class="brands">
                                <h6 class="filter-title">Brands</h6>
                                <ul class="list-unstyled brand-list">
                                    <li>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="productBrand1" />
                                            <label class="form-check-label" for="productBrand1">Insignia™</label>
                                        </div>
                                        <span>746</span>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="productBrand2" checked />
                                            <label class="form-check-label" for="productBrand2">Samsung</label>
                                        </div>
                                        <span>633</span>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="productBrand3" />
                                            <label class="form-check-label" for="productBrand3">Metra</label>
                                        </div>
                                        <span>591</span>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="productBrand4" />
                                            <label class="form-check-label" for="productBrand4">HP</label>
                                        </div>
                                        <span>530</span>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="productBrand5" checked />
                                            <label class="form-check-label" for="productBrand5">Apple</label>
                                        </div>
                                        <span>442</span>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="productBrand6" />
                                            <label class="form-check-label" for="productBrand6">GE</label>
                                        </div>
                                        <span>394</span>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="productBrand7" />
                                            <label class="form-check-label" for="productBrand7">Sony</label>
                                        </div>
                                        <span>350</span>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="productBrand8" />
                                            <label class="form-check-label" for="productBrand8">Incipio</label>
                                        </div>
                                        <span>320</span>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="productBrand9" />
                                            <label class="form-check-label" for="productBrand9">KitchenAid</label>
                                        </div>
                                        <span>318</span>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="productBrand10" />
                                            <label class="form-check-label" for="productBrand10">Whirlpool</label>
                                        </div>
                                        <span>298</span>
                                    </li>
                                </ul>
                            </div>
                            <!-- Brand ends -->

                            <!-- Rating starts -->
                            <div id="ratings">
                                <h6 class="filter-title">Ratings</h6>
                                <div class="ratings-list">
                                    <a href="#">
                                        <ul class="unstyled-list list-inline">
                                            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                            <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
                                            <li>& up</li>
                                        </ul>
                                    </a>
                                    <div class="stars-received">160</div>
                                </div>
                                <div class="ratings-list">
                                    <a href="#">
                                        <ul class="unstyled-list list-inline">
                                            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                            <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
                                            <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
                                            <li>& up</li>
                                        </ul>
                                    </a>
                                    <div class="stars-received">176</div>
                                </div>
                                <div class="ratings-list">
                                    <a href="#">
                                        <ul class="unstyled-list list-inline">
                                            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                            <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
                                            <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
                                            <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
                                            <li>& up</li>
                                        </ul>
                                    </a>
                                    <div class="stars-received">291</div>
                                </div>
                                <div class="ratings-list">
                                    <a href="#">
                                        <ul class="unstyled-list list-inline">
                                            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                            <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
                                            <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
                                            <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
                                            <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
                                            <li>& up</li>
                                        </ul>
                                    </a>
                                    <div class="stars-received">190</div>
                                </div>
                            </div>
                            <!-- Rating ends -->

                            <!-- Clear Filters Starts -->
                            <div id="clear-filters">
                                <button type="button" class="btn w-100 btn-primary">Clear All Filters</button>
                            </div>
                            <!-- Clear Filters Ends -->
                        </div>
                    </div>
                </div>
                <!-- Ecommerce Sidebar Ends -->

            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')


<script src="../../../app-assets/vendors/js/extensions/wNumb.min.js"></script>
<script src="../../../app-assets/vendors/js/extensions/nouislider.min.js"></script>
<script src="../../../app-assets/vendors/js/extensions/toastr.min.js"></script>





@endsection

