@extends('client_layout.client')

@section('title', 'Edit Variants')


@section('style')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
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
                                    <li class="breadcrumb-item"><a href="{{ route('client.client') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a
                                            href="{{ route('client.product.index') }}">Products</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a
                                            href="{{ route('client.product.edit', $product->slug) }}">Edit</a>
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
                        <form action="{{ route('client.product.savevariants') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <div class="card">
                                <div class="table-responsive">
                                    <table id="varients" class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-nowrap">#</th>
                                                <th scope="col" class="text-nowrap">Image</th>
                                                <th scope="col" class="text-nowrap">Sku</th>
                                                @if ($product_variants && $product->options)
                                                    @foreach ($product_variants[0]->vriants as $value)
                                                        @foreach ($product->options as $option)
                                                            @if ($option->id == $value)
                                                                <th scope="col" class="text-nowrap">
                                                                    {{ $option->attribute->name }}</th>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                @endif
                                                <th scope="col" class="text-nowrap">Ships From</th>
                                                <th scope="col" class="text-nowrap">Cost</th>
                                                <th scope="col" class="text-nowrap">Shipping</th>
                                                <th scope="col" class="text-nowrap">Price</th>
                                                <th scope="col" class="text-nowrap">Profit</th>
                                                <th scope="col" class="text-nowrap">Compared At Price</th>
                                                <th scope="col" class="text-nowrap">Inventory</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($product_variants && count($product_variants) > 0)
                                                @foreach ($product_variants as $item)
                                                    <tr>

                                                        <td class="text-nowrap"><input class="" type="checkbox"
                                                                name="id[]" value="{{ $item->id }}" id="chek"
                                                                onchange="disableRow(this)" checked>{{ $item->id }}</td>
                                                        <td class="text-nowrap">
                                                            <div class="avatar">
                                                                <div data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                                    data-bs-placement="top" class="avatar pull-up my-0"
                                                                    title="{{ $product->name }}">
                                                                    <img src="{{ asset('assets/images/products/' . $item->photo) }}"
                                                                        alt="Avatar" height="50" width="50" />
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="text-nowrap"><input type="text" class="input"
                                                                name="sku[]" value="{{ $item->sku }}" id="sku">
                                                        </td>
                                                        @for ($i = 0; $i < count($product_variants[0]->vriants); $i++)
                                                            @foreach ($product->options as $option)
                                                                @if ($option->id == $item->vriants[$i])
                                                                    <td class="text-nowrap">{{ $option->name }}</td>
                                                                @endif
                                                            @endforeach
                                                        @endfor
                                                        <td class="text-nowrap">Turkey</td>
                                                        <td class="text-nowrap">${{ $item->price }}</td>
                                                        <td class="text-nowrap">__</td>
                                                        <td class="text-nowrap"><input type="text" class="input"
                                                                name="selling_price[]"
                                                                value="{{ $item->price + ($item->price * 20) / 100 }}"
                                                                id="selling_price"></td>
                                                        <td class="text-nowrap">${{ ($item->price * 20) / 100 }}</td>
                                                        <td class="text-nowrap"><input type="text" class="input"
                                                                name="global_price[]"
                                                                value="{{ $item->price + ($item->price * 20) / 100 }}"
                                                                id="global_price"></td>
                                                        <td class="text-nowrap">{{ $item->qty }}</td>
                                                        {{-- <td class="text-nowrap"><button type="button"    onClick="sub( {{$item->id}} )" class="btn btn-success me-1">Submit</button></td> --}}

                                                    </tr>
                                                @endforeach
                                            @endif

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success me-1">Submit</button>
                                <button type="reset" onclick="history.back()"
                                    class="btn btn-outline-secondary">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('scripts')

    {{-- <script>
    function sub(id){

        const myHeaders = new Headers();
        myHeaders.append('Content-Type', 'text/json');
        myHeaders.append('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]')['content']);
        let sku = document.getElementById("sku_"+id).value;
        let selling_price = document.getElementById("selling_price_"+id).value;
        let global_price = document.getElementById("global_price_"+id).value;
        const data = {

            "id": id,
            "sku":sku,
            "selling_price":selling_price,
            "global_price":global_price

        };
        //  const xhttp = new XMLHttpRequest();
        //  xhttp.onreadystatechange = function() {
        //     console.log(this.responseText);
        //      document.getElementById("demo").innerHTML = this.responseText;
        //      }
        // xhttp.open("POST","{{route('client.product.savevariants')}}",true);
        // xhttp.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]')['content']);
        // xhttp.setRequestHeader('Content-Type','application/json');
        // xhttp.send({'data':data});

        $.ajax({
            url: "{{route('client.product.savevariants')}}",
            type: "POST",
            headers: {'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')['content']
            },
            data: 'data',
            contentType: "application/json",
            // dataType: "json", only use if you need to responce data to be JSON, if its not JSON an error will fire when uncommented. defaults to text
            success: function(data) {
                console.log("data passed back from server is:" + data)
            },
            error: function(err) {
                console.log("an error occured")
                console.log(err)
            }
        })

    }
</script> --}}


    <script>
        // $(".checkbox").change(function() {
        //     if(this.checked) {
        //         //Do stuff
        //     }
        // });

        // $('#chek').change(function() {
        // $(".checkbox").change(function() {
        //     $(".checkbox").change(function() {
        //     if(this.checked) {
        //         console.log("ok123");
        //     }
        // });

        //     $('#varients > tbody  > tr').each(function() {
        //         const currentRow = $(this);
        //         const lastColumn = currentRow.find('td:first-child')

        //         if (lastColumn.find('input').attr('checked')) {
        //             console.log("ok123");
        //             currentRow.find("input").attr("disabled", false);

        //         } else {
        //             console.log("ok");
        //             // console.log(currentRow);
        //             currentRow.find("input").attr("disabled", "disabled");
        //         }
        //     });
        function disableRow(data) {


            tddata = data.parentElement;
            trow = tddata.parentElement;
            checkboxdata = $(trow).find("[type=checkbox]");

            if ($(checkboxdata).is(':checked')) {
            $(trow).find("input").not("[type=checkbox]").attr('disabled',false);

            }
            else {
                $(trow).find("input").not("[type=checkbox]").attr('disabled', "disabled");

            }

            // if ($(this).is(':checked')) {
            //     $('#sku').prop('disabled', false)
            //     $('#selling_price').prop('disabled', false)
            //     $('#global_price').prop('disabled', false)
            // } else {
            //     $('#sku').prop('disabled', true)
            //     $('#selling_price').prop('disabled', true)
            //     $('#global_price').prop('disabled', true)
            // }

        }

        //  })
    </script>





@endsection
