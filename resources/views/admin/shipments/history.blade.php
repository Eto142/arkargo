@include('admin.header')

<div class="main-content">

    <div class="page-header mb-4">
        <h1 class="mb-1">Update Shipping History</h1>
        <p class="text-muted mb-0">Shipment AWB: <strong>{{ $shipment->awb_number }}</strong></p>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Add History Form -->
    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <h5 class="card-title mb-3">Add New History Entry</h5>

            <form method="POST" action="{{ route('shipment.history.add', $shipment->id) }}">
                @csrf
                <div class="row g-3">
                    <div class="col-12 col-md-2">
                        <label class="form-label">Date</label>
                        <input type="date" name="date" class="form-control" value="{{ date('Y-m-d') }}" required>
                    </div>
                    <div class="col-12 col-md-2">
                        <label class="form-label">Time</label>
                        <input type="time" name="time" class="form-control" value="{{ date('H:i') }}" required>
                    </div>
                    <div class="col-12 col-md-3">
                        <label class="form-label">Location</label>
                        <input type="text" name="location" class="form-control" required>
                    </div>
                    <div class="col-12 col-md-2">
                        <label class="form-label">Status</label>
                        <input type="text" name="status" class="form-control" placeholder="In Transit, Delivered..." required>
                    </div>
                    <div class="col-12 col-md-3">
                        <label class="form-label">Remarks</label>
                        <input type="text" name="remarks" class="form-control" placeholder="Optional">
                    </div>
                    <div class="col-12 col-md-12 col-lg-1 d-grid">
                        <button type="submit" class="btn btn-primary mt-2 mt-md-0">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- History Table -->
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title mb-3">Shipment History</h5>
            <div class="table-responsive">
                <table class="table table-bordered table-striped mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>Remarks</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($histories as $history)
                        <tr>
                            <td>{{ $history->date }}</td>
                            <td>{{ $history->time }}</td>
                            <td>{{ $history->location }}</td>
                            <td>
                                {{ $history->status }}
                            </td>
                            <td>{{ $history->remarks ?? '-' }}</td>
                            <td class="d-flex gap-1 flex-wrap justify-content-center">
                                <!-- Edit -->
                                <a href="{{ route('shipment.history.entry.edit', $history->id) }}" 
                                   class="btn btn-sm btn-success">
                                   <i class="bi bi-pencil-square me-1"></i>Edit
                                </a>

                                <!-- Delete -->
                                <form method="POST" action="{{ route('shipment.history.destroy', $history->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this entry?')">
                                        <i class="bi bi-trash me-1"></i>Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">No history found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@include('admin.footer')
