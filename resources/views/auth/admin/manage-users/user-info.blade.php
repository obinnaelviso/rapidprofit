<h3>Profile Information</h3>
<div class="table-responsive">
    <table class="table table-hover">
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
                        <button class="btn btn-danger btn-sm" onclick="event.preventDefault();
                        document.getElementById('account-status').submit();">Deactivate Account</button>
                    @else
                        <button class="btn btn-success btn-sm" onclick="event.preventDefault();
                        document.getElementById('account-status').submit();">Activate Account</button>
                    @endif
                    <form id="account-status" action="{{ route('admin.manage.users.account-status', $reg_user->id) }}" method="POST" style="display: none;">
                        @csrf @method('put')
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
</div>
