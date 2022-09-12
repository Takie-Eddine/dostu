@extends('client_layout.client')

@section('title', 'Security')

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
                        <h2 class="content-header-title float-start mb-0">Account</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('client.client')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Settings</a>
                                </li>
                                <li class="breadcrumb-item active">Security
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
                            <a class="nav-link" href="{{route('client.setting.profile')}}">
                                <i data-feather="user" class="font-medium-3 me-50"></i>
                                <span class="fw-bold">Account</span>
                            </a>
                        </li>
                        <!-- security -->
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <i data-feather="lock" class="font-medium-3 me-50"></i>
                                <span class="fw-bold">Security</span>
                            </a>
                        </li>
                        <!-- billing and plans -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('client.setting.subscription')}}">
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

                    </ul>

                    <!-- security -->
                    @include('client.alerts.errors')
                    @include('client.alerts.success')
                    <div class="card">

                        <div class="card-header border-bottom">
                            <h4 class="card-title">Change Password</h4>
                        </div>
                        <div class="card-body pt-1">
                            <!-- form -->
                            <form class="validate-form" action="{{route('client.settings.account.security.update',$client->id)}}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{$client->id}}">
                                <div class="row">

                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6 mb-1">
                                        <label class="form-label" for="account-new-password">New Password</label>
                                        <div class="input-group form-password-toggle input-group-merge">
                                            <input type="password" id="account-new-password" name="password" class="form-control" placeholder="Enter new password" />
                                            <div class="input-group-text cursor-pointer">
                                                <i data-feather="eye"></i>
                                            </div>
                                        </div>
                                        @error('password')
                                        <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-sm-6 mb-1">
                                        <label class="form-label" for="account-retype-new-password">Retype New Password</label>
                                        <div class="input-group form-password-toggle input-group-merge">
                                            <input type="password" class="form-control" id="account-retype-new-password" name="password_confirmation" placeholder="Confirm your new password" />
                                            <div class="input-group-text cursor-pointer"><i data-feather="eye"></i></div>
                                        </div>
                                        @error('password_confirmation')
                                        <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- <div class="col-12">
                                        <p class="fw-bolder">Password requirements:</p>
                                        <ul class="ps-1 ms-25">
                                            <li class="mb-50">Minimum 8 characters long - the more, the better</li>
                                            <li class="mb-50">At least one lowercase character</li>
                                            <li>At least one number, symbol, or whitespace character</li>
                                        </ul>
                                    </div> --}}
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary me-1 mt-1">Save changes</button>

                                    </div>
                                </div>
                            </form>
                            <!--/ form -->
                        </div>
                    </div>

                    <!-- two-step verification -->

                    <!-- / two-step verification -->

                    <!-- create API key -->

                    <!-- / create API key -->

                    <!-- api key list -->

                    <!-- / api key list -->

                    <!-- recent device -->

                    <!-- / recent device -->

                    <!--/ security -->
                </div>
            </div>
            <!-- two factor auth modal -->

            <!-- / two factor auth modal -->

            <!-- add authentication apps modal -->

            <!-- / add authentication apps modal-->

            <!-- add authentication sms modal-->

            <!-- / add authentication sms modal-->

        </div>
    </div>
</div>

@endsection



@section('scripts')


@endsection
