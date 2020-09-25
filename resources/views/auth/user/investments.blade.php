@extends('layouts.main')
@section('title', 'Investment Packages - '.config('app.name'))
@section('investments-active', 'active')
@section('sidebar')
@include('layouts.user-sidebar')
@endsection

@section('content')
<div class="row mb-4">
    <div class="col-md-12">
        <h3 class="section-tittle"><img src="/images/icons/investments-big.svg" class="mr-2" alt="investments" width="25">  Choose Your Investment Package</h3>
    </div>
</div>
<div class="row investments-row text-center">
    @foreach($packages as $package)
        <div class="col-md-3">
            <div class="card card-figure invest-card">
                <div class="card-header invest-header"><h3 class="text-capitalize">{{ $package->name }}</h3></div>
                {{-- <div class="ribbons bg-danger"></div>
                <div class="ribbons-text">Popular</div> --}}
                <!-- .card-figure -->
                <figure class="figure">
                    <!-- .figure-img -->
                    <div class="figure-img">
                        {{-- <img class="img-fluid" src="../assets/images/card-img.jpg" alt="Card image cap"> --}}
                        <p class="text-muted pt-4">{{ $package->percentage }}% Weekly Profit Return</p>
                        <p class="text-muted">Duration: @if($package->duration == 7)1 Week @else 1 Month @endif</p><hr>
                        <h4 class="text-light-yellow text-center"> Amount {{ config('app.currency').$package->min_amount }} - {{ config('app.currency').$package->max_amount }}</h4><hr>
                        <p class="text-muted mb-5">Capital Included</p>
                        <div class="figure-description bg-dark">
                            <h6 class="figure-title"> {{ $package->name }} Plan </h6>
                            <p class="text-muted mb-0">
                                <small>@if($package->description) {{ $package->description }} @else Get to invest a minimum of {{ config('app.currency').$package->min_amount  }} and gain back an {{ $package->percentage }}% weekly profit with the capital you invest with for @if($package->duration == 7)1 week @else 1 month @endif.
                                    <br> Click the button below to start investment. @endif</small>
                            </p>
                        </div>
                        {{-- <div class="figure-tools">
                            <a href="#" class="tile tile-circle tile-sm mr-auto">   </a>
                            <span class="badge badge-danger">Social</span>
                        </div> --}}
                        <div class="figure-action">
                            <a href="{{ route('user.investments.select', $package->name) }}" class="btn btn-block btn-warning invest-btn">Invest now</a>
                        </div>
                    </div>
                    <!-- /.figure-img -->
                </figure>
                <!-- /.card-figure -->
            </div>
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
