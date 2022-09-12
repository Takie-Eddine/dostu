@extends('client_layout.client')

@section('title', 'Store')


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
                        <h2 class="content-header-title float-start mb-0">Store</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('client.client')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a >Store</a>
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
            @include('client.alerts.errors')
            @include('client.alerts.success')
            <div class="col-xl-12 col-lg-12 col-md-12 order-1 order-md-0">
                <!-- User Card -->
                <div class="card">
                    <div class="card-body">
                        <div class="user-avatar-section">
                            <div class="d-flex align-items-center flex-column">
                                <img class="img-fluid rounded mt-3 mb-2" src="{{asset('assets/images/clients/'.$store->store_logo)}}" height="200" width="200" alt="User avatar" />
                                <div class="user-info text-center">
                                    <span class="badge bg-light-secondary">Name</span>
                                    <h4>{{$store->store_name}}</h4>

                                </div>
                            </div>
                        </div>
                        {{-- <div class="d-flex justify-content-around my-2 pt-75">
                            <div class="d-flex align-items-start me-2">
                                <span class="badge bg-light-primary p-75 rounded">
                                    <i data-feather="check" class="font-medium-2"></i>
                                </span>
                                <div class="ms-75">
                                    <h4 class="mb-0">1.23k</h4>
                                    <small>Tasks Done</small>
                                </div>
                            </div>
                            <div class="d-flex align-items-start">
                                <span class="badge bg-light-primary p-75 rounded">
                                    <i data-feather="briefcase" class="font-medium-2"></i>
                                </span>
                                <div class="ms-75">
                                    <h4 class="mb-0">568</h4>
                                    <small>Projects Done</small>
                                </div>
                            </div>
                        </div> --}}
                        <h4 class="fw-bolder border-bottom pb-50 mb-1">Details</h4>
                        <div class="info-container">
                            <ul class="list-unstyled">
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Store Email:</span>
                                    <span>{{$store->store_email}}</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Store Mobile:</span>
                                    <span>{{$store->store_mobile}}</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Status:</span>
                                    @if ($store->status==0)
                                        <span class="badge bg-light-warning">{{$store->getStatus()}}</span>
                                    @endif
                                    @if ($store->status==1)
                                        <span class="badge bg-light-success">{{$store->getStatus()}}</span>
                                    @endif
                                    @if ($store->status==3)
                                        <span class="badge bg-light-danger">{{$store->getStatus()}}</span>
                                    @endif

                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Default:</span>
                                    <span>{{$store->getDefault()}}</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Country:</span>
                                    <span>{{$store->country}}</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">State:</span>
                                    <span>{{$store->state}}</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">City:</span>
                                    <span>{{$store->city}}</span>
                                </li>

                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Address:</span>
                                    <span> {{$store->address}}</span>
                                </li>
                            </ul>
                            <div class="d-flex justify-content-center pt-2">
                                <a href="{{route('client.store.edit',$store->id)}}" class="btn btn-primary me-1" >
                                    Edit
                                </a>
                                <a href="{{route('client.store.delete',$store->id)}}" class="btn btn-outline-danger suspend-user">Suspended</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /User Card -->

            </div>

        </div>
    </div>
</div>
@endsection

@section('scripts')



@endsection
