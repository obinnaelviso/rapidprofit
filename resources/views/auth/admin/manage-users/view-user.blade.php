@extends('layouts.main')
@section('title', ucfirst($reg_user->first_name.' '.$reg_user->last_name)."'s investments - ".' Admin '.config('app.name'))
@section('users-active', 'active')
@section('sidebar')
@include('layouts.admin-sidebar')
@endsection

@section('content')
<div class="row mb-3">
    <div class="col-md-12">
        <h1>{{ ucfirst($reg_user->first_name.' '.$reg_user->last_name)."'s Profile" }}</h1>
        <hr>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        @include('layouts.alerts')
        <div class="pills-vertical">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-12">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active show" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Profile</a>
                        <a class="nav-link" id="v-pills-deposits-tab" data-toggle="pill" href="#v-pills-deposits" role="tab" aria-controls="v-pills-deposits" aria-selected="false">Deposit Receipts</a>
                        <a class="nav-link" id="v-pills-investments-tab" data-toggle="pill" href="#v-pills-investments" role="tab" aria-controls="v-pills-investments" aria-selected="false">Investments</a>
                        <a class="nav-link" id="v-pills-withdrawals-tab" data-toggle="pill" href="#v-pills-withdrawals" role="tab" aria-controls="v-pills-withdrawals" aria-selected="false">Withdrawal Requests</a>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-8 col-12 ">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade active show" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            @include('auth.admin.manage-users.user-info')
                        </div>
                        <div class="tab-pane fade" id="v-pills-deposits" role="tabpanel" aria-labelledby="v-pills-deposits-tab">
                            @include('auth.admin.manage-users.user-deposits')
                        </div>
                        <div class="tab-pane fade" id="v-pills-investments" role="tabpanel" aria-labelledby="v-pills-investments-tab">
                            @include('auth.admin.manage-users.user-investments')
                        </div>
                        {{-- User Withdrawals --}}
                        <div class="tab-pane fade" id="v-pills-withdrawals" role="tabpanel" aria-labelledby="v-pills-withdrawals-tab">
                            @include('auth.admin.manage-users.user-withdrawals')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
