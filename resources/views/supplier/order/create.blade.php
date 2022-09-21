@extends('client_layout.client')

@section('title', 'Create Order')

@section('style')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/select/select2.min.css')}}">

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
                        <h2 class="content-header-title float-start mb-0">Orders</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('client.client')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('client.order.order')}}">Orders</a>
                                </li>
                                <li class="breadcrumb-item active">Add
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
            <section class="form-control-repeater">
                <div class="row">
                    <!-- Invoice repeater -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Order</h4>
                            </div>
                            <div class="card-body">
                                @include('client.alerts.errors')
                                @include('client.alerts.success')
                                <form action="{{route('client.order.store')}}" method="POST" class="invoice-repeater">
                                    @csrf
                                    <div data-repeater-list="products">
                                        <div data-repeater-item>
                                            <div class="row d-flex align-items-end">
                                                <div class="col-md-2 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="itemname">Product Name</label>
                                                        <input type="text" class="form-control" id="itemname" aria-describedby="itemname" placeholder="Product Name" name="product_name" required/>
                                                    </div>
                                                    @error("product_name")
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="col-md-2 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="itemcost">Price</label>
                                                        <input type="number" name="price" class="form-control" id="itemcost" aria-describedby="itemcost" placeholder="32" required />
                                                    </div>
                                                    @error("price")
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="col-md-2 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="itemquantity">Quantity</label>
                                                        <input type="number" name="qty" min="1" class="form-control" id="itemquantity" aria-describedby="itemquantity" placeholder="1" required />
                                                    </div>
                                                    @error("qty")
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                {{-- <div class="col-md-2 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="staticprice">Options</label>
                                                        <input type="text"  class="form-control-plaintext" id="staticprice" value="$32" />
                                                    </div>
                                                </div> --}}

                                                <div class="col-md-2 col-12 mb-50">
                                                    <div class="mb-1">
                                                        <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button">
                                                            <i data-feather="x" class="me-25"></i>
                                                            <span>Delete</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
                                                <i data-feather="plus" class="me-25"></i>
                                                <span>Add New</span>
                                            </button>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">First Name</label>
                                                <input type="text" id="first-name-column" class="form-control" placeholder="First Name" name="first_name" required />
                                            </div>
                                            @error("first_name")
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="last-name-column">Last Name</label>
                                                <input type="text" id="last-name-column" class="form-control" placeholder="Last Name" name="last_name" required/>
                                            </div>
                                            @error("last_name")
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="company-column">Phone Mobile</label>
                                                <input type="text" id="company-column" class="form-control" name="phone_mobile" placeholder="+*** *** *** ** **" required/>
                                            </div>
                                            @error("phone_mobile")
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="email-id-column">Email</label>
                                                <input type="email" id="email-id-column" class="form-control" name="email" placeholder="Email" />
                                            </div>
                                            @error("email")
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="city-column">City</label>
                                                <input type="text" id="city-column" class="form-control" placeholder="City" name="city" required/>
                                            </div>
                                            @error("city")
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="country-floating">Country</label>
                                                <input type="text" id="country-floating" class="form-control" name="country" placeholder="Country" required/>
                                            </div>
                                            @error("country")
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="city-column">Postal Code</label>
                                                <input type="number" id="city-column" class="form-control" placeholder="Postal Code" maxlength="6" name="postal_code" />
                                            </div>
                                            @error("postal_code")
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="country-floating">Address</label>
                                                <input type="text" id="country-floating" class="form-control" name="address" placeholder="Address" required/>
                                            </div>
                                            @error("address")
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="country-floating">Address Type</label>
                                                <select name="type" class="select2 form-select" id="select2-basic">
                                                    <option value="shipping">Shipping</option>
                                                    <option value="billing">Billing</option>
                                                </select>
                                            </div>
                                            @error("type")
                                                <span class="text-danger">{{$message}}</span>
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
                    <!-- /Invoice repeater -->
                </div>
            </section>

        </div>
    </div>
</div>
@endsection




@section('scripts')

    {{-- <script src="{{asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/forms/form-select2.js')}}"></script> --}}
    <script src="{{asset('app-assets/vendors/js/forms/repeater/jquery.repeater.min.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/forms/form-repeater.js')}}"></script>
@endsection
