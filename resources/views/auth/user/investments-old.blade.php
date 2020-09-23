@extends('layouts.main')
@section('title', 'Investment Packages - '.config('app.name'))
@section('investments-active', 'active')
@section('sidebar')
@include('layouts.user-sidebar')
@endsection

@section('content')
<div class="row mb-4">
    <div class="col-md-12">
        <h2> Choose Your Investment Package</h2>
        <hr>
    </div>
</div>
<div class="row text-center">
    @foreach($packages as $package)
        <div class="col-md-4">
            <div class="card card-figure">
                <div class="card-header bg-dark"><h2 class="text-light text-capitalize">{{ $package->name }}</h2></div>
                {{-- <div class="ribbons bg-danger"></div>
                <div class="ribbons-text">Popular</div> --}}
                <!-- .card-figure -->
                <figure class="figure">
                    <!-- .figure-img -->
                    <div class="figure-img">
                        {{-- <img class="img-fluid" src="../assets/images/card-img.jpg" alt="Card image cap"> --}}
                        <h3 class="text-secondary pt-4">{{ $package->percentage }}% Weekly Profit Return</h3><hr>
                        <h3>Duration: @if($package->duration == 7)1 Week @else 1 Month @endif</h3><hr>
                        <h3 class="text-dark"><span class="text-success">Min. Amt:</span> {{ config('app.currency').$package->min_amount }} <br> <span class="text-danger">Max. Amt:</span> {{ config('app.currency').$package->max_amount }}</h3><hr>
                        <h3 class="text-warning">Captial included</h3>
                        <div class="figure-description">
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
                            <a href="{{ route('user.investments.select', $package->name) }}" class="btn btn-block btn-sm btn-danger">Invest now</a>
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
