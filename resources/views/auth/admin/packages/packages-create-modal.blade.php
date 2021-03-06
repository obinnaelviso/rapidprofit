{{-- Create new investment --}}
<div class="modal fade" style="margin-top: 50px" id="addInvestment" tabindex="-1" role="dialog" aria-labelledby="addInvestmentLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <i class="fa fa-plus" aria-hidden="true"></i> Fill in information of new package
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </a>
            </div>
            <div class="modal-body">
                <form class="splash-container" method="POST" action="{{ route('admin.packages.new') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name" class="col-md-12 col-form-label text-uppercase">Name</label>
                                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" placeholder="e.g Premium" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="description" class="col-md-12 col-form-label text-uppercase">Description (optional)</label>
                                <textarea name="description" class="form-control" rows="5" placeholder="Type description here...">{{ old('description') }}</textarea>
                                @error('description')
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
                                <label for="min_amount" class="col-md-12 col-form-label text-uppercase">Min Amount</label>
                                <input class="form-control @error('min_amount') is-invalid @enderror" type="number" min="0" name="min_amount" value="{{ old('min_amount') }}" placeholder="0.0" required>
                                @error('min_amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="max_amount" class="col-md-12 col-form-label text-uppercase">max Amount</label>
                                <input class="form-control @error('max_amount') is-invalid @enderror" type="number" min="0" name="max_amount" value="{{ old('max_amount') }}" placeholder="0.0" required>
                                @error('max_amount')
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
                                <label for="gift_bonus" class="col-md-12 col-form-label text-uppercase">Gift Bonus</label>
                                <input class="form-control @error('gift_bonus') is-invalid @enderror" type="number" min="0" name="gift_bonus" value="{{ old('gift_bonus') }}" placeholder="0.0" required>
                                @error('gift_bonus')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="percentage" class="col-md-12 col-form-label text-uppercase">Percentage</label>
                                <input class="form-control @error('percentage') is-invalid @enderror" type="number" min="1" name="percentage" value="{{ old('max_amount') }}" placeholder="e.g Premium" required>
                                @error('max_amount')
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
                                <label for="duration" class="col-md-12 col-form-label text-uppercase">Duration</label>
                                <select name="duration" id="duration" class="form-control">
                                    <option value="7"  selected>7 days</option>
                                    <option value="30">30 days</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group pt-2">
                        <button class="btn btn-block btn-dark" type="submit" style="color: white">Submit</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
            </div>
        </div>
    </div>
</div>
