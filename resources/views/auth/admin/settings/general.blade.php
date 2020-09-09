@extends('layouts.main')
@section('title', 'General Settings - '.' Admin '.config('app.name'))
@section('settings-active', 'active')
@section('general-active', 'active')
@section('sidebar')
@include('layouts.admin-sidebar')
@endsection

@section('content')
<div class="row mb-3">
    <div class="col-md-12">
        <h1>General Settings</h1>
        <hr>
    </div>
</div>
<div class="row mb-3">
    <div class="col-md-12">
        <div class="card">
          <div class="card-body">
              @include('layouts.alerts')
            <form action="{{ route('admin.settings.general', $gen_settings->id) }}" method="POST">
                @csrf @method('put')
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="text-uppercase">Deposit Settings</h4>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="col-md-12 col-form-label text-uppercase">Minimum Deposit</label>
                            <input class="form-control @error('min_dep') is-invalid @enderror" min=0 type="number" name="min_dep" value="{{ array_key_exists('min_dep', $general) ?$general->min_dep:'' }}" placeholder="0.0" required>
                            @error('min_dep')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="col-md-12 col-form-label text-uppercase">Maximum Deposit</label>
                            <input class="form-control @error('max_dep') is-invalid @enderror" min=0 type="number" name="max_dep" value="{{ array_key_exists('max_dep', $general) ?$general->max_dep:'' }}" placeholder="0.0" required>
                            @error('max_dep')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="text-uppercase">Withdraw Settings</h4>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="col-md-12 col-form-label text-uppercase">Minimum Withdraw</label>
                            <input class="form-control @error('min_with') is-invalid @enderror" min=0 type="number" name="min_with" value="{{ array_key_exists('min_with', $general) ?$general->min_with:'' }}" placeholder="0.0" required>
                            @error('min_with')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="col-md-12 col-form-label text-uppercase">Maximum Withdraw</label>
                            <input class="form-control @error('max_with') is-invalid @enderror" min=0 type="number" name="max_with" value="{{ array_key_exists('max_with', $general) ?$general->max_with:'' }}" placeholder="0.0" required>
                            @error('max_with')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="text-uppercase">Referral Settings</h4>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="col-md-12 col-form-label text-uppercase">Referrer Bonus</label>
                            <input class="form-control @error('referrer_bon') is-invalid @enderror" min=0 type="number" name="referrer_bon" value="{{ array_key_exists('referrer_bon', $general) ?$general->referrer_bon:'' }}" placeholder="0.0" required>
                            @error('referrer_bon')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="col-md-12 col-form-label text-uppercase">Referred Bonus</label>
                            <input class="form-control @error('referred_bon') is-invalid @enderror" min=0 type="number" name="referred_bon" value="{{ array_key_exists('referred_bon', $general) ?$general->referred_bon:'' }}" placeholder="0.0" required>
                            @error('referred_bon')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="col-md-12 col-form-label text-uppercase">Referral Withdraw Limit</label>
                            <input class="form-control @error('referral_limit') is-invalid @enderror" min=0 type="number" name="referral_limit" value="{{ array_key_exists('referral_limit', $general) ?$general->referral_limit:'' }}" placeholder="0.0" required>
                            @error('referral_limit')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group pt-2">
                    <button class="btn btn-secondary" type="submit" style="color: white">Save Settings</button>
                </div>
            </form>
          </div>
        </div>
    </div>
</div>
@endsection
