@extends('client_layout.client')

@section('title', 'Edit Store')

@section('style')

<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/select/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
@endsection



@section('content')


<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Store</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('client.client')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('client.store.store')}}">Store</a>
                                </li>
                                <li class="breadcrumb-item active"><a>Edit</a>
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
        <div class="content-body">


            <!-- Basic multiple Column Form section start -->
            <section id="multiple-column-form">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">

                            </div>
                            <div class="card-body">
                                @include('client.alerts.errors')
                                @include('client.alerts.success')
                                <form class="form" action="{{route('client.store.update',$store->id)}}" method="POST">

                                    @csrf
                                    <div class="row">
                                        <input type="hidden" name="id" value="{{$store->id}}">
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="store-name-column">Store Name</label>
                                                <input type="text" id="store-name-column" class="form-control" placeholder="Store Name" name="store_name" value="{{$store->store_name}}" />
                                            </div>
                                            @error('store_name')
                                                <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="store-logo-column">Store Logo</label>
                                                <input type="file" id="store-logo-column" class="form-control" placeholder="Store Logo" name="store_logo" value="{{$store->store_logo}}" />
                                            </div>
                                            @error('store_logo')
                                                <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Store Email</label>
                                                <input type="email" id="store-email-column" class="form-control" placeholder="Last Name" name="store_email" value="{{$store->store_email}}" />
                                            </div>
                                                @error('store_email')
                                                    <span class="text-danger"> {{ $message }}</span>
                                                @enderror
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="email-id-column">Store Mobile</label>
                                                <input type="text" id="store-mobile-column" class="form-control" name="store_mobile" placeholder="Store Mobile" value="{{$store->store_mobile}}"/>
                                            </div>
                                            @error('store_mobile')
                                                <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="company-column">Country</label>
                                                <input type="text" id="password-column" class="form-control" value="{{$store->country}}" name="country" placeholder="country" />
                                            </div>
                                            @error('country')
                                                    <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="company-column">State</label>
                                                <input type="text" id="" class="form-control" value="{{$store->state}}" name="state" placeholder="State" />
                                            </div>
                                            @error('state')
                                                    <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="company-column">City</label>
                                                <input type="text" id="" class="form-control" value="{{$store->city}}" name="city" placeholder="city" />
                                            </div>
                                            @error('city')
                                                    <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="company-column">Pin Code</label>
                                                <input type="number" id="" class="form-control" value="{{$store->pincode}}" name="pincode" placeholder="Pin Code" />
                                            </div>
                                            @error('pincode')
                                                    <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="address-column">Address</label>
                                                <input type="text" id="" class="form-control" value="{{$store->address}}" name="address" placeholder="Address" />
                                            </div>
                                            @error('address')
                                                    <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>



                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary me-1">Submit</button>
                                            <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Basic Floating Label Form section end -->

        </div>
    </div>
</div>



@endsection




@section('scripts')
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/form-select2.js') }}"></script>

@endsection
