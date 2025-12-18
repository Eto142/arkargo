@include('admin.header')
<!-- Main Content -->
<div class="main-content">

    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h1>Shipment Details</h1>
            <p class="text-muted mb-0">Air Waybill: <strong>{{ $shipment->awb_number }}</strong></p>
        </div>

        <a href="{{ route('admin.shipments') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Back to Shipments
        </a>
    </div>

    <!-- Status & Action Row -->
    <h5 class="mb-3">Status</h5>
    <div class="stat-card mb-4">
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">

            <span class="status-badge status-transit">
                <i class="bi bi-truck"></i> {{ $shipment->status }}
            </span>

            <form action="{{ route('admin.shipments.status', $shipment->id) }}" method="POST" class="d-flex gap-2">
                @csrf
               
    <input
        type="text"
        name="status"
        class="form-control form-control-sm"
        value="{{ $shipment->status }}"
        placeholder="Enter shipment status"
        required
    >
                <button class="btn btn-primary btn-sm">
                    Update
                </button>
            </form>

        </div>
    </div>

    <!-- Details Grid -->
    <div class="row g-4">

        <!-- Shipment Info -->
        <div class="col-lg-6">
            <div class="stat-card">
                <h5 class="mb-3">Shipment Information</h5>

                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Origin</span>
                    <strong>{{ $shipment->origin }}</strong>
                </div>

                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Destination</span>
                    <strong>{{ $shipment->destination }}</strong>
                </div>

                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Shipment Date</span>
                    <strong>{{ $shipment->shipment_date->format('d M Y') }}</strong>
                </div>

                <div class="d-flex justify-content-between">
                    <span class="text-muted">Type</span>
                    <strong>{{ $shipment->shipment_type }}</strong>
                </div>
            </div>
        </div>

        <!-- Cargo -->
        <div class="col-lg-6">
            <div class="stat-card">
                <h5 class="mb-3">Cargo Details</h5>

                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Pieces</span>
                    <strong>{{ $shipment->pieces }}</strong>
                </div>

                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Gross Weight</span>
                    <strong>{{ $shipment->gross_weight }} kg</strong>
                </div>

                <div class="d-flex justify-content-between">
                    <span class="text-muted">Chargeable Weight</span>
                    <strong>{{ $shipment->chargeable_weight }} kg</strong>
                </div>
            </div>
        </div>

        <!-- Shipper -->
      <div class="col-lg-6">
    <div class="stat-card">
        <h5 class="mb-3">Shipper</h5>

        <p class="mb-1"><strong>Company:</strong> {{ $shipment->shipper_company }}</p>
        <p class="mb-1"><strong>Contact:</strong> {{ $shipment->shipper_contact }}</p>
        <p class="mb-0 text-muted">
            <strong>Address:</strong> {{ $shipment->shipper_address }}, 
            {{ $shipment->shipper_city }}, 
            {{ $shipment->shipper_country }}<br>
            <strong>Origin Airport:</strong> {{ $shipment->origin_airport }}
        </p>
    </div>
</div>

<!-- Receiver -->
<div class="col-lg-6">
    <div class="stat-card">
        <h5 class="mb-3">Receiver</h5>

        <p class="mb-1"><strong>Company:</strong> {{ $shipment->receiver_company }}</p>
        <p class="mb-1"><strong>Contact:</strong> {{ $shipment->receiver_contact }}</p>
        <p class="mb-0 text-muted">
            <strong>Address:</strong> {{ $shipment->receiver_address }}, 
            {{ $shipment->receiver_city }}, 
            {{ $shipment->receiver_country }}<br>
            <strong>Destination Airport:</strong> {{ $shipment->destination_airport }}
        </p>
    </div>
</div>

        <!-- Financials -->
        <div class="col-12">
            <div class="stat-card">
                <h5 class="mb-3">Declared Values & Charges</h5>

                <div class="row text-center">
                    <div class="col-md-4">
                        <p class="text-muted mb-1">Declared (Carriage)</p>
                        <h6>{{ $shipment->declared_carriage }} {{ $shipment->currency }}</h6>
                    </div>
                    <div class="col-md-4">
                        <p class="text-muted mb-1">Declared (Customs)</p>
                        <h6>{{ $shipment->declared_customs }} {{ $shipment->currency }}</h6>
                    </div>
                    <div class="col-md-4">
                        <p class="text-muted mb-1">Insurance</p>
                        <h6>{{ $shipment->insurance_amount ?? 'N/A' }}</h6>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@include('admin.footer')