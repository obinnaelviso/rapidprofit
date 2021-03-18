@extends('layouts.dash.main')
@section('title', 'Homepage Settings')

@section('content')
<div class="row mb-3">
    <div class="col-md-12">
        <div class="block full manage-investments">
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
                            <label for="name" class="col-md-12 auth-label text-uppercase">Active Investors</label>
                            <input class="form-control auth-input @error('active_investors') is-invalid @enderror" min=0 type="number" name="active_investors" value="{{ isset($homepage->active_investors) ?$homepage->active_investors:'' }}" placeholder="0.0" required>
                            @error('active_investors')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="col-md-12 auth-label text-uppercase">Active Investments</label>
                            <input class="form-control auth-input @error('active_invest') is-invalid @enderror" min=0 type="number" name="active_invest" value="{{ isset($homepage->active_invest) ?$homepage->active_invest:'' }}" placeholder="0.0" required>
                            @error('active_invest')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="col-md-12 auth-label text-uppercase">Average Deposit Per Month</label>
                            <input class="form-control auth-input @error('average_dep') is-invalid @enderror" min=0 type="number" name="average_dep" value="{{ isset($homepage->average_dep) ?$homepage->average_dep:'' }}" placeholder="0.0" required>
                            @error('average_dep')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="col-md-12 auth-label text-uppercase">Average Payouts Per Month</label>
                            <input class="form-control auth-input @error('average_pay') is-invalid @enderror" min=0 type="number" name="average_pay" value="{{ isset($homepage->average_pay) ?$homepage->average_pay:'' }}" placeholder="0.0" required>
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
                            <label for="name" class="col-md-12 auth-label text-uppercase">Facebook</label>
                            <input class="form-control auth-input @error('facebook') is-invalid @enderror" min=0 type="text" name="facebook" value="{{ isset($homepage->facebook) ?$homepage->facebook:'' }}" placeholder="https://facebook.com/john_doe/" required>
                            @error('facebook')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="col-md-12 auth-label text-uppercase">Instagram</label>
                            <input class="form-control auth-input @error('instagram') is-invalid @enderror" min=0 type="text" name="instagram" value="{{ isset($homepage->instagram) ?$homepage->instagram:'' }}" placeholder="https://instagram.com/john_doe/" required>
                            @error('instagram')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="col-md-12 auth-label text-uppercase">Twitter</label>
                            <input class="form-control auth-input @error('twitter') is-invalid @enderror" min=0 type="text" name="twitter" value="{{ isset($homepage->twitter) ?$homepage->twitter:'' }}" placeholder="https://twitter.com/john_doe/" required>
                            @error('twitter')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="col-md-12 auth-label text-uppercase">Telegram</label>
                            <input class="form-control auth-input @error('telegram') is-invalid @enderror" min=0 type="text" name="telegram" value="{{ isset($homepage->telegram) ?$homepage->telegram:'' }}" placeholder="https://telegram.com/john_doe/" required>
                            @error('telegram')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group pt-2">
                    <button class="btn btn-primary" type="submit">Save Settings</button>
                </div>
            </form>
          </div>
        </div>
    </div>
</div>
@endsection
