@include('admin.header')



<!-- Main Content -->
<div class="main-content">

    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h1>Shipments</h1>
            <p class="text-muted mb-0">Manage and track all registered shipments</p>
        </div>

        <div class="header-actions">
            <a href="#" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> New Shipment
            </a>
        </div>
    </div>

    <!-- Filters -->
    <div class="stat-card mb-4">
        <form method="GET" class="row g-3 align-items-end">

            <div class="col-md-3">
                <label class="form-label">AWB Number</label>
                <input type="text" name="awb" value="{{ request('awb') }}" class="form-control" placeholder="Search AWB">
            </div>

            <div class="col-md-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="">All Status</option>
                    <option value="Booked">Booked</option>
                    <option value="In Transit">In Transit</option>
                    <option value="Delivered">Delivered</option>
                </select>
            </div>

            <div class="col-md-3">
                <label class="form-label">Date</label>
                <input type="date" name="date" class="form-control">
            </div>

            <div class="col-md-3 d-flex gap-2">
                <button class="btn btn-primary w-100">
                    <i class="bi bi-search"></i> Filter
                </button>
                <a href="{{ route('admin.shipments') }}" class="btn btn-outline-secondary w-100">
                    Reset
                </a>
            </div>

        </form>
    </div>

    <!-- Shipments Table -->
    <div class="table-card">

        <div class="table-header">
            <h5>All Shipments</h5>
            <span class="text-muted">
                Showing {{ $shipments->count() }} of {{ $shipments->total() }}
            </span>
        </div>

        <div class="table-container">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>AWB</th>
                        <th>Origin</th>
                        <th>Destination</th>
                        <th>Shipper</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($shipments as $shipment)
                        <tr>
                            <td>
                                <strong>{{ $shipment->awb_number }}</strong>
                            </td>

                            <td>{{ $shipment->origin }}</td>

                            <td>{{ $shipment->destination }}</td>

                            <td>{{ $shipment->shipper_company }}</td>

                            <td>
                                <span class="status-badge
                                    @if($shipment->status == 'Delivered') status-delivered
                                    @elseif($shipment->status == 'In Transit') status-transit
                                    @else status-pending
                                    @endif
                                ">
                                    {{ $shipment->status }}
                                </span>
                            </td>

                            <td>{{ $shipment->shipment_date->format('d M Y') }}</td>

                             <td>
    <div class="d-flex gap-1 flex-wrap">
        <!-- View Shipment -->
        <a href="{{ route('admin.shipments.show', $shipment->id) }}" 
           class="btn btn-sm btn-primary" 
           title="View">
            <i class="bi bi-eye me-1"></i> View
        </a>

        <!-- Edit Shipment -->
        <a href="{{ route('shipment.edit', $shipment->id) }}"
           class="btn btn-sm btn-primary">
            <i class="bi bi-pencil-square me-1"></i> Edit
        </a>

        <!-- Update Shipping History -->
        <a href="{{ route('shipment.history.edit', $shipment->id) }}"
           class="btn btn-sm btn-primary">
            <i class="bi bi-clock-history me-1"></i> Update History
        </a>

        <!-- Delete Shipment -->
        <form action="{{ route('shipment.destroy', $shipment->id) }}" method="POST"
              onsubmit="return confirm('Are you sure you want to delete this shipment?')">
            @csrf
            @method('DELETE')
            <button class="btn btn-sm btn-danger">
                <i class="bi bi-trash me-1"></i> Delete
            </button>
        </form>
    </div>
</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">
                                No shipments found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="p-3 border-top">
            {{ $shipments->links('pagination::bootstrap-5') }}
        </div>

    </div>

</div>

@include('admin.footer')