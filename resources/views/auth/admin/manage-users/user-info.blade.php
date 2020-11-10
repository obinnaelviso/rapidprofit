<h3>Profile Information</h3>
<div class="table-responsive border-bottom">

    <table class="table mb-0 thead-border-top-0">
        <tbody>
            <tr>
                <td class="title">First Name</td>
                <td class="text-capitalize">{{ $reg_user->first_name }}</td>
            </tr>
            <tr>
                <td class="title">Last Name</td>
                <td class="text-capitalize">{{ $reg_user->last_name }}</td>
            </tr>
            <tr>
                <td class="title">Email Address</td>
                <td id="email">{{ $reg_user->email }}</td>
                <td><button class="btn btn-primary btn-sm" id="update-email">Update Email Address</button></td>
            </tr>
            <tr>
                <td class="title">Balance</td>
                <td class="text-success text-big" id="balance">{{ config('app.currency').$reg_user->wallet->amount }}</td>
                <td><button class="btn btn-success btn-sm" id="update-balance">Update Balance</button></td>
            </tr>
            <tr>
                <td class="title">Bonus</td>
                <td class="text-warning text-big" id="bonus">{{ config('app.currency').$reg_user->wallet->bonus }}</td>
                <td><button class="btn btn-warning btn-sm" id="update-bonus">Update Bonus</button></td>
            </tr>
            <tr>
                <td class="title">Commission</td>
                <td class="text-primary text-big" id="commissions">{{ config('app.currency').$reg_user->wallet->commissions }}</td>
                {{-- <td><button class="btn btn-warning btn-sm" id="update-bonus">Update Bonus</button></td> --}}
            </tr>
            <tr>
                <td class="title">Role</td>
                <td class="text-secondary text-capitalize">{{ $reg_user->role->title }}</td>
            </tr>
            <tr>
                <td class="title">Phone</td>
                <td>{{ $reg_user->phone }}</td>
            </tr>
            <tr>
                <td class="title">Address</td>
                <td>{{ $reg_user->address }}</td>
            </tr>
            <tr>
                <td class="title">Country</td>
                <td>{{ $reg_user->country }}</td>
            </tr>
            <tr>
                <td class="title">Referral Code</td>
                <td>{{ $reg_user->referral_code }}</td>
            </tr>
            <tr>
                <td class="title">Status</td>
                <td><span class="label label-success">{{ $reg_user->status->title }}</span></td>
                <td>@if($reg_user->status_id == status(config('status.active')))
                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#blockUser">Block Account</button>
                    @else
                        <button class="btn btn-success btn-sm" onclick="event.preventDefault();
                        document.getElementById('account-status').submit();">Activate Account</button>
                    @endif
                    <form id="account-status" action="{{ route('admin.manage.users.account-status', $reg_user->id) }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </td>
            </tr>
            @if($reg_user->status_id == status(config('status.inactive')))
                <tr>
                    <td class="title text-danger">Reason for Account Deactivation *</td>
                    <td>{{ $reg_user->blacklist->reason }}</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
{{-- Block User --}}
<div class="modal fade" id="blockUser" tabindex="-1" role="dialog" aria-labelledby="blockUserLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-danger text-uppercase"> Reason *
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </a>
            </div>
            <div class="modal-body">
                <form class="splash-container" method="POST" action="{{ route('admin.manage.users.account-status', $reg_user->id) }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea name="reason" class="form-control" id="reason" cols="30" rows="10" placeholder="Write your reasons here *"></textarea>
                                @error('reason')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-block btn-danger" type="submit">Block Account</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-warning" data-dismiss="modal">Close</a>
            </div>
        </div>
    </div>
</div>
