@extends('supplier_layout.supplier')

@section('title', 'View Complaint')

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
                        <h2 class="content-header-title float-start mb-0">Complaint</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('supplier.supplier')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('supplier.complaint.index')}}"> Complaints</a>
                                </li>
                                <li class="breadcrumb-item active"> View
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
            <div class="row">
                <div class="col-12">
                    <ul class="nav nav-pills mb-2">
                        <!-- account -->

                        <!-- security -->

                        <!-- billing and plans -->


                        <!-- connection -->

                        <!-- notification -->

                    </ul>

                    <!-- profile -->
                    <div class="card">
                        <div class="card-header border-bottom">
                            <h4 class="card-title">Complaint Details</h4>
                        </div>
                        <div class="card-body py-2 my-25">
                            <!-- header section -->

                            <!--/ header section -->

                            <!-- form -->
                            <form class="validate-form mt-2 pt-50">
                                <div class="row">
                                    <div class="col-12 col-sm-6 mb-1">
                                        <h5> Title : </h5>
                                        <span> {{$complaint->title}}</span>
                                    </div>
                                    <div class="col-12 col-sm-6 mb-1">
                                        <h5> Body  : </h5>
                                        <span> {{$complaint->body}}</span>
                                    </div>
                                    <div class="col-12 col-sm-6 mb-1">
                                        <h5> Product Name : </h5>
                                        <span> {{$complaint->product->name}}</span>
                                    </div>
                                </div>
                            </form>
                            <!--/ form -->
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
