@include('admin.header')

<div class="main-content">

    <div class="page-header mb-4">
        <h1 class="mb-1">Edit Shipping History</h1>
        <p class="text-muted mb-0">Shipment AWB: <strong>{{ $history->shipment->awb_number }}</strong></p>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <form method="POST" action="{{ route('shipment.history.entry.update', $history->id) }}">
                @csrf
                @method('PUT')
                <div class="row g-3">
                    <div class="col-md-2">
                        <label class="form-label">Date</label>
                        <input type="date" name="date" class="form-control" value="{{ old('date', $history->date) }}" required>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Time</label>
                        <input type="time" name="time" class="form-control" value="{{ old('time', $history->time) }}" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Location</label>
                        <input type="text" name="location" class="form-control" value="{{ old('location', $history->location) }}" required>
                    </div>
                    <div class="col-12 col-md-2">
                        <label class="form-label">Status</label>
                        <input type="text" name="status" class="form-control" value="{{ old('status', $history->status) }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Remarks</label>
                        <input type="text" name="remarks" class="form-control" value="{{ old('remarks', $history->remarks) }}">
                    </div>
                    <div class="col-md-12 d-grid mt-3">
                        <button type="submit" class="btn btn-success">Update History Entry</button>
                        <a href="{{ route('shipment.history.edit', $history->shipment_id) }}" class="btn btn-secondary mt-2">Back to History</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

@include('admin.footer')
