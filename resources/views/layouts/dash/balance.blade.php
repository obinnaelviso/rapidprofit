<div class="col-md-4">
    <a href="javascript:void(0)" class="widget">
        <div class="widget-content widget-content-mini text-right clearfix">
            <div class="widget-icon pull-left themed-background-success">
                <i class="gi gi-money text-light-op"></i>
            </div>
            <h2 class="widget-heading text-success h3">
                <strong>{{ config('app.currency') }}<span data-toggle="counter" data-to="{{ $user->wallet->amount }}"></span></strong>
            </h2>
            <span class="text-muted">YOUR BALANCE</span>
        </div>
    </a>
</div>
