{{-- Create new investment --}}
<div class="modal fade" id="addInvestment" tabindex="-1" role="dialog" aria-labelledby="addInvestmentLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-dark"> Create a new Investment campaign
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </a>
            </div>
            <div class="modal-body">
                <form class="splash-container" method="POST" action="{{ route('admin.manage.users.investment.create', $reg_user) }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="package" class="col-md-12 text-capitalize">Select Investment Package</label>
                                <select class="form-control" name="package" id="package">
                                    @foreach ($packages as $package)
                                        <option value="{{ $package->id }}">{{ ucfirst($package->name).' ($'.$package->min_amount.' - $'.$package->max_amount.', '.$package->percentage.'% Profit for '.$package->duration.' days.)' }}</option>
                                    @endforeach
                                </select>
                                @error('package')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group" style="position: relative">
                                <label for="start_date" class="col-md-12 text-uppercase">Start Date</label>
                                <input class="form-control input-datepicker @error('start_date') is-invalid @enderror" type="text" autocomplete="off" name="start_date" value="{{ old('start_date') }}" id="startdate" required>
                                @error('start_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="amount" class="col-md-12 text-uppercase">Amount</label>
                                <input class="form-control @error('amount') is-invalid @enderror" type="number" min="100" name="amount" value="{{ old('amount') }}" placeholder="100" required>
                                @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="amount" class="col-md-12 text-uppercase">Status</label>
                                <select name="status" id="status" class="form-control">
                                    @foreach ($statuses as $status)
                                        <option value="{{ $status->id }}">{{ ucfirst($status->title) }}</option>
                                    @endforeach
                                </select>
                                @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group pt-2">
                        <button class="btn btn-block btn-dark" type="submit" style="color: white">Submit</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-danger" data-dismiss="modal">Close</a>
            </div>
        </div>
    </div>
</div>
