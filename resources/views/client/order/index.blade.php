@extends('client_layout.client')

@section('title', 'Order')

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
                        <h2 class="content-header-title float-start mb-0">Order</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('client.client')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Order
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
            <!-- Basic Tables start -->
            <div class="row" id="basic-table">
                <div class="col-12">
                    <div class="card">

                        @include('client.alerts.errors')
                        @include('client.alerts.success')
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Payment Method</th>
                                        <th>Payment Status</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($orders && $orders->count()>0)
                                        @foreach ($orders as $order)
                                            <tr>
                                                <th>{{$order->number}}</th>
                                                <th>{{$order->payment_method}}</th>
                                                <th>{{$order->payment_status}}</th>
                                                <th>{{$order->status}}</th>
                                                <th>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a href="{{route('client.order.edit',$order->id)}}"
                                                            class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">edit</a>

                                                        <a href="{{route('client.order.view',$order->id)}}"
                                                            class="btn btn-outline-info btn-min-width box-shadow-3 mr-1 mb-1">view</a>

                                                        <a href="{{route('client.order.delete',$order->id)}}"
                                                            class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">delete</a>
                                                    </div>
                                                </th>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>


@endsection
