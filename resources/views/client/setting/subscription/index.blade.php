@extends('client_layout.client')

@section('title', 'Subscription')

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
                        <h2 class="content-header-title float-start mb-0">Subscription</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('client.client')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#"> Settings </a>
                                </li>
                                <li class="breadcrumb-item active"> Subscription
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
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <i data-feather="bookmark" class="font-medium-3 me-50"></i>
                                <span class="fw-bold">Subscription</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " href="{{route('client.setting.store')}}">
                                <i data-feather="shopping-bag" class="font-medium-3 me-50"></i>
                                <span class="fw-bold">Store Setting</span>
                            </a>
                        </li>
                        <!-- billing and plans -->

                        <!-- notification -->

                        <!-- connection -->

                    </ul>

                    <!-- profile -->
                    @include('client.alerts.errors')
                    @include('client.alerts.success')
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Current plan</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-2 pb-50">
                                        <h5>Your Current Plan is <strong>{{$plan->name}}</strong></h5>
                                        <span></span>
                                    </div>
                                    <div class="mb-2 pb-50">
                                        <h5>Active until {{$subscription->ended_date}}</h5>
                                        <span>We will send you a notification upon Subscription expiration</span>
                                    </div>
                                    <div class="mb-2 mb-md-1">
                                        <h5>{{$popular->priceM}}$ Per Month <span class="badge badge-light-primary ms-50">Popular</span></h5>
                                        <span>{{$popular->name}}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="alert alert-warning mb-2" role="alert">
                                        <h6 class="alert-heading">We need your attention!</h6>
                                        <div class="alert-body fw-normal">your plan requires update</div>
                                    </div>
                                    <div class="plan-statistics pt-1">
                                        <div class="d-flex justify-content-between">
                                            <h5 class="fw-bolder">Days</h5>
                                            <h5 class="fw-bolder">4 of 30 Days</h5>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar w-75" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="mt-50">4 days remaining until your plan requires update</p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <a href="{{route('client.setting.subscription.upgrade',$subscription->id)}}" class="btn btn-primary me-1 mt-1" > Upgrade Plan </a>
                                    <a href="{{route('client.setting.subscription.cancel',$subscription->id)}}" class="btn btn-outline-danger cancel-subscription mt-1">Cancel Subscription</a>
                                </div>
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

@endsection
