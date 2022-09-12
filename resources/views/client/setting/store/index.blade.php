@extends('client_layout.client')

@section('title', 'Store Settings')

@section('style')


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
                        <h2 class="content-header-title float-start mb-0">Store Settings</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('client.client')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#"> Settings </a>
                                </li>
                                <li class="breadcrumb-item active"> Store Settings
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
            <div class="row">
                <div class="col-12">
                    <ul class="nav nav-pills mb-2">
                        <!-- account -->
                        <li class="nav-item">
                            <a class="nav-link " href="{{route('client.setting.profile')}}">
                                <i data-feather="user" class="font-medium-3 me-50"></i>
                                <span class="fw-bold">Account</span>
                            </a>
                        </li>
                        <!-- security -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('client.settings.account.security')}}">
                                <i data-feather="lock" class="font-medium-3 me-50"></i>
                                <span class="fw-bold">Security</span>
                            </a>
                        </li>
                        <!-- billing and plans -->
                        <li class="nav-item">
                            <a class="nav-link " href="{{route('client.setting.subscription')}}">
                                <i data-feather="bookmark" class="font-medium-3 me-50"></i>
                                <span class="fw-bold">Subscription</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <i data-feather="shopping-bag" class="font-medium-3 me-50"></i>
                                <span class="fw-bold">Store Setting</span>
                            </a>
                        </li>

                        <!-- notification -->

                        <!-- connection -->

                    </ul>

                    <!-- profile -->
                    @include('client.alerts.errors')
                    @include('client.alerts.success')
                    <div class="row">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h4 class="card-title">Store Details</h4>
                            </div>
                            <div class="card-body py-2 my-25">
                                <!-- header section -->
                                <div class="d-flex">
                                <form class="validate-form mt-2 pt-50" action="{{route('client.setting.store.create')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <a href="#" class="me-25">
                                        <img src="{{asset('assets/images/logo/store.png')}}" id="account-upload-img" class="uploadedAvatar rounded me-50" alt="profile image" height="100" width="100" />
                                    </a>
                                    <!-- upload and reset button -->
                                    <div class="d-flex align-items-end mt-75 ms-1">
                                        <div>
                                            <label for="account-upload" class="btn btn-sm btn-primary mb-75 me-75">Upload</label>
                                            <input type="file" name="store_logo" id="account-upload" hidden accept="image/*" />
                                            @error('store_logo')
                                            <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!--/ upload and reset button -->
                                </div>
                                <!--/ header section -->

                                <!-- form -->

                                    <div class="row">
                                        <div class="col-12 col-sm-6 mb-1">
                                            <label class="form-label" for="store_name">Store Name</label>
                                            <input type="text" class="form-control" id="store_name" name="store_name" placeholder="Store Name" value="{{old('store_name')}}"  />
                                            @error('store_name')
                                            <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-sm-6 mb-1">
                                            <label class="form-label" for="store_email">Store Email</label>
                                            <input type="email" class="form-control" id="store_email" name="store_email" placeholder="store_email@store_email.com" value="{{old('store_email')}}" />
                                            @error('store_email')
                                            <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-sm-6 mb-1">
                                            <label class="form-label" for="store_mobile">Store Mobile</label>
                                            <input type="text" class="form-control account-number-mask" id="store_mobile" name="store_mobile" placeholder="05385014651" value="{{old('store_mobile')}}" />
                                            @error('store_mobile')
                                            <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-sm-6 mb-1">
                                            <label class="form-label" for="accountState">Country</label>
                                            <input type="text" class="form-control" id="accountState" name="country" placeholder="Country" value="{{old('country')}}" />
                                            @error('country')
                                            <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-sm-6 mb-1">
                                            <label class="form-label" for="accountState">State</label>
                                            <input type="text" class="form-control" id="accountState" name="state" placeholder="State" value="{{old('state')}}"/>
                                            @error('state')
                                            <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-sm-6 mb-1">
                                            <label class="form-label" for="accountState">City</label>
                                            <input type="text" class="form-control" id="accountState" name="city" placeholder="City" value="{{old('city')}}"/>
                                            @error('city')
                                            <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-sm-6 mb-1">
                                            <label class="form-label" for="accountZipCode">Pin Code</label>
                                            <input type="text" class="form-control account-zip-code" id="accountZipCode" name="pincode" placeholder="Code" maxlength="6" value="{{old('pincode')}}"/>
                                            @error('pincode')
                                            <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-sm-6 mb-1">
                                            <label class="form-label" for="accountAddress">Address</label>
                                            <input type="text" class="form-control" id="accountAddress" name="address" placeholder="Your Address" value="{{old('address')}}"/>
                                            @error('address')
                                            <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary mt-1 me-1">Save changes</button>
                                            <button type="reset" class="btn btn-outline-secondary mt-1">Discard</button>
                                        </div>
                                    </div>
                                </form>
                                <!--/ form -->
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h4 class="card-title">Default Store</h4>
                            </div>
                            <form action="{{route('client.setting.store.defaultstore')}}" method="POST">
                                @csrf
                                <div class="card-body pt-2">
                                    <p>Chose default store</p>

                                    <!-- Connections -->
                                    @foreach ($stores as $store)
                                        <div class="d-flex mt-2">
                                            <div class="flex-shrink-0">
                                                <img src="{{asset('assets/images/clients/'.$store->store_logo)}}" alt="" class="me-1" height="38" width="38" />
                                            </div>
                                            <div class="d-flex align-item-center justify-content-between flex-grow-1">
                                                <div class="me-1">
                                                    <p class="fw-bolder mb-0">{{$store->store_name}}</p>
                                                    <span>Calendar and contacts</span>
                                                </div>
                                                <div class="mt-50 mt-sm-0">
                                                    <div class="form-check form-switch form-check-primary">
                                                        <input type="checkbox" name="default[]" value="{{$store->id}}" class="form-check-input" id="checkbox{{$store->id}}" @if ($store->default == 1) checked @endif />
                                                        <label class="form-check-label" for="checkboxGoogle" >
                                                            <span class="switch-icon-left"><i data-feather="check"></i></span>
                                                            <span class="switch-icon-right"><i data-feather="x"></i></span>
                                                        </label>
                                                    </div>
                                                    @error('default')
                                                    <span class="text-danger"> {{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mt-1 me-1">Save changes</button>
                                        <button type="reset" class="btn btn-outline-secondary mt-1">Discard</button>
                                    </div>
                                    <!-- /Connections -->
                                </div>
                            </form>
                        </div>
                    </div>



                </div>
            </div>

        </div>
    </div>
</div>




@endsection




@section('scripts')


@endsection
