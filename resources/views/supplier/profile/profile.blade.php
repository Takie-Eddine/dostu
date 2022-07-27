@extends('supplier_layout.supplier')

@section('style')

    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/wizard/bs-stepper.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/select/select2.min.css')}}">




    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/form-validation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/form-wizard.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
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
                        <h2 class="content-header-title float-start mb-0">Profile</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('supplier.supplier')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Profile</a>
                                </li>

                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                <div class="mb-1 breadcrumb-right">
                    <div class="dropdown">
                        <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="grid"></i></button>
                        <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="app-todo.html"><i class="me-1" data-feather="check-square"></i><span class="align-middle">Todo</span></a><a class="dropdown-item" href="app-chat.html"><i class="me-1" data-feather="message-square"></i><span class="align-middle">Chat</span></a><a class="dropdown-item" href="app-email.html"><i class="me-1" data-feather="mail"></i><span class="align-middle">Email</span></a><a class="dropdown-item" href="app-calendar.html"><i class="me-1" data-feather="calendar"></i><span class="align-middle">Calendar</span></a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            @include('supplier.alerts.errors')
            @include('supplier.alerts.success')

            <!-- Modern Horizontal Wizard -->

            @foreach ($data as $item)



            <form action="{{route('supplier.profile.create')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <section class="modern-horizontal-wizard">
                <div class="bs-stepper wizard-modern modern-wizard-example">
                    <div class="bs-stepper-header">
                        <div class="step" data-target="#account-details-modern" role="tab" id="account-details-modern-trigger">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">
                                    <i data-feather="file-text" class="font-medium-3"></i>
                                </span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Company Details</span>
                                    <span class="bs-stepper-subtitle">Setup Company Details</span>
                                </span>
                            </button>
                        </div>


                        <div class="line">
                            <i data-feather="chevron-right" class="font-medium-2"></i>
                        </div>
                        <div class="step" data-target="#address-step-modern" role="tab" id="address-step-modern-trigger">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">
                                    <i data-feather="map-pin" class="font-medium-3"></i>
                                </span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Address</span>
                                    <span class="bs-stepper-subtitle">Add Address</span>
                                </span>
                            </button>
                        </div>
                        <div class="line">
                            <i data-feather="chevron-right" class="font-medium-2"></i>
                        </div>
                        <div class="step" data-target="#social-links-modern" role="tab" id="social-links-modern-trigger">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">
                                    <i data-feather="link" class="font-medium-3"></i>
                                </span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Social Links</span>
                                    <span class="bs-stepper-subtitle">Add Social Links</span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="bs-stepper-content">
                        <div id="account-details-modern" class="content" role="tabpanel" aria-labelledby="account-details-modern-trigger">
                            <div class="content-header">
                                <h5 class="mb-0">Company Details</h5>
                                <small class="text-muted">Enter Your Company Details.</small>
                            </div>
                            <div class="row">
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="company_name">Company Name</label>
                                    <input type="text" id="company_name" name="company_name" value="{{$item->company_name}}" class="form-control" placeholder="company_name" />
                                    @error('company_name')
                                    <span class="text-danger"> {{$message}}</span>
                                    @enderror
                                </div>

                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="modern-email">Email</label>
                                    <input type="email" id="modern-email" name="email" value="{{$item->email}}" class="form-control" placeholder="company_name@email.com" aria-label="john.doe" />
                                    @error('email')
                                    <span class="text-danger"> {{$message}}</span>
                                    @enderror
                                </div>

                            </div>
                            <div class="row">
                                <div class="mb-1 form-password-toggle col-md-6">
                                    <label class="form-label" for="description">Description</label>
                                    <input type="text" id="description" name="description" value="{{$item->description}}" class="form-control" placeholder="description" />
                                    @error('description')
                                    <span class="text-danger"> {{$message}}</span>
                                    @enderror
                                </div>

                                <div class="mb-1 form-password-toggle col-md-6">
                                    <label class="form-label" for="mobile">Mobile</label>
                                    <input type="tel" id="mobile" name="mobile" value="{{$item->mobile}}" class="form-control" placeholder="+905362013698" />
                                    @error('mobile')
                                    <span class="text-danger"> {{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-1 form-password-toggle col-md-6">
                                    <label class="form-label" for="website">WebSite</label>
                                    <input type="text" id="website" name="website" value="{{$item->website}}" class="form-control" placeholder="www.exemple.com" />
                                    @error('website')
                                    <span class="text-danger"> {{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-1 form-password-toggle col-md-6">
                                    <label class="form-label" for="logo">Logo</label>
                                    <input type="file" id="logo" name="logo" value="{{$item->logo}}" class="form-control" placeholder="upload image" />
                                    @error('logo')
                                    <span class="text-danger"> {{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-outline-secondary btn-prev" disabled>
                                    <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                </button>
                                <button type="button" class="btn btn-primary btn-next">
                                    <span class="align-middle d-sm-inline-block d-none">Next</span>
                                    <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                </button>
                            </div>
                        </div>

                        <div id="address-step-modern" class="content" role="tabpanel" aria-labelledby="address-step-modern-trigger">
                            <div class="content-header">
                                <h5 class="mb-0">Address</h5>
                                <small>Enter Your Address.</small>
                            </div>
                            <div class="row">
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="country">Country</label>
                                    <input type="text" id="country" value="{{$item->country}}" name="country" class="form-control" placeholder="Turkey" />
                                    {{-- <select class="form-select">
                                        <optgroup label="choose country">
                                        @foreach ($countries as $country)
                                            <option value="{{ $country-> id}}" >{{$country->name}}</option>
                                        @endforeach
                                    </optgroup>
                                    </select> --}}
                                    @error('country')
                                    <span class="text-danger"> {{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="city">City</label>
                                    <input type="text" id="city" name="city" value="{{$item->city}}" class="form-control" placeholder="Istanbul" />
                                    @error('city')
                                    <span class="text-danger"> {{$message}}</span>
                                    @enderror
                                </div>

                            </div>
                            <div class="row">
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="state">District</label>
                                    <input type="text" id="state" name="state" value="{{$item->state}}" class="form-control" placeholder="Fatih" />
                                    @error('state')
                                    <span class="text-danger"> {{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="pincode">Pincode</label>
                                    <input type="text" id="pincode" name="pincode" value="{{$item->pincode}}" class="form-control" placeholder="658921" />
                                    @error('pincode')
                                    <span class="text-danger"> {{$message}}</span>
                                    @enderror
                                </div>

                            </div>
                            <div class="row">
                                <div class="mb-1 col-md-12">
                                    <label class="form-label" for="address">Address</label>
                                    <input type="text" id="address" name="address" value="{{$item->address}}" class="form-control" placeholder="98  Borough bridge Road, Birmingham" />
                                    @error('address')
                                    <span class="text-danger"> {{$message}}</span>
                                    @enderror
                                </div>

                            </div>

                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-primary btn-prev">
                                    <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                </button>
                                <button type="button" class="btn btn-primary btn-next">
                                    <span class="align-middle d-sm-inline-block d-none">Next</span>
                                    <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                </button>
                            </div>
                        </div>
                        <div id="social-links-modern" class="content" role="tabpanel" aria-labelledby="social-links-modern-trigger">
                            <div class="content-header">
                                <h5 class="mb-0">Social Links</h5>
                                <small>Enter Your Social Links.</small>
                            </div>
                            <div class="row">
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="twitter">Twitter</label>
                                    <input type="text" id="twitter" name="twitter" value="{{$item->twitter}}" class="form-control" placeholder="https://twitter.com/abc" />
                                    @error('twitter')
                                    <span class="text-danger"> {{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="facebook">Facebook</label>
                                    <input type="text" id="facebook" name="facebook" value="{{$item->facebook}}" class="form-control" placeholder="https://facebook.com/abc" />
                                    @error('facebook')
                                    <span class="text-danger"> {{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="youtube">Youtube</label>
                                    <input type="text" id="youtube" name="youtube" value="{{$item->youtube}}" class="form-control" placeholder="https://youtube.com/abc" />
                                    @error('youtube')
                                    <span class="text-danger"> {{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="linkedin">Linkedin</label>
                                    <input type="text" id="linkedin" name="linkedin" value="{{$item->linkedin}}" class="form-control" placeholder="https://linkedin.com/abc" />
                                    @error('linkedin')
                                    <span class="text-danger"> {{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="instagram">Instagram</label>
                                    <input type="text" id="instagram" name="instagram" value="{{$item->instagram}}" class="form-control" placeholder="https://instagram.com/abc" />
                                    @error('instagram')
                                    <span class="text-danger"> {{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="telegram">Telegram</label>
                                    <input type="text" id="telegram" name="telegram" value="{{$item->telegram}}" class="form-control" placeholder="https://telegram.com/abc" />
                                    @error('telegram')
                                    <span class="text-danger"> {{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">

                                @if ($data->count()>0)
                                <button type="button" class="btn btn-primary btn-prev">
                                    <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                </button>
                                {{-- <button type="submit" class="btn btn-success btn-submit" disabled>Submit</button> --}}
                                <a href=" {{route('supplier.profile.update')}}" class="btn btn-success btn-submit"><i data-feather='save'></i></a>
                                @else
                                <button type="button" class="btn btn-primary btn-prev">
                                    <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                </button>
                                <button type="submit" class="btn btn-success btn-submit">Submit</button>

                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            </form>
            @endforeach
            <!-- /Modern Horizontal Wizard -->



        </div>
    </div>
</div>
@endsection


@section('scripts')
<script src="{{asset('app-assets/vendors/js/vendors.min.js')}}"></script>

    <script src="{{asset('app-assets/vendors/js/forms/wizard/bs-stepper.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>

    <script src="{{asset('app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{asset('app-assets/js/core/app.js')}}"></script>

    <script src="{{asset('app-assets/js/scripts/forms/form-wizard.js')}}"></script>


    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
@endsection

