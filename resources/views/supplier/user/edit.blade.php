@extends('supplier_layout.supplier')

@section('title', 'Edit User')

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
                        <h2 class="content-header-title float-start mb-0">User</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('supplier.supplier')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('supplier.user.index')}}">Users</a>
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
                                @include('supplier.alerts.errors')
                                @include('supplier.alerts.success')
                                <form class="form" action="" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">First Name</label>
                                                <input type="text" id="first-name-column" class="form-control" placeholder="First Name" name="first_name" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="last-name-column">Last Name</label>
                                                <input type="text" id="last-name-column" class="form-control" placeholder="Last Name" name="last_name" />
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="email-id-column">Email</label>
                                                <input type="email" id="email-id-column" class="form-control" name="email" placeholder="Email" />
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="company-column">Password</label>
                                                <input type="password" id="password-column" class="form-control" name="password" placeholder="Password" />
                                            </div>
                                        </div>


                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="country-floating">Role</label>
                                                <select name="role" id="default-select-multi" multiple="multiple"  class="select2 form-select">
                                                    <option value=""></option>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="reset" class="btn btn-primary me-1">Submit</button>
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
