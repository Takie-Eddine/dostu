{{-- @extends('supplier_layout.supplier')

@section('title', 'Create Product')




@section('style')

    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/wizard/bs-stepper.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/' . getFolder() . '/plugins/forms/form-wizard.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/select/select2.min.css') }}">




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
                            <h2 class="content-header-title float-start mb-0">Products</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('supplier.supplier') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{ route('supplier.product.index') }}">Products</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a  >Add </a>
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
                @include('supplier.alerts.errors')
                @include('supplier.alerts.success')

                <!-- Modern Horizontal Wizard -->





                <form action="{{ route('supplier.product.store') }}" method="POST" enctype="multipart/form-data" name="registration">
                    @csrf




                    <section class="modern-horizontal-wizard">
                        <div class="bs-stepper wizard-modern modern-wizard-example">
                            <div class="bs-stepper-header">
                                <div class="step" data-target="#account-details-modern" role="tab"
                                    id="account-details-modern-trigger">
                                    <button type="button" class="step-trigger">


                                    </button>
                                </div>



                                <div class="step" data-target="#address-step-modern" role="tab"
                                    id="address-step-modern-trigger">
                                    <button type="button" class="step-trigger">

                                    </button>
                                </div>

                                <div class="step" data-target="#social-links-modern" role="tab"
                                    id="social-links-modern-trigger">
                                    <button type="button" class="step-trigger">

                                    </button>
                                </div>
                            </div>
                            <div class="bs-stepper-content">
                                <div id="account-details-modern" class="content" role="tabpanel"
                                    aria-labelledby="account-details-modern-trigger">
                                    <div class="content-header">
                                        <h5 class="mb-0">Product Details</h5>
                                        <small class="text-muted">Enter Your Product Details.</small>
                                    </div>
                                    <div class="row">
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="name">Product Name</label>
                                            <input type="text" id="name" name="name" value="{{old('name')}}"
                                                class="form-control" placeholder="product name" required  />
                                            @error('name')
                                                <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>


                                    </div>
                                    <div class="row">
                                        <div >
                                            <label  for="description">Description</label>
                                            <textarea class="form-control " id="description"  rows="5"  name="description" value="">{!!old('description')!!}</textarea>
                                            @error('description')
                                                <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="mb-1 col-md-6">
                                            <div class="mb-1">
                                                <label class="form-label" for="categories">Category</label>
                                                <select name="categories[]" class="select2 form-select" multiple="multiple" id="default-select-multi">
                                                    @if ($categories && $categories->count() > 0)
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->name }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>


                                            @error('categories.0')
                                                <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-1 col-md-6">
                                            <div class="mb-1">
                                                <label class="form-label opts" for="tags">Tags</label>
                                                <select name="tags[]" class="select2 form-select " multiple="multiple" id="default-select-multi1">
                                                    @if ($tags && $tags->count() > 0)
                                                        @foreach ($tags as $tag)
                                                            <option value="{{ $tag->id }}">{{ $tag->name }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>


                                            @error('tags.0')
                                                <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="card-body">
                                                <div class="demo-inline-spacing">
                                                    <div class="form-check form-switch">
                                                        <label class="form-label" for="is_active">Active</label>
                                                        <input type="checkbox" value="1" name="is_active"
                                                                id="customSwitch2" class="form-check-input"
                                                                data-color="success" checked />
                                                            @error('is_active')
                                                                <span class="text-danger"> {{ $message }}</span>
                                                            @enderror
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                            <div class="col-sm-3">
                                                <div class="card-body">
                                                    <div class="demo-inline-spacing">
                                                        <div class="form-check form-switch">
                                                            <label class="form-label" for="in_stock">In Stock</label>
                                                            <input type="checkbox" value="1" name="in_stock"
                                                                id="customSwitch2" class="form-check-input"
                                                                data-color="success" checked />
                                                            @error('in_stock')
                                                                <span class="text-danger"> {{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                </div>
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

                                <div id="address-step-modern" class="content" role="tabpanel"
                                    aria-labelledby="address-step-modern-trigger">
                                    <div class="content-header">
                                        <h5 class="mb-0">Product Details</h5>
                                        <small>Enter Your Product Details..</small>
                                    </div>


                                    <div class="mb-1 col-md-12">
                                            <label class="form-label" for="photo">Images</label>
                                            <input type="file" id="photo" name="photo[]" value=""class="form-control" placeholder="upload file" multiple="multiple" />
                                            @error('photo')
                                                <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="row">
                                            @foreach ($attributes as $attribute)
                                                <div class="mb-1 col-md-3">
                                                    <label class="form-label" for="attribute">Attribute</label>
                                                    <input type="text" id="attribute" name="attribute[]" value="{{$attribute->name}}"class="form-control" placeholder="attribute"  />
                                                    <label class="form-label" for="options"></label>
                                                    <select name="options[]" class="select2 form-select" multiple="multiple" id="default-select-multi.{{$attribute->id}}.23">
                                                        @if ($options && $options->count() > 0)
                                                            @foreach ($options as $option)
                                                                @if ($attribute->id == $option->attribute_id)
                                                                    <option value="{{ $option->id }}">{{ $option->name }} </option>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                    @error('options.0')
                                                        <span class="text-danger"> {{ $message }}</span>
                                                    @enderror
                                                    @error('attribute.0')
                                                    <span class="text-danger"> {{ $message }}</span>
                                                    @enderror
                                                </div>
                                            @endforeach
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







                                    <div class="d-flex justify-content-between">
                                        <button type="button" class="btn btn-primary btn-prev">
                                            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                        </button>
                                        <button type="submit" class="btn btn-success btn-submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>


                </form>

                <!-- /Modern Horizontal Wizard -->



            </div>
        </div>
    </div>

@endsection


@section('scripts')




    <script src="{{ asset('app-assets/vendors/js/forms/wizard/bs-stepper.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/form-wizard.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/form-select2.js') }}"></script>


    <script>
        $(document).ready(function() {
            $("#image").fileinput({

                theme:'fas',
                maxFilesize: 5,
                maxFileCount: 10,
                allowedFileTypes:['image'],
                showCancel :true ,
                showRemove: false,
                showUpload: false,
                overwriteInitial:false,

            });

            // $("#sku").onchange({
            //     console.log($("#sku".val()));
            // });
        });
    </script>


<script>
    $(".opts").select2({
    tags: true,
    tokenSeparators: [',', ' ']
    })
</script>

@endsection --}}









@extends('supplier_layout.supplier')

@section('title', 'Security')

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/select/select2.min.css') }}">

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
                        <h2 class="content-header-title float-start mb-0">Product</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('supplier.supplier')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('supplier.product.index')}}">Products</a>
                                </li>
                                <li class="breadcrumb-item active">Add
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
                    {{-- <ul class="nav nav-pills mb-2">
                        <!-- account -->
                        <li class="nav-item">
                            <a class="nav-link active"  href="{{route('supplier.product.create')}}">
                                <i data-feather="user" class="font-medium-3 me-50"></i>
                                <span class="fw-bold">Product</span>
                            </a>
                        </li>
                        <!-- security -->
                        <li class="nav-item">
                            <a class="nav-link " href="{{route('supplier.product.variant')}}">
                                <i data-feather="lock" class="font-medium-3 me-50"></i>
                                <span class="fw-bold">Options</span>
                            </a>
                        </li>
                        <!-- billing and plans -->

                    </ul> --}}

                    <!-- security -->

                    <div class="card">
                        @include('supplier.alerts.errors')
                        @include('supplier.alerts.success')
                        <div class="card-header border-bottom">
                            <h4 class="card-title">Product Details</h4>
                        </div>
                        <div class="card-body pt-1">
                            <!-- form -->
                            {{-- <form class="validate-form" action="{{ route('supplier.product.store') }}" method="POST" enctype="multipart/form-data" name="registration">
                                @csrf





                            </form> --}}

                            <section class="form-control-repeater">
                                <div class="row">
                                    <!-- Invoice repeater -->
                                    <div class="col-12">
                                        <div class="card">

                                            <div class="card-body">
                                                <form action="{{route('supplier.product.store')}}" method="POST" enctype="multipart/form-data" class="invoice-repeater">

                                                    @csrf

                                                    <div class="row">
                                                        <div class="mb-1 col-md-6">
                                                            <label class="form-label" for="name">Product Name*</label>
                                                            <input type="text" id="name" name="name" value="{{old('name')}}"
                                                                class="form-control" placeholder="product name"   />
                                                            @error('name')
                                                                <span class="text-danger"> {{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                        <div class="mb-1 col-md-6">
                                                            <div class="mb-1">
                                                                <label class="form-label" for="image">Image</label>
                                                                <input type="file"  class="form-control" id="image"  name="image[]" placeholder="upload file" multiple="multiple" />
                                                            </div>
                                                            @error('image.0')
                                                                <span class="text-danger"> {{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                        {{-- <div class="mb-1 col-md-6">
                                                            <label class="form-label" for="slug">Product Slug</label>
                                                            <input type="text" id="slug" name="slug" value="{{old('slug')}}"
                                                                class="form-control" placeholder="product slug" required  />
                                                            @error('slug')
                                                                <span class="text-danger"> {{ $message }}</span>
                                                            @enderror
                                                        </div> --}}


                                                    </div>
                                                    <div class="row">
                                                        <div >
                                                            <label  for="description">Description*</label>
                                                            <textarea class="form-control " id="description"  rows="5"  name="description" value="">{!!old('description')!!}</textarea>
                                                            @error('description')
                                                                <span class="text-danger"> {{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <br>

                                                    <div class="row">
                                                        <div class="mb-1 col-md-6">
                                                            <label  for="default_price">Product Price*</label>
                                                            <input type="number" class="form-control " id="default_price" placeholder="Product price"   name="default_price" value="{{old('default_price')}}"/>
                                                            @error('default_price')
                                                                <span class="text-danger"> {{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-1 col-md-6">
                                                            <label  for="shipping_time">Shipping Time*</label>
                                                            <input type="number" class="form-control " id="shipping_time" placeholder="Shipping Time (days)"   name="shipping_time" value="{{old('shipping_time')}}"/>
                                                            @error('shipping_time')
                                                                <span class="text-danger"> {{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="mb-1 col-md-6">
                                                            <div class="mb-1">
                                                                <label class="form-label" for="categories">Category*</label>
                                                                <select name="categories[]" class="select2 form-select" multiple="multiple" id="default-select-multi">
                                                                    @if ($categories && $categories->count() > 0)
                                                                        @foreach ($categories as $category)
                                                                            <option value="{{ $category->id }}">{{ $category->name }}
                                                                            </option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>


                                                            @error('categories.0')
                                                                <span class="text-danger"> {{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                        <div class="mb-1 col-md-6">
                                                            <div class="mb-1">
                                                                <label class="form-label" for="tags">Tags*</label>
                                                                <select name="tags[]" class="select2 form-select opts" multiple="multiple" id="default-select-multi1">
                                                                    @if ($tags && $tags->count() > 0)
                                                                        @foreach ($tags as $tag)
                                                                            <option value="{{ $tag->id }}">{{ $tag->name }}
                                                                            </option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>


                                                            @error('tags.0')
                                                                <span class="text-danger"> {{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <div class="card-body">
                                                                <div class="demo-inline-spacing">
                                                                    <div class="form-check form-switch">
                                                                        <label class="form-label" for="is_active">Active</label>
                                                                        <input type="checkbox" value="1" name="is_active"
                                                                                id="customSwitch2" class="form-check-input"
                                                                                data-color="success" checked />
                                                                            @error('is_active')
                                                                                <span class="text-danger"> {{ $message }}</span>
                                                                            @enderror
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                            <div class="col-sm-6">
                                                                <div class="card-body">
                                                                    <div class="demo-inline-spacing">
                                                                        <div class="form-check form-switch">
                                                                            <label class="form-label" for="in_stock">In Stock</label>
                                                                            <input type="checkbox" value="1" name="in_stock"
                                                                                id="customSwitch2" class="form-check-input"
                                                                                data-color="success" checked />
                                                                            @error('in_stock')
                                                                                <span class="text-danger"> {{ $message }}</span>
                                                                            @enderror
                                                                        </div>

                                                                    </div>
                                                                </div>


                                                            </div>


                                                    </div>


                                                    <div data-repeater-list="variants" >
                                                        <div data-repeater-item>
                                                            <div class="row d-flex align-items-end">
                                                                @foreach ($attributes as $attribute )

                                                                    <div class="col-md-2 col-12">
                                                                        <div class="mb-1">
                                                                            <label class="form-label" for="select2-limited">{{$attribute->name}}</label>
                                                                            <select name="options" class="select2 form-select" id="select2 form-select"  multiple="multiple" >
                                                                                    @foreach ($options as $option)
                                                                                        @if ($option->attribute_id == $attribute->id)
                                                                                            <option value="{{$option->id}}">{{$option->name}}</option>
                                                                                        @endif
                                                                                    @endforeach

                                                                            </select>
                                                                            {{-- <input type="text" class="form-control" id="itemname" aria-describedby="itemname" placeholder="Vuexy Admin Template" name="item" /> --}}
                                                                        </div>
                                                                    </div>
                                                                @endforeach



                                                                <div class="col-md-2 col-12">
                                                                    <div class="mb-1">
                                                                        <label class="form-label" for="itemcost">price*</label>
                                                                        <input type="number" class="form-control" id="itemcost" aria-describedby="itemcost" placeholder="32"  name="price"/>
                                                                    </div>
                                                                    @error('price')
                                                                        <span class="text-danger"> {{ $message }}</span>
                                                                    @enderror
                                                                </div>

                                                                <div class="col-md-2 col-12">
                                                                    <div class="mb-1">
                                                                        <label class="form-label" for="itemquantity">Quantity*</label>
                                                                        <input type="number" class="form-control" id="itemquantity" aria-describedby="itemquantity" placeholder="1" name="qty"/>
                                                                    </div>
                                                                    @error('price')
                                                                        <span class="text-danger"> {{ $message }}</span>
                                                                    @enderror
                                                                </div>

                                                                <div class="col-md-2 col-12">
                                                                    <div class="mb-1">
                                                                        <label class="form-label" for="staticprice">Sku*</label>
                                                                        <input type="text"  class="form-control" id="staticprice"  name="sku" />
                                                                    </div>
                                                                    @error('sku')
                                                                        <span class="text-danger"> {{ $message }}</span>
                                                                    @enderror
                                                                </div>

                                                                <div class="col-md-2 col-12">
                                                                    <div class="mb-1">
                                                                        <label class="form-label" for="staticprice">Image*</label>
                                                                        <input type="file"  class="form-control" id="staticprice"  name="photo" />
                                                                    </div>
                                                                    @error('photo')
                                                                        <span class="text-danger"> {{ $message }}</span>
                                                                    @enderror
                                                                </div>

                                                                <div class="col-md-2 col-12 mb-50">
                                                                    <div class="mb-1">
                                                                        <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button">
                                                                            <i data-feather="x" class="me-25"></i>
                                                                            <span>Delete</span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr />
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
                                                                <i data-feather="plus" class="me-25"></i>
                                                                <span>Add New</span>
                                                            </button>
                                                        </div>
                                                    </div>

                                                    <br>
                                                    <br>

                                                    <div class="row">
                                                        <div class="col-12">
                                                            <button class="btn btn-icon btn-primary" type="submit" >
                                                                <i data-feather="plus" class="me-25"></i>
                                                                <span>save</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Invoice repeater -->
                                </div>
                            </section>

                        </div>
                    </div>

                </div>
            </div>


        </div>
    </div>
</div>

@endsection



@section('scripts')

<script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
<script src="{{ asset('app-assets/js/scripts/forms/form-select2.js') }}"></script>
<script src="{{asset('app-assets/js/scripts/forms/form-repeater.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/forms/repeater/jquery.repeater.min.js')}}"></script>
<script>
    $(".opts").select2({
    tags: true,
    tokenSeparators: [',', ' ']
    })
</script>

{{-- <script>
    $('#name').change(function(e){
        $.get('{{route('supplier.product.checkslug')}}',
            {'name':$(this).val()},
                function(data){
                    $('#slug').val(data,slug);
                }
        );
    });
</script> --}}

<script>
    $(function(){

        $("#image").fileinput({

            theme:'fas',
            maxFilesize: 5,
            maxFileCount: 10,
            allowedFileTypes:['image'],
            showCancel :true ,
            showRemove: false,
            showUpload: false,
            overwriteInitial:false,

        });


    });
</script>
@endsection

