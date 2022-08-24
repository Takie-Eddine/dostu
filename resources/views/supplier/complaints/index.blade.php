@extends('supplier_layout.supplier')

@section('title', 'Complaints')

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
                                <li class="breadcrumb-item active">Complaints
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

                        @include('supplier.alerts.errors')
                        @include('supplier.alerts.success')
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Client Name</th>
                                        <th>Product Name</th>
                                        <th>Title</th>
                                        <th>Body</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @if ($suppliers && $suppliers->count()>0)
                                        @foreach ($suppliers as $supplier) --}}
                                        <tr>
                                            <td>
                                                {{-- <span class="fw-bold">{{$supplier->id}}</span> --}}
                                            </td>
                                            <td>
                                                {{-- <span class="fw-bold">{{$supplier->first_name}}</span> --}}
                                            </td>
                                            <td>
                                                {{-- <span class="fw-bold">{{$supplier->last_name}}</span> --}}
                                            </td>
                                            <td>
                                                {{-- <span class="fw-bold">{{$supplier->email}}</span> --}}
                                            </td>
                                            <td>
                                                {{-- <span class="fw-bold">{{$supplier->mobile}}</span> --}}
                                            </td>




                                            <td>
                                                <div class="btn-group" role="group"
                                                                    aria-label="Basic example">
                                                                    {{-- <a href="{{route('supplier.complaint.respond',1)}}"
                                                                    class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">send</a> --}}




                                                        </div>
                                            </td>
                                        </tr>
                                        {{-- @endforeach
                                    @endif --}}
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
