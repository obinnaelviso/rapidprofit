
@extends('layouts.dashboard.main')
@section('title', ucfirst($reg_user->first_name.' '.$reg_user->last_name)."'s Profile")
@section('settings-active', 'active')
@section('general-active', 'active')
@section('sidebar')
@include('layouts.sidebar-admin')
@endsection

@section('content')
<div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-center">
        <div class="flex">
            {{-- <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </nav> --}}
            <h1 class="m-0">{{ ucfirst($reg_user->first_name.' '.$reg_user->last_name)."'s Profile" }}</h1>
        </div>
    </div>
</div>




<div class="container-fluid page__container">
    @include('layouts.alerts')

    <div class="card card-form">
        <div class="row no-gutters">
            <div class="col-md-12 card-body">

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
    </div>
</div>
@endsection

@section('input-js')
<script>
    $('#update-balance').click(function() {
        var amount = prompt('Enter New Balance', '')
        if(amount != null && amount !="") {
            $.ajax({
                type: "PUT",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "amount": amount
                },
                url: "{{ route('admin.manage.users.update-balance', $reg_user->id) }}",
                success: function(response){
                    $("#balance").fadeOut(200, function() {
                            // form.html($response).fadeIn().delay(2000);
                            $("#balance").hide().html("{{ config('app.currency') }}"+response.amount).fadeIn().delay(200);
                    }).hide()
                alert(response.message)
                }
            });
        }
    })

$('#update-bonus').click(function() {
    var bonus = prompt('Enter New Bonus', '')
    if(bonus != null && bonus !="") {
        $.ajax({
            type: "PUT",
            data: {
                "_token": "{{ csrf_token() }}",
                "bonus": bonus
            },
            url: "{{ route('admin.manage.users.update-bonus', $reg_user->id) }}",
            success: function(response){
                $("#bonus").fadeOut(200, function() {
                        // form.html($response).fadeIn().delay(2000);
                        $("#bonus").hide().html("{{ config('app.currency') }}"+response.bonus).fadeIn().delay(200);
                }).hide()
            alert(response.message)
            }
        });
    }
})

$('#update-commission').click(function() {
    var commission = prompt('Enter Commission', '')
    if(commission != null && commission !="") {
        $.ajax({
            type: "PUT",
            data: {
                "_token": "{{ csrf_token() }}",
                "commission": commission
            },
            url: "{{ route('admin.manage.users.update-commission', $reg_user->id) }}",
            success: function(response){
                $("#commission").fadeOut(200, function() {
                        // form.html($response).fadeIn().delay(2000);
                        $("#commission").hide().html("{{ config('app.currency') }}"+response.commission).fadeIn().delay(200);
                }).hide()
            alert(response.message)
            }
        });
    }
})


    $('#update-email').click(function() {
        var email = prompt('Enter New Email Address', '')
        if(email != null && email !="") {
            $.ajax({
                type: "PUT",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "email": email
                },
                url: "{{ route('admin.manage.users.update-email', $reg_user->id) }}",
                success: function(response){
                    $("#email").fadeOut(200, function() {
                            // form.html($response).fadeIn().delay(2000);
                            $("#email").hide().html(response.email).fadeIn().delay(200);
                    }).hide()
                alert(response.message)
                }
            });
        }
    })

    function newDeposit(receipt_id = 0) {
        var amount = prompt('Enter New Deposit', '')
        if(amount != null && amount !="") {
            $.ajax({
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "amount": amount,
                    "receipt_id": receipt_id
                },
                url: "{{ route('admin.manage.users.deposit', $reg_user->id) }}",
                success: function(response){
                    $("#deposit-table").fadeOut(200, function() {
                            // form.html($response).fadeIn().delay(2000);
                            $("#deposit-table").hide().load(location.href + " #deposit-table>").fadeIn().delay(200);
                    }).hide()
                alert(response.message)
                }
            });
        }
    }

    function newWithdrawal(withdraw_id) {
        $.ajax({
            type: "PUT",
            data: {
                "_token": "{{ csrf_token() }}",
                "withdraw_id": withdraw_id
            },
            url: "{{ route('admin.manage.users.withdraw', $reg_user->id) }}",
            success: function(response){
                $("#withdrawal-table").fadeOut(200, function() {
                        // form.html($response).fadeIn().delay(2000);
                        $("#withdrawal-table").hide().load(location.href + " #withdrawal-table>").fadeIn().delay(200);
                }).hide()
                $("#withdrawal-comp-table").fadeOut(200, function() {
                        // form.html($response).fadeIn().delay(2000);
                        $("#withdrawal-comp-table").hide().load(location.href + " #withdrawal-comp-table>").fadeIn().delay(200);
                }).hide()
            alert(response.message)
            }
        });
    }
</script>
<script>
    function deleteInvestment(investment_id = 0) {
        var delete_investment = confirm('Are you sure you want to cancel this investment?')
        if(delete_investment) {
            $("#delete-investment-"+investment_id).submit();
        }
    }
</script>
@endsection
