@extends('client_layout.client')

@section('title','Checkout')

@section('style')

    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/wizard/bs-stepper.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/app-ecommerce.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/pickers/form-pickadate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/form-wizard.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/extensions/ext-component-toastr.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/form-number-input.css')}}">

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
                        <h2 class="content-header-title float-start mb-0">Product In Store</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('client.client')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('client.product.index')}}">Products</a>
                                </li>

                                <li class="breadcrumb-item active">Product In Store
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="content-body">
            <div class="bs-stepper checkout-tab-steps">
                <!-- Wizard starts -->
                <div class="bs-stepper-header">
                    <div class="step" data-target="#step-cart" role="tab" id="step-cart-trigger">
                        <button type="button" class="step-trigger">
                            <span class="bs-stepper-box">
                                <i data-feather="shopping-cart" class="font-medium-3"></i>
                            </span>
                            <span class="bs-stepper-label">
                                <span class="bs-stepper-title">Product on store</span>
                                <span class="bs-stepper-subtitle">Your List Items</span>
                            </span>
                        </button>
                    </div>
                </div>

                @include('client.alerts.errors')
                @include('client.alerts.success')

                <div class="bs-stepper-content">

                    <div id="step-cart" class="content" role="tabpanel" aria-labelledby="step-cart-trigger">
                        <div id="place-order" class="list-view product-checkout">
                            <!-- Checkout Place Order Left starts -->
                            <div class="checkout-items">
                                @if ($products && count($products)>0)
                                    @foreach ($products as $product)
                                        <div class="card ecommerce-card">
                                            <div class="item-img">
                                                <a href="{{route('client.product.details',$product->slug)}}">
                                                    <img src="{{$product -> images[0] -> photo ?? ''}}" alt="img-placeholder" />
                                                </a>
                                            </div>
                                            <div class="card-body">
                                                <div class="item-name">
                                                    <h6 class="mb-0"><a href="{{route('client.product.details',$product->slug)}}" class="text-body">{{$product->name}}</a></h6>

                                                    <div class="item-rating">
                                                        <ul class="unstyled-list list-inline">
                                                            @if ($product->reviews_avg_rating != '')
                                                                @for ($i = 0; $i < 5; $i++)
                                                                    <li class="ratings-list-item"><i data-feather="star" class="{{ round($product->reviews_avg_rating) <= $i ? 'unfilled-star' : 'filled-star' }} "></i></li>
                                                                @endfor
                                                            @else
                                                                <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                                                <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                                                <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                                                <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                                                <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </div>

                                                <p class="card-text">  @if ($product->in_stock == 0)
                                                    <span class="text-warning"> {{ $product->getStock() }} </span></p>
                                                @else
                                                <span class="text-success"> {{ $product->getStock() }} </span></p>
                                                @endif

                                            </div>
                                            <div class="item-options text-center">
                                                <div class="item-wrapper">
                                                    <div class="item-cost">
                                                        <h4 class="item-price">{{$product->default_price}}$</h4>
                                                        <p class="card-text shipping">
                                                            {{-- <span class="badge rounded-pill badge-light-success">Free Shipping</span> --}}
                                                        </p>
                                                    </div>
                                                </div>
                                                <a href="{{route('client.product.removefromstore',$product->id)}}" class="btn btn-light mt-1 remove-wishlist">
                                                    <i data-feather="x" class="align-middle me-25"></i>
                                                    <span>Remove</span>
                                                </a>

                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('scripts')

<script src="{{asset('app-assets/vendors/js/forms/wizard/bs-stepper.min.js')}}"></script>

<script src="{{asset('app-assets/js/scripts/pages/app-ecommerce-checkout.js')}}"></script>
@endsection
