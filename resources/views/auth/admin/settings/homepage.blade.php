@extends('layouts.main')
@section('title', 'Homepage Settings - '.' Admin '.config('app.name'))
@section('settings-active', 'active')
@section('homepage-active', 'active')
@section('sidebar')
@include('layouts.admin-sidebar')
@endsection

@section('content')
<div class="row mb-3">
    <div class="col-md-12">
        <h1>Homepage Settings</h1>
        <hr>
    </div>
</div>
<div class="row mb-3">
    <div class="col-md-12">
        <div class="card">
          <div class="card-body">
              @include('layouts.alerts')
            <form action="{{ route('admin.settings.homepage.update', $home_settings->id) }}" method="POST">
                @csrf @method('put')
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="text-uppercase">{{ config('app.name') }} Achievements</h4>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="col-md-12 col-form-label text-uppercase">Active Investors</label>
                            <input class="form-control @error('active_investors') is-invalid @enderror" min=0 type="number" name="active_investors" value="{{ array_key_exists('active_investors', $homepage) ?$homepage->active_investors:'' }}" placeholder="0.0" required>
                            @error('active_investors')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="col-md-12 col-form-label text-uppercase">Active Investments</label>
                            <input class="form-control @error('active_invest') is-invalid @enderror" min=0 type="number" name="active_invest" value="{{ array_key_exists('active_invest', $homepage) ?$homepage->active_invest:'' }}" placeholder="0.0" required>
                            @error('active_invest')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="col-md-12 col-form-label text-uppercase">Average Deposit Per Month</label>
                            <input class="form-control @error('average_dep') is-invalid @enderror" min=0 type="number" name="average_dep" value="{{ array_key_exists('average_dep', $homepage) ?$homepage->average_dep:'' }}" placeholder="0.0" required>
                            @error('average_dep')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="col-md-12 col-form-label text-uppercase">Average Payouts Per Month</label>
                            <input class="form-control @error('average_pay') is-invalid @enderror" min=0 type="number" name="average_pay" value="{{ array_key_exists('average_pay', $homepage) ?$homepage->average_pay:'' }}" placeholder="0.0" required>
                            @error('average_pay')
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
                        <h4 class="text-uppercase">Social Media</h4>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="col-md-12 col-form-label text-uppercase">Facebook</label>
                            <input class="form-control @error('facebook') is-invalid @enderror" min=0 type="text" name="facebook" value="{{ array_key_exists('facebook', $homepage) ?$homepage->facebook:'' }}" placeholder="0.0" required>
                            @error('facebook')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="col-md-12 col-form-label text-uppercase">Instagram</label>
                            <input class="form-control @error('instagram') is-invalid @enderror" min=0 type="text" name="instagram" value="{{ array_key_exists('instagram', $homepage) ?$homepage->instagram:'' }}" placeholder="0.0" required>
                            @error('instagram')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="col-md-12 col-form-label text-uppercase">Twitter</label>
                            <input class="form-control @error('twitter') is-invalid @enderror" min=0 type="text" name="twitter" value="{{ array_key_exists('twitter', $homepage) ?$homepage->twitter:'' }}" placeholder="0.0" required>
                            @error('twitter')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="col-md-12 col-form-label text-uppercase">Telegram</label>
                            <input class="form-control @error('telegram') is-invalid @enderror" min=0 type="text" name="telegram" value="{{ array_key_exists('telegram', $homepage) ?$homepage->telegram:'' }}" placeholder="0.0" required>
                            @error('telegram')
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
