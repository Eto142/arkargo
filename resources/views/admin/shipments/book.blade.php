@include('admin.header')

<div class="main-content">

    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h1>Book Cargo</h1>
            <p class="text-muted mb-0">Create a new shipment (Admin)</p>
        </div>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('shipment.store') }}">
        @csrf

        <!-- ================= SHIPMENT DETAILS ================= -->
        <div class="stat-card mb-4">
            <h5 class="section-title">Shipment Details</h5>

            <div class="row g-3">

                <div class="col-md-4">
                    <label class="form-label">Cargo Tracking NO</label>
                    <input type="text" name="awb_number" class="form-control" required>
                </div>



                <div class="col-md-4">
                    <label class="form-label">Origin</label>
                    <input type="text" name="origin" class="form-control" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Destination</label>
                    <input type="text" name="destination" class="form-control" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Shipment Date</label>
                    <input type="date" name="shipment_date" class="form-control" required>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Shipment Type</label>
                    <select name="shipment_type" class="form-select" required>
                        <option value="">Select</option>
                        <option>Document</option>
                        <option>Non-Document</option>
                        <option>Commercial</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Declared Value (Carriage)</label>
                    <input type="number" name="declared_carriage" class="form-control">
                </div>

                <div class="col-md-3">
                    <label class="form-label">Declared Value (Customs)</label>
                    <input type="number" name="declared_customs" class="form-control">
                </div>

                <div class="col-md-3">
                    <label class="form-label">Currency</label>
                    <select name="currency" class="form-select">
                        <option>GBP</option>
                        <option>USD</option>
                        <option>JPY</option>
                        <option>HKD</option>
                        <option>AED</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- ================= SHIPPER ================= -->
        <div class="stat-card mb-4">
            <h5 class="section-title">Shipper Information</h5>

            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label">Company Name</label>
                    <input name="shipper_company" class="form-control" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Department</label>
                    <input name="shipper_department" class="form-control">
                </div>

                <div class="col-md-4">
                    <label class="form-label">Contact Person</label>
                    <input name="shipper_contact" class="form-control" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Address</label>
                    <input name="shipper_address" class="form-control" required>
                </div>

                <div class="col-md-2">
                    <label class="form-label">City</label>
                    <input name="shipper_city" class="form-control" required>
                </div>

                <div class="col-md-2">
                    <label class="form-label">Country</label>
                    <input name="shipper_country" class="form-control" required>
                </div>

                <div class="col-md-2">
                    <label class="form-label">Phone</label>
                    <input name="shipper_phone" class="form-control" required>
                </div>

                <div class="col-md-2">
                    <label class="form-label">Origin Airport</label>
                    <input name="origin_airport" class="form-control" required>
                </div>
            </div>
        </div>

        <!-- ================= RECEIVER ================= -->
        <div class="stat-card mb-4">
            <h5 class="section-title">Receiver Information</h5>

            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label">Company Name</label>
                    <input name="receiver_company" class="form-control" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Contact Person</label>
                    <input name="receiver_contact" class="form-control" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Address</label>
                    <input name="receiver_address" class="form-control" required>
                </div>

                <div class="col-md-2">
                    <label class="form-label">City</label>
                    <input name="receiver_city" class="form-control" required>
                </div>

                <div class="col-md-2">
                    <label class="form-label">Country</label>
                    <input name="receiver_country" class="form-control" required>
                </div>

                <div class="col-md-2">
                    <label class="form-label">Destination Airport</label>
                    <input name="destination_airport" class="form-control" required>
                </div>
            </div>
        </div>

        <!-- ================= CARGO ================= -->
        <div class="stat-card mb-4">
            <h5 class="section-title">Cargo Details</h5>

            <div class="row g-3">
                <div class="col-md-2">
                    <label class="form-label">Pieces</label>
                    <input name="pieces" type="number" class="form-control" required>
                </div>

                <div class="col-md-2">
                    <label class="form-label">Gross Weight</label>
                    <input name="gross_weight" type="number" class="form-control" required>
                </div>

                <div class="col-md-2">
                    <label class="form-label">Chargeable Weight</label>
                    <input name="chargeable_weight" type="number" class="form-control" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Nature of Goods</label>
                    <input name="goods_description" class="form-control" required>
                </div>
            </div>
        </div>


         <!-- ================= STATUS ================= -->
       <div class="stat-card mb-4">
    <h5 class="section-title">Status</h5>

    <div class="row g-3">
        <div class="col-12">
            <label class="form-label">Status</label>
            <input name="status" type="text" class="form-control" required>
        </div>
    </div>
</div>



        <!-- ================= PAYMENT ================= -->
        <div class="stat-card">
            <h5 class="section-title">Payment & Insurance</h5>

            <div class="row g-3 align-items-end">
                <div class="col-md-3">
                    <label class="form-label">Transport Charges</label>
                    <select name="transport_charges" class="form-select">
                        <option>Prepaid</option>
                        <option>Collect</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Duties & Taxes</label>
                    <select name="duties_taxes" class="form-select">
                        <option>Shipper</option>
                        <option>Consignee</option>
                        <option>Importer</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Insurance Amount</label>
                    <input name="insurance_amount" type="number" class="form-control">
                </div>

                <div class="col-md-3">
                    <button class="btn btn-primary w-100">
                        Book Shipment
                    </button>
                </div>
            </div>
        </div>

    </form>
</div>

@include('admin.footer')







<!-- AWB Success Modal -->
@if(session('awb_number'))
<div class="modal fade show awb-success-modal" id="awbModal" tabindex="-1" aria-modal="true" role="dialog" style="display:block;">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content shadow-lg border-0 rounded-4">
            
            <div class="modal-body text-center p-4">
                <!-- Icon -->
                <div class="mb-3">
                    <span class="success-icon">✓</span>
                </div>

                <!-- Title -->
                <h5 class="fw-semibold mb-2">Shipment Booked</h5>
                <p class="text-muted small mb-3">
                    Your shipment has been registered successfully.
                </p>

                <!-- AWB -->
                <div class="awb-box mb-4">
                    <span class="label">AWB Number</span>
                    <strong>{{ session('awb_number') }}</strong>
                </div>

                <!-- Action -->
                <a href="{{ session('pdf_path') }}" class="btn btn-primary w-100" download>
                    Download Receipt (PDF)
                </a>

                <p class="text-muted small mt-3">
                    This window will close automatically.
                </p>
            </div>
        </div>
    </div>
</div>

<div class="modal-backdrop fade show"></div>

<script>
    setTimeout(() => {
        const modal = document.getElementById('awbModal');
        modal.classList.remove('show');
        modal.style.display = 'none';
        document.querySelector('.modal-backdrop')?.remove();
    }, 10000);
</script>
@endif


<script>
    // Trigger PDF download automatically
    document.addEventListener('DOMContentLoaded', function () {
        @if(session('pdf_path'))
        const link = document.createElement('a');
        link.href = "{{ session('pdf_path') }}";
        link.download = "awb_{{ session('awb_number') }}.pdf";
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        @endif
    });
</script>

<style>

    .awb-success-modal .modal-content {
    animation: scaleIn 0.25s ease-out;
}

@keyframes scaleIn {
    from {
        transform: scale(0.95);
        opacity: 0;
    }
    to {
        transform: scale(1);
        opacity: 1;
    }
}

.success-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 60px;
    height: 60px;
    background: #e6f7ef;
    color: #198754;
    font-size: 28px;
    font-weight: bold;
    border-radius: 50%;
}

.awb-box {
    background: #f8f9fa;
    border-radius: 12px;
    padding: 12px;
}

.awb-box .label {
    display: block;
    font-size: 12px;
    color: #6c757d;
    margin-bottom: 2px;
}

</style>

