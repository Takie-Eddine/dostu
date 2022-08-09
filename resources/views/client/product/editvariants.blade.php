@extends('client_layout.client')

@section('title', 'Edit Variants')


@section('style')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
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
                        <h2 class="content-header-title float-start mb-0">Products Edit</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('client.client')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="{{route('client.product.index')}}">Products</a>
                                </li>
                                <li class="breadcrumb-item active">Edit Variants
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
            <div class="row" id="table-responsive">
                <div class="col-12">
                    <div class="card">


                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-nowrap">#</th>
                                        <th scope="col" class="text-nowrap">Heading 1</th>
                                        <th scope="col" class="text-nowrap">Heading 2</th>
                                        <th scope="col" class="text-nowrap">Heading 3</th>
                                        <th scope="col" class="text-nowrap">Heading 4</th>
                                        <th scope="col" class="text-nowrap">Heading 5</th>
                                        <th scope="col" class="text-nowrap">Heading 6</th>
                                        <th scope="col" class="text-nowrap">Heading 7</th>
                                        <th scope="col" class="text-nowrap">Heading 8</th>
                                        <th scope="col" class="text-nowrap">Heading 9</th>
                                        <th scope="col" class="text-nowrap">Heading 10</th>
                                        <th scope="col" class="text-nowrap">Heading 11</th>
                                        <th scope="col" class="text-nowrap">Heading 12</th>
                                        <th scope="col" class="text-nowrap">Heading 13</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-nowrap">1</td>
                                        <td class="text-nowrap">Table cell</td>
                                        <td class="text-nowrap">Table cell</td>
                                        <td class="text-nowrap">Table cell</td>
                                        <td class="text-nowrap">Table cell</td>
                                        <td class="text-nowrap">Table cell</td>
                                        <td class="text-nowrap">Table cell</td>
                                        <td class="text-nowrap">Table cell</td>
                                        <td class="text-nowrap">Table cell</td>
                                        <td class="text-nowrap">Table cell</td>
                                        <td class="text-nowrap">Table cell</td>
                                        <td class="text-nowrap">Table cell</td>
                                        <td class="text-nowrap">Table cell</td>
                                        <td class="text-nowrap">Table cell</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                    </tr>
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



@section('scripts')

@endsection