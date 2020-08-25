
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
                <td>{{ $reg_user->email }}</td>
                <td><button class="btn btn-primary btn-sm">Update Email Address</button></td>
            </tr>
            <tr>
                <td class="title">Balance</td>
                <td class="text-success text-big">{{ config('app.currency').$reg_user->wallet->amount }}</td>
                <td><button class="btn btn-success btn-sm">Update Balance</button></td>
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
                <td><button class="btn btn-danger btn-sm">Block User</button></td>
            </tr>
        </tbody>
    </table>
</div>
