@extends('client_layout.client')

@section('title', 'Upgrade')

@section('style')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/page-pricing.css')}}">
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
                        <h2 class="content-header-title float-start mb-0">Subscription </h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('client.client')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('client.setting.subscription')}}">Subscription</a>
                                </li>
                                <li class="breadcrumb-item active">Upgrade
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">

            </div>
    </div>

        <div class="content-header row">
        </div>
        <div class="content-body">
            <section id="pricing-plan">
                <!-- title text and switch button -->
                <div class="text-center">
                    <h1 class="mt-5">Pricing Plans</h1>
                    <p class="mb-2 pb-75">
                        {{-- All plans include 40+ advanced tools and features to boost your product. Choose the best plan to fit your needs. --}}
                    </p>
                    <div class="d-flex align-items-center justify-content-center mb-5 pb-50">
                        <h6 class="me-1 mb-0">Monthly</h6>
                    </div>
                </div>
                <!--/ title text and switch button -->

                <!-- pricing plan cards -->
                @include('client.alerts.errors')
                @include('client.alerts.success')
                <div class="row pricing-card">
                    <div class="col-12 col-sm-offset-2 col-sm-10 col-md-12 col-lg-offset-2 col-lg-10 mx-auto">
                        <div class="row">
                            <!-- standard plan -->
                            @foreach ($plansmonth as $item)
                                <div class="col-12 col-md-3">
                                    <div class="card standard-pricing popular text-center">
                                        <div class="card-body">
                                            <div class="pricing-badge text-end">
                                                @if ($item->popular ==1)
                                                    <span class="badge rounded-pill badge-light-primary">Popular</span>
                                                @endif
                                            </div>
                                            <img src="{{asset('app-assets/images/illustration/Pot2.svg')}}" class="mb-1" alt="svg img" />
                                            <h3>{{$item->name}}</h3>
                                            <p class="card-text">For small to medium businesses</p>
                                            <div class="annual-plan">
                                                <div class="plan-price mt-2">
                                                    <sup class="font-medium-1 fw-bold text-primary">$</sup>
                                                    <span class="pricing-standard-value fw-bolder text-primary">{{$item->priceM}}</span>
                                                    <sub class="pricing-duration text-body font-medium-1 fw-bold">/month</sub>
                                                </div>
                                                <small class="annual-pricing d-none text-muted"></small>
                                            </div>
                                            <ul class="list-group list-group-circle text-start">
                                                {{$item->description}}
                                            </ul>
                                            @if ($subscriptions->plan_id == $item->id)
                                                <button class="btn w-100 btn-success mt-2">Curent Plan</button>
                                            @else
                                                <a href="{{route('client.setting.subscription.update',$item->id)}}" class="btn w-100 btn-primary mt-2">Upgrade</a>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <!--/ standard plan -->
                        </div>
                    </div>
                </div>


                <div class="d-flex align-items-center justify-content-center mb-5 pb-50">
                    <h6 class="me-1 mb-0">Annually</h6>
                </div>

                <div class="row pricing-card">
                    <div class="col-12 col-sm-offset-2 col-sm-10 col-md-12 col-lg-offset-2 col-lg-10 mx-auto">
                        <div class="row">
                            <!-- standard plan -->
                            @foreach ($plansanual as $item)
                                <div class="col-12 col-md-3">
                                    <div class="card standard-pricing popular text-center">
                                        <div class="card-body">
                                            <div class="pricing-badge text-end">
                                                @if ($item->popular ==1)
                                                    <span class="badge rounded-pill badge-light-primary">Popular</span>
                                                @endif
                                            </div>
                                            <img src="{{asset('app-assets/images/illustration/Pot2.svg')}}" class="mb-1" alt="svg img" />
                                            <h3>{{$item->name}}</h3>
                                            <p class="card-text">For small to medium businesses</p>
                                            <div class="annual-plan">
                                                <div class="plan-price mt-2">
                                                    <sup class="font-medium-1 fw-bold text-primary">$</sup>
                                                    <span class="pricing-standard-value fw-bolder text-primary">{{$item->priceA}}</span>
                                                    <sub class="pricing-duration text-body font-medium-1 fw-bold">/year</sub>
                                                </div>
                                                <small class="annual-pricing d-none text-muted"></small>
                                            </div>
                                            <ul class="list-group list-group-circle text-start">
                                                {{$item->description}}
                                            </ul>
                                            @if ($subscriptions->plan_id == $item->id)
                                                <button class="btn w-100 btn-success mt-2">Curent Plan</button>
                                            @else
                                                <a href="{{route('client.setting.subscription.update',$item->id)}}" class="btn w-100 btn-primary mt-2">Upgrade</a>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <!--/ standard plan -->
                        </div>
                    </div>
                </div>
                <!--/ pricing plan cards -->



                <!-- pricing faq -->
                <div class="pricing-faq">
                    <h3 class="text-center">FAQ's</h3>
                    <p class="text-center">Let us help answer the most common questions.</p>
                    <div class="row my-2">
                        <div class="col-12 col-lg-10 col-lg-offset-2 mx-auto">
                            <!-- faq collapse -->
                            <div class="accordion accordion-margin" id="accordionExample">
                                <div class="card accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button collapsed" data-bs-toggle="collapse" role="button" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                            Does my subscription automatically renew?
                                        </button>
                                    </h2>

                                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            Pastry pudding cookie toffee bonbon jujubes jujubes powder topping. Jelly beans gummi bears sweet roll
                                            bonbon muffin liquorice. Wafer lollipop sesame snaps. Brownie macaroon cookie muffin cupcake candy
                                            caramels tiramisu. Oat cake chocolate cake sweet jelly-o brownie biscuit marzipan. Jujubes donut
                                            marzipan chocolate bar. Jujubes sugar plum jelly beans tiramisu icing cheesecake.
                                        </div>
                                    </div>
                                </div>
                                <div class="card accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" data-bs-toggle="collapse" role="button" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Can I store the item on an intranet so everyone has access?
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            Tiramisu marshmallow dessert halvah bonbon cake gingerbread. Jelly beans chocolate pie powder. Dessert
                                            pudding chocolate cake bonbon bear claw cotton candy cheesecake. Biscuit fruitcake macaroon carrot cake.
                                            Chocolate cake bear claw muffin chupa chups pudding.
                                        </div>
                                    </div>
                                </div>
                                <div class="card accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" data-bs-toggle="collapse" role="button" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Am I allowed to modify the item that I purchased?
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            Tart gummies dragée lollipop fruitcake pastry oat cake. Cookie jelly jelly macaroon icing jelly beans
                                            soufflé cake sweet. Macaroon sesame snaps cheesecake tart cake sugar plum. Dessert jelly-o sweet muffin
                                            chocolate candy pie tootsie roll marzipan. Carrot cake marshmallow pastry. Bonbon biscuit pastry topping
                                            toffee dessert gummies. Topping apple pie pie croissant cotton candy dessert tiramisu.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ pricing faq -->
            </section>

        </div>
    </div>
</div>

@endsection




@section('scripts')
<script src="{{asset('app-assets/js/scripts/pages/page-pricing.js')}}"></script>

@endsection
