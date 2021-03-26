@extends('layouts.dash.main')
@section('title', "User Profile")
@section('header-title', ucfirst($reg_user->first_name.' '.$reg_user->last_name)."'s Profile")
@section('content')
<div class="row">
    <div class="col-md-12">
        @include('layouts.alerts')
        <div class="block full">
            <!-- Block Tabs Title -->
            <div class="block-title">
                <ul class="nav nav-tabs" data-toggle="tabs">
                    <li class="active"><a href="#profile">Profile</a></li>
                    <li><a href="#deposits">Deposit Receipts</a></li>
                    <li><a href="#investments">Investments</a></li>
                    <li><a href="#withdrawals">Withdrawal Requests</a></li>
                </ul>
            </div>
            <!-- END Block Tabs Title -->

            <!-- Tabs Content -->
            <div class="tab-content">
                <div class="tab-pane active" id="profile">
                    @include('auth.admin.manage-users.user-info')
                </div>
                <div class="tab-pane" id="deposits">
                    @include('auth.admin.manage-users.user-deposits')
                </div>
                <div class="tab-pane" id="investments">
                    @include('auth.admin.manage-users.user-investments')
                </div>
                <div class="tab-pane" id="withdrawals">
                    @include('auth.admin.manage-users.user-withdrawals')
                </div>
            </div>
            <!-- END Tabs Content -->
        </div>
    </div>
</div>
@endsection
@push('more-js')
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
                                $("#deposit-table").hide().load(location.href + " #deposit-table").fadeIn().delay(200);
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
                            $("#withdrawal-table").hide().load(location.href + " #withdraw-table").fadeIn().delay(200);
                    }).hide()
                alert(response.message)
                }
            });
        }
    </script>
@endpush
