@extends('layouts.main')
@section('title', 'User Referrals - '.config('app.name'))
@section('profile-active', 'active')
@section('sidebar')
@include('layouts.user-sidebar')
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card profile-card">
          <div class="card-body">
              <div class="row">
                  <div class="col-md-5">
                    <img src="/images/icons/logo-white.svg" alt="{{ config('app.name') }}-white" width="150">
                  </div>
                  <div class="col-md-7 my-3">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="card mb-0 statistics statistics-left-bg">
                                <div class="card-body">
                                    <div class="active-referrals">
                                        <p class="profile-stats-heading">Active<br>Referral</p>
                                        <h2 class="profile-stats-text" id="active-investments">{{ $user->activeReferrals->count() }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card mb-0 statistics statistics-middle-bg">
                                <div class="card-body">
                                    <div class="total-referrals">
                                        <p class="profile-stats-heading">Total<br>Referral</p>
                                        <h2 class="profile-stats-text" id="active-investments">{{ $user->referrerBonus->count() }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card mb-0 statistics statistics-right-bg">
                                <div class="card-body">
                                    <div class="referral-bonus">
                                        <p class="profile-stats-heading">Referral<br>Bonus</p>
                                        <h3 class="profile-stats-text" id="active-investments">{{ config('app.currency').$user->wallet->bonus }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
              </div>
          </div>
        </div>
        {{-- <div class="alert alert-info">
            <i class="fa fa-arrow-right" aria-hidden="true"></i> <b>Note:</b> You cannot modify your Email Address.<br>
        </div> --}}
    </div>
</div>
<div class="row mb-4">
    <div class="col-md-6 profile-image">
        <img src="/images/icons/profile-pic-big.svg" alt="profile-picture">
        <h3>{{ ucfirst($user->first_name.' '.$user->last_name) }}<br>
            <small class="text-muted">Child Investor</small>
        </h3>
    </div>
    <div class="col-md-6">
        <div class="form-row">
            <div class="col-md-4 mb-2"><div class="btn btn-block profile-btn" id="but-d">Referral Code</div></div>
            <div class="col-md-5 mb-2"><input type="text" value="{{ $user->referral_code }}" class="form-control fund-input profile-ref" readonly></div>
            <div class="col-md-3 mb-2"><button class="btn btn-block profile-btn" onclick="copyAddress('referral-link')" type="button">Copy Link</button></div>
            <input id="referral-link" type="text" class="referral-input" value="{{ route('referral', $user->referral_code) }}"></a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        @if($referrals->count())
            <div class="card manage-investments">
                <h4 class="card-header">Your Referrals</h4>
                <div class="card-body">
                    <div>
                        <table class="table table-borderless">
                            <thead class="thead-inverse">
                                <tr>
                                    @php $i = 1; @endphp
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($referrals as $referral)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td class="text-capitalize">{{ $referral->ref_user->first_name.' '.$referral->ref_user->last_name }}</td>
                                        <td><span class="badge @if($referral->status_id == status(config('status.active'))) badge-success @else badge-warning @endif">{{ $referral->status->title }}</span></td>
                                        <td>{{ $referral->created_at->toFormattedDateString() }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @else
            <div class="card manage-investments">
              <div class="card-body">
                <h4 class="card-text text-success">You have not made any referrals yet</h4>
              </div>
            </div>
        @endif        
    </div>
</div>
@endsection
@section('input-js')
<script>


    function copyAddress(id) {
        /* Get the text field */
        var copyText = document.getElementById(id);

        /* Select the text field */
        // selectText(id)
        copyText.select()
        copyText.setSelectionRange(0, 99999); /*For mobile devices*/

        /* Copy the text inside the text field */
        document.execCommand("copy");

        /* Alert the copied text */
        alert("Text copied to clipboard!");
    }

    function selectText(containerid) {
        if (document.selection) { // IE
            var range = document.body.createTextRange();
            range.moveToElementText(document.getElementById(containerid));
            range.select();
        } else if (window.getSelection) {
            var range = document.createRange();
            range.selectNode(document.getElementById(containerid));
            window.getSelection().removeAllRanges();
            window.getSelection().addRange(range);
        }
    }
</script>
@endsection
