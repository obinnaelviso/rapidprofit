@extends('layouts.dashboard.main')
@section('title', 'Start an Investment')
@section('investments-active', 'active')
@section('sidebar')
@include('layouts.sidebar-user')
@endsection

@section('content')
<div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-center">
        <div class="flex">
            {{-- <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </nav> --}}
            <h1 class="m-0">Start an Investment</h1>
            <p class="text-muted">Choose an investment that best fits your needs and budget and watch your money grow with time.</p>
        </div>
    </div>
</div>




<div class="container-fluid page__container">
    <div class="row card-group-row  pt-2">

        @foreach($packages as $package)
            @php
                $is_premium = (strtolower($package->name) == "premium")
            @endphp
            <div class="col-md-6 col-lg-4 card-group-row__col">
                <div class="card card-group-row__card pricing__card @if($is_premium)pricing__card--popular @endif">

                    @if($is_premium)<span class="pricing__card-badge">most popular</span>@endif

                    <div class="card-body d-flex flex-column">
                        <div class="text-center">
                            <h4 class="pricing__title mb-0 text-capitalize">{{ $package->name }}</h4>
                            <div class="d-flex align-items-center justify-content-center border-bottom-2 flex pb-3">
                                <span class="pricing__amount headings-color">{{ $package->percentage }}</span>
                                <span class="d-flex flex-column">
                                    <span class="pricing__currency text-dark-gray text-left">%</span>
                                    <span class="pricing__duration text-dark-gray">per week</span>
                                </span>
                            </div>
                        </div>
                        <div class="card-body d-flex flex-column">

                            <p>@if($package->description) {{ $package->description }} @else Get to invest a minimum of <b>{{ config('app.currency').$package->min_amount }}</b> and gain back <b>{{ $package->percentage }}%</b> weekly profit for a duration of <b>@if($package->duration == 7)1 Week @else 1 Month @endif</b> maximum. @endif</p>

                            <ul class="list-unstyled pricing__features">

                                <li>{{ $package->duration }}% Weekly Profit Return</li>

                                <li>Duration: @if($package->duration == 7)1 Week @else 1 Month @endif</li>

                                <li>Minimum Amount: <b class="text-success">{{ config('app.currency').$package->min_amount }}</b></li>

                                <li>Maximum Amount: <b class="text-danger">{{ config('app.currency').$package->max_amount }}</b></li>

                                <li>Capital INCLUDED</li>

                            </ul>

                            <a href="{{ route('user.investments.select', $package->name) }}" class="btn @if($is_premium)btn-primary @else btn-success @endif mt-auto"><i class="fas fa-chart-line mr-2"></i> Choose Package</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
