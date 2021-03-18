@extends('layouts.dash.main')
@section('title', 'Investment Packages')
@section('header-title', 'Choose an Investment Package to Start Earning')

@section('content')
<div class="row investments-row text-center">
    @foreach($packages as $package)
        <div class="col-sm-3">
            <table class="table table-borderless table-pricing">
                <thead>
                    <tr>
                        <th class="text-capitalize">{{ $package->name }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="active">
                        <td>
                            <h1><small>min</small><br><strong>{{ config('app.currency').$package->min_amount }}</strong><br> <small>max</small><br><strong>{{ config('app.currency').$package->max_amount }}</strong><br><small>per @if($package->duration == 7)week @else month @endif</small></h1>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>{{ $package->percentage }}%</strong> Weekly Profit Return</td>
                    </tr>
                    <tr>
                        <td><strong>Capital Included</strong></td>
                    </tr>
                    <tr class="active">
                        <td>
                            <a href="{{ route('user.investments.select', $package->name) }}" class="btn btn-effect-ripple  btn-info" style="overflow: hidden; position: relative;"><i class="fa fa-arrow-right"></i> Invest Now</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-muted">
                            <small><em>* Need help choosing? Chat with our support</em></small>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    @endforeach
</div>
{{-- <div class="row">
    <div class="col-md-12">
        <div class="card">
            <h2 class="card-header">Manage Investments</h2>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td colspan="2">Larry the Bird</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
