@extends('supplier_layout.supplier')


@section('title','Dashboard')


@section('style')

@endsection


@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- Dashboard Ecommerce Starts -->
            <section id="dashboard-ecommerce">
                <div class="row match-height">
                    <!-- Medal Card -->
                    <div class="col-xl-4 col-md-6 col-12">
                        <div class="card card-congratulation-medal">
                            <div class="card-body">
                                <h5>Congratulations 🎉 John!</h5>
                                <p class="card-text font-small-3">You have won gold medal</p>
                                <h3 class="mb-75 mt-2 pt-50">
                                    <a href="#">$48.9k</a>
                                </h3>
                                <button type="button" class="btn btn-primary">View Sales</button>
                                <img src="{{asset('app-assets/images/illustration/badge.svg')}}" class="congratulation-medal" alt="Medal Pic" />
                            </div>
                        </div>
                    </div>
                    <!--/ Medal Card -->

                    <!-- Statistics Card -->
                    <div class="col-xl-8 col-md-6 col-12">
                        <div class="card card-statistics">
                            <div class="card-header">
                                <h4 class="card-title">Statistics</h4>
                                <div class="d-flex align-items-center">
                                    <p class="card-text font-small-2 me-25 mb-0">Updated 1 month ago</p>
                                </div>
                            </div>
                            <div class="card-body statistics-body">
                                <div class="row">
                                    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                        <div class="d-flex flex-row">
                                            <div class="avatar bg-light-primary me-2">
                                                <div class="avatar-content">
                                                    <i data-feather="trending-up" class="avatar-icon"></i>
                                                </div>
                                            </div>
                                            <div class="my-auto">
                                                <h4 class="fw-bolder mb-0">230k</h4>
                                                <p class="card-text font-small-3 mb-0">Sales</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                        <div class="d-flex flex-row">
                                            <div class="avatar bg-light-info me-2">
                                                <div class="avatar-content">
                                                    <i data-feather="user" class="avatar-icon"></i>
                                                </div>
                                            </div>
                                            <div class="my-auto">
                                                <h4 class="fw-bolder mb-0">{{$clients->count()}}</h4>
                                                <p class="card-text font-small-3 mb-0">Customers</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                                        <div class="d-flex flex-row">
                                            <div class="avatar bg-light-danger me-2">
                                                <div class="avatar-content">
                                                    <i data-feather="box" class="avatar-icon"></i>
                                                </div>
                                            </div>
                                            <div class="my-auto">
                                                <h4 class="fw-bolder mb-0">{{($products)->count()}}</h4>
                                                <p class="card-text font-small-3 mb-0">Products</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 col-12">
                                        <div class="d-flex flex-row">
                                            <div class="avatar bg-light-success me-2">
                                                <div class="avatar-content">
                                                    <i data-feather="dollar-sign" class="avatar-icon"></i>
                                                </div>
                                            </div>
                                            <div class="my-auto">
                                                <h4 class="fw-bolder mb-0">$9745</h4>
                                                <p class="card-text font-small-3 mb-0">Revenue</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Statistics Card -->
                </div>

                <div class="row match-height">
                    {{-- <div class="col-lg-4 col-12">
                        <div class="row match-height">
                            <!-- Bar Chart - Orders -->
                            <div class="col-lg-6 col-md-3 col-6">
                                <div class="card">
                                    <div class="card-body pb-50">
                                        <h6>Orders</h6>
                                        <h2 class="fw-bolder mb-1">2,76k</h2>
                                        <div id="statistics-order-chart"></div>
                                    </div>
                                </div>
                            </div>
                            <!--/ Bar Chart - Orders -->

                            <!-- Line Chart - Profit -->
                            <div class="col-lg-6 col-md-3 col-6">
                                <div class="card card-tiny-line-stats">
                                    <div class="card-body pb-50">
                                        <h6>Profit</h6>
                                        <h2 class="fw-bolder mb-1">6,24k</h2>
                                        <div id="statistics-profit-chart"></div>
                                    </div>
                                </div>
                            </div>
                            <!--/ Line Chart - Profit -->

                            <!-- Earnings Card -->
                            <div class="col-lg-12 col-md-6 col-12">
                                <div class="card earnings-card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <h4 class="card-title mb-1">Earnings</h4>
                                                <div class="font-small-2">This Month</div>
                                                <h5 class="mb-1">$4055.56</h5>
                                                <p class="card-text text-muted font-small-2">
                                                    <span class="fw-bolder">68.2%</span><span> more earnings than last month.</span>
                                                </p>
                                            </div>
                                            <div class="col-6">
                                                <div id="earnings-chart"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/ Earnings Card -->
                        </div>
                    </div> --}}

                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card card-transaction">
                            <div class="card-header">
                                <h4 class="card-title">Transactions</h4>
                                <div class="dropdown chart-dropdown">
                                    <i data-feather="more-vertical" class="font-medium-3 cursor-pointer" data-bs-toggle="dropdown"></i>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Last 28 Days</a>
                                        <a class="dropdown-item" href="#">Last Month</a>
                                        <a class="dropdown-item" href="#">Last Year</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="transaction-item">
                                    <div class="d-flex">
                                        <div class="avatar bg-light-primary rounded float-start">
                                            <div class="avatar-content">
                                                <i data-feather="pocket" class="avatar-icon font-medium-3"></i>
                                            </div>
                                        </div>
                                        <div class="transaction-percentage">
                                            <h6 class="transaction-title">Wallet</h6>
                                            <small>Starbucks</small>
                                        </div>
                                    </div>
                                    <div class="fw-bolder text-danger">- $74</div>
                                </div>
                                <div class="transaction-item">
                                    <div class="d-flex">
                                        <div class="avatar bg-light-success rounded float-start">
                                            <div class="avatar-content">
                                                <i data-feather="check" class="avatar-icon font-medium-3"></i>
                                            </div>
                                        </div>
                                        <div class="transaction-percentage">
                                            <h6 class="transaction-title">Bank Transfer</h6>
                                            <small>Add Money</small>
                                        </div>
                                    </div>
                                    <div class="fw-bolder text-success">+ $480</div>
                                </div>
                                <div class="transaction-item">
                                    <div class="d-flex">
                                        <div class="avatar bg-light-danger rounded float-start">
                                            <div class="avatar-content">
                                                <i data-feather="dollar-sign" class="avatar-icon font-medium-3"></i>
                                            </div>
                                        </div>
                                        <div class="transaction-percentage">
                                            <h6 class="transaction-title">Paypal</h6>
                                            <small>Add Money</small>
                                        </div>
                                    </div>
                                    <div class="fw-bolder text-success">+ $590</div>
                                </div>
                                <div class="transaction-item">
                                    <div class="d-flex">
                                        <div class="avatar bg-light-warning rounded float-start">
                                            <div class="avatar-content">
                                                <i data-feather="credit-card" class="avatar-icon font-medium-3"></i>
                                            </div>
                                        </div>
                                        <div class="transaction-percentage">
                                            <h6 class="transaction-title">Mastercard</h6>
                                            <small>Ordered Food</small>
                                        </div>
                                    </div>
                                    <div class="fw-bolder text-danger">- $23</div>
                                </div>
                                <div class="transaction-item">
                                    <div class="d-flex">
                                        <div class="avatar bg-light-info rounded float-start">
                                            <div class="avatar-content">
                                                <i data-feather="trending-up" class="avatar-icon font-medium-3"></i>
                                            </div>
                                        </div>
                                        <div class="transaction-percentage">
                                            <h6 class="transaction-title">Transfer</h6>
                                            <small>Refund</small>
                                        </div>
                                    </div>
                                    <div class="fw-bolder text-success">+ $98</div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Revenue Report Card -->
                    <div class="col-lg-8 col-12">
                        <div class="card card-revenue-budget">
                            <div class="row mx-0">
                                <div class="col-md-8 col-12 revenue-report-wrapper">
                                    <div class="d-sm-flex justify-content-between align-items-center mb-3">
                                        <h4 class="card-title mb-50 mb-sm-0">Revenue Report</h4>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-center me-2">
                                                <span class="bullet bullet-primary font-small-3 me-50 cursor-pointer"></span>
                                                <span>Earning</span>
                                            </div>
                                            <div class="d-flex align-items-center ms-75">
                                                <span class="bullet bullet-warning font-small-3 me-50 cursor-pointer"></span>
                                                <span>Expense</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="revenue-report-chart"></div>
                                </div>
                                <div class="col-md-4 col-12 budget-wrapper">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-outline-primary btn-sm dropdown-toggle budget-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            2020
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">2020</a>
                                            <a class="dropdown-item" href="#">2019</a>
                                            <a class="dropdown-item" href="#">2018</a>
                                        </div>
                                    </div>
                                    <h2 class="mb-25">$25,852</h2>
                                    <div class="d-flex justify-content-center">
                                        <span class="fw-bolder me-25">Budget:</span>
                                        <span>56,800</span>
                                    </div>
                                    <div id="budget-chart"></div>
                                    <button type="button" class="btn btn-primary">Increase Budget</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Revenue Report Card -->
                </div>

                <div class="row match-height">


                    <div class="col-lg-4 col-12">
                            <div class="row">
                                <!-- Product Order Card -->
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between">
                                            <h4 class="card-title"><a href="{{route('supplier.product.index')}}">Products</a>  </h4>
                                            <div class="dropdown chart-dropdown">
                                                {{-- <button class="btn btn-sm border-0 dropdown-toggle px-50" type="button" id="dropdownItem2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Last 7 Days
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownItem2">
                                                    <a class="dropdown-item" href="#">Last 28 Days</a>
                                                    <a class="dropdown-item" href="#">Last Month</a>
                                                    <a class="dropdown-item" href="#">Last Year</a>
                                                </div> --}}
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div id="product-order-chart"></div>
                                            <div class="d-flex justify-content-between mb-1">
                                                <div class="d-flex align-items-center">
                                                    <i data-feather="circle" class="font-medium-1 text-primary"></i>
                                                    <span class="fw-bold ms-75">Approved</span>
                                                </div>
                                                <span>{{$product_approved->count()}}</span>
                                            </div>
                                            <div class="d-flex justify-content-between mb-1">
                                                <div class="d-flex align-items-center">
                                                    <i data-feather="circle" class="font-medium-1 text-warning"></i>
                                                    <span class="fw-bold ms-75">Pending</span>
                                                </div>
                                                <span>{{$product_pending->count()}}</span>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <i data-feather="circle" class="font-medium-1 text-danger"></i>
                                                    <span class="fw-bold ms-75">Rejected</span>
                                                </div>
                                                <span>{{$product_rejected->count()}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/ Product Order Card -->
                            </div>
                        </div>


                    <!-- Company Table Card -->
                    <div class="col-lg-8 col-12">
                        <div class="card card-company-table">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Category</th>
                                                <th>Views</th>
                                                <th>Revenue</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($top_products as $item)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar rounded">
                                                                <div class="avatar-content">
                                                                    <img src="{{$item -> images[0] -> photo ?? ''}}" alt="Toolbar svg" height="50" width="50"/>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <div class="fw-bolder">{{$item->name}}</div>
                                                                {{-- <div class="font-small-2 text-muted">meguc@ruj.io</div> --}}
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar bg-light-primary me-1">
                                                                <div class="avatar-content">
                                                                    <img src="{{asset('assets/images/categories/'.$item->photo)}}" alt="Toolbar svg" height="50" width="50"/>
                                                                </div>
                                                            </div>
                                                            <span>{{$item->categories[0]->name ?? '__'}}</span>
                                                        </div>
                                                    </td>
                                                    <td class="text-nowrap">
                                                        <div class="d-flex flex-column">
                                                            <span class="fw-bolder mb-25">{{$item->viewed}}</span>
                                                            {{-- <span class="font-small-2 text-muted">in 24 hours</span> --}}
                                                        </div>
                                                    </td>
                                                    <td>$891.2</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Company Table Card -->

                    <div class="col-lg-8 col-12">
                        <div class="card card-user-timeline">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <a href="{{route('supplier.complaint.index')}}"><i data-feather="list" class="user-timeline-title-icon"></i></a>
                                    <h4 class="card-title"> Complaints</h4>
                                </div>

                            </div>
                            <div class="card-body">
                                <ul class="timeline ms-50">
                                    @foreach ($complaints as $complaint)
                                        <li class="timeline-item">
                                            <span class="timeline-point timeline-point-primary timeline-point-indicator"></span>
                                            <div class="timeline-event">
                                                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                                    <h6>{{$complaint->title}}</h6>

                                                </div>
                                                <p>{{\Illuminate\Support\Str::limit(strip_tags($complaint->body), 50)}}
                                                    @if (strlen(strip_tags($complaint->body)) > 50)
                                                    ... <a href="{{route('supplier.complaint.view',$complaint->id) }}" class="btn btn-info btn-sm">Read More</a>
                                                    @endif
                                                </p>

                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>




                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card card-developer-meetup">
                            <div class="meetup-img-wrapper rounded-top text-center">
                                <img src="../../../app-assets/images/illustration/email.svg" alt="Meeting Pic" height="170" />
                            </div>
                            <div class="card-body">
                                <div class="meetup-header d-flex align-items-center">
                                    <div class="meetup-day">
                                        <h6 class="mb-0">THU</h6>
                                        <h3 class="mb-0">24</h3>
                                    </div>
                                    <div class="my-auto">
                                        <h4 class="card-title mb-25">Developer Meetup</h4>
                                        <p class="card-text mb-0">Meet world popular developers</p>
                                    </div>
                                </div>
                                <div class="d-flex flex-row meetings">
                                    <div class="avatar bg-light-primary rounded me-1">
                                        <div class="avatar-content">
                                            <i data-feather="calendar" class="avatar-icon font-medium-3"></i>
                                        </div>
                                    </div>
                                    <div class="content-body">
                                        <h6 class="mb-0">Sat, May 25, 2020</h6>
                                        <small>10:AM to 6:PM</small>
                                    </div>
                                </div>
                                <div class="d-flex flex-row meetings">
                                    <div class="avatar bg-light-primary rounded me-1">
                                        <div class="avatar-content">
                                            <i data-feather="map-pin" class="avatar-icon font-medium-3"></i>
                                        </div>
                                    </div>
                                    <div class="content-body">
                                        <h6 class="mb-0">Central Park</h6>
                                        <small>Manhattan, New york City</small>
                                    </div>
                                </div>
                                <div class="avatar-group">
                                    <div data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom" title="Billy Hopkins" class="avatar pull-up">
                                        <img src="../../../app-assets/images/portrait/small/avatar-s-9.jpg" alt="Avatar" width="33" height="33" />
                                    </div>
                                    <div data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom" title="Amy Carson" class="avatar pull-up">
                                        <img src="../../../app-assets/images/portrait/small/avatar-s-6.jpg" alt="Avatar" width="33" height="33" />
                                    </div>
                                    <div data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom" title="Brandon Miles" class="avatar pull-up">
                                        <img src="../../../app-assets/images/portrait/small/avatar-s-8.jpg" alt="Avatar" width="33" height="33" />
                                    </div>
                                    <div data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom" title="Daisy Weber" class="avatar pull-up">
                                        <img src="../../../app-assets/images/portrait/small/avatar-s-20.jpg" alt="Avatar" width="33" height="33" />
                                    </div>
                                    <div data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom" title="Jenny Looper" class="avatar pull-up">
                                        <img src="../../../app-assets/images/portrait/small/avatar-s-20.jpg" alt="Avatar" width="33" height="33" />
                                    </div>
                                    <h6 class="align-self-center cursor-pointer ms-50 mb-0">+42</h6>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </section>
            <!-- Dashboard Ecommerce ends -->

        </div>
    </div>
</div>
@endsection


@section('scripts')
<script src="{{asset('app-assets/js/scripts/cards/card-advance.js')}}"></script>

<script>
    /*=========================================================================================
    File Name: card-analytics.js
    Description: Card Analytics page content with Apexchart Examples
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(window).on('load', function () {
  'use strict';

  var $textHeadingColor = '#5e5873';
  var $strokeColor = '#ebe9f1';
  var $labelColor = '#e7eef7';
  var $avgSessionStrokeColor2 = '#ebf0f7';
  var $budgetStrokeColor2 = '#dcdae3';
  var $goalStrokeColor2 = '#51e5a8';
  var $revenueStrokeColor2 = '#d0ccff';
  var $textMutedColor = '#b9b9c3';
  var $salesStrokeColor2 = '#df87f2';
  var $white = '#fff';
  var $earningsStrokeColor2 = '#28c76f66';
  var $earningsStrokeColor3 = '#28c76f33';

  var supportChartOptions;
  var avgSessionChartOptions;
  var revenueReportChartOptions;
  var budgetChartOptions;
  var goalChartOptions;
  var revenueChartOptions;
  var salesChartOptions;
  var salesLineChartOptions;
  var sessionChartOptions;
  var customerChartOptions;
  var orderChartOptions;
  var earningsChartOptions;

  var supportChart;
  var avgSessionChart;
  var revenueReportChart;
  var budgetChart;
  var goalChart;
  var revenueChart;
  var salesChart;
  var salesLineChart;
  var sessionChart;
  var customerChart;
  var orderChart;
  var earningsChart;

  var $supportTrackerChart = document.querySelector('#support-tracker-chart');
  var $avgSessionChart = document.querySelector('#avg-session-chart');
  var $revenueReportChart = document.querySelector('#revenue-report-chart');
  var $budgetChart = document.querySelector('#budget-chart');
  var $goalOverviewChart = document.querySelector('#goal-overview-chart');
  var $revenueChart = document.querySelector('#revenue-chart');
  var $salesChart = document.querySelector('#sales-chart');
  var $salesLineChart = document.querySelector('#sales-line-chart');
  var $sessionChart = document.querySelector('#session-chart');
  var $customerChart = document.querySelector('#customer-chart');
  var $productOrderChart = document.querySelector('#product-order-chart');
  var $earningsChart = document.querySelector('#earnings-donut-chart');

  // Support Tracker Chart
  // -----------------------------


  // Average Session Chart
  // ----------------------------------

  // Revenue Report Chart
  // ----------------------------------


  // Budget Chart
  // ----------------------------------

  // Goal Overview  Chart
  // -----------------------------


  // Revenue  Chart
  // -----------------------------


  // Sales Chart
  // -----------------------------


  // Sales Line Chart
  // -----------------------------


  // Session Chart
  // ----------------------------------


  // Customer Chart
  // -----------------------------


  // Product Order Chart
  // -----------------------------
    orderChartOptions = {
        chart: {
        height: 325,
        type: 'radialBar'
        },
        colors: [window.colors.solid.primary, window.colors.solid.warning, window.colors.solid.danger],
        stroke: {
        lineCap: 'round'
        },
        plotOptions: {
        radialBar: {
            size: 150,
            hollow: {
            size: '20%'
            },
            track: {
            strokeWidth: '100%',
            margin: 15
            },
            dataLabels: {
            value: {
                fontSize: '1rem',
                colors: $textHeadingColor,
                fontWeight: '500',
                offsetY: 5
            },
            total: {
                show: true,
                label: 'Total',
                fontSize: '1.286rem',
                colors: $textHeadingColor,
                fontWeight: '500',

                formatter: function (w) {
                // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
                return {{($products)->count()}};
                }
            }
            }
        }
        },
        series: [{{(int)(($product_approved->count()/$products->count())*100)}}, {{(int)(($product_pending->count()/$products->count())*100)}}, {{(int)(($product_rejected->count()/$products->count())*100)}}],
        labels: ['Approved', 'Pending', 'Rejected']
    };
    orderChart = new ApexCharts($productOrderChart, orderChartOptions);
    orderChart.render();

  // Earnings Chart
  // -----------------------------


});

</script>

@endsection
