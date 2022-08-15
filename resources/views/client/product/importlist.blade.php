@extends('client_layout.client')

@section('title','Wish List')

@section('style')






    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/app-ecommerce.css')}}">







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
                        <h2 class="content-header-title float-start mb-0">Import List</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('client.client')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('client.product.index')}}">Products</a>
                                </li>
                                <li class="breadcrumb-item active">Import List
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">

            </div>
        </div>
        <div class="content-body">
            <!-- Wishlist Starts -->
            <section id="wishlist" class="grid-view wishlist-items">

                @if ($products -> products  && count($products-> products)>0)
                    @foreach ($products-> products as $product)
                        <div class="card ecommerce-card">
                            <div class="item-img text-center">
                                <a href="{{route('client.product.details',$product->slug)}}">
                                    <img src="{{$product -> images[0] -> photo ?? ''}}" class="img-fluid" alt="img-placeholder" />
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="item-wrapper">
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
                                    <div class="item-cost">
                                        <h6 class="item-price">{{$product -> price}}</h6>
                                    </div>
                                </div>
                                <div class="item-name">
                                    <a href="{{route('client.product.details',$product->slug)}}">{{$product->name}}</a>
                                </div>
                                <p class="card-text item-description">
                                    {{$product->description}}
                                </p>
                            </div>
                            <div class="item-options text-center">
                                <button type="button" class="btn btn-light btn-wishlist remove-wishlist">
                                    <i data-feather="x"></i>
                                    <span>Remove</span>
                                </button>
                                <button type="button" class="btn btn-primary btn-cart move-cart">
                                    <i data-feather="shopping-cart"></i>
                                    <span class="add-to-cart">Move to cart</span>
                                </button>
                            </div>
                        </div>
                    @endforeach
                @endif



            </section>
            <!-- Wishlist Ends -->

        </div>
    </div>
</div>
@endsection

@section('scripts')










<script src="{{asset('app-assets/js/scripts/pages/app-ecommerce-wishlist.js')}}"></script>

@endsection
