@include('admin.header')

<div class="main-content">

    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h1>Edit Shipment</h1>
            <p class="text-muted mb-0">Update shipment details (Admin)</p>
        </div>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Validation Errors --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- UPDATE FORM -->
    <form method="POST" action="{{ route('shipment.update', $shipment->id) }}">
        @csrf
        @method('PUT')

        <!-- ================= SHIPMENT DETAILS ================= -->
        <div class="stat-card mb-4">
            <h5 class="section-title">Shipment Details</h5>

            <div class="row g-3">


                 <div class="col-md-4">
                    <label class="form-label">Cargo Tracking NO</label>
                    <input type="text" name="awb_number" class="form-control"
                           value="{{ old('awb_number', $shipment->awb_number) }}" >
                </div>

                <div class="col-md-4">
                    <label class="form-label">Origin</label>
                    <input type="text" name="origin" class="form-control"
                           value="{{ old('origin', $shipment->origin) }}" >
                </div>

                <div class="col-md-4">
                    <label class="form-label">Destination</label>
                    <input type="text" name="destination" class="form-control"
                           value="{{ old('destination', $shipment->destination) }}" >
                </div>

                <div class="col-md-4">
                    <label class="form-label">Shipment Date</label>
                    <input type="date" name="shipment_date" class="form-control"
                           value="{{ old('shipment_date', $shipment->shipment_date) }}" >
                </div>

                <div class="col-md-3">
                    <label class="form-label">Shipment Type</label>
                    <select name="shipment_type" class="form-select" >
                        @foreach(['Document','Non-Document','Commercial'] as $type)
                            <option value="{{ $type }}"
                                {{ old('shipment_type', $shipment->shipment_type) == $type ? 'selected' : '' }}>
                                {{ $type }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Declared Value (Carriage)</label>
                    <input type="number" name="declared_carriage" class="form-control"
                           value="{{ old('declared_carriage', $shipment->declared_carriage) }}">
                </div>

                <div class="col-md-3">
                    <label class="form-label">Declared Value (Customs)</label>
                    <input type="number" name="declared_customs" class="form-control"
                           value="{{ old('declared_customs', $shipment->declared_customs) }}">
                </div>

                <div class="col-md-3">
                    <label class="form-label">Currency</label>
                    <select name="currency" class="form-select">
                        @foreach(['GBP','USD','JPY','HKD','AED'] as $cur)
                            <option value="{{ $cur }}"
                                {{ old('currency', $shipment->currency) == $cur ? 'selected' : '' }}>
                                {{ $cur }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <!-- ================= SHIPPER ================= -->
        <div class="stat-card mb-4">
            <h5 class="section-title">Shipper Information</h5>

            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label">Shipper Company</label>
                    <input name="shipper_company" class="form-control"
                           value="{{ old('shipper_company', $shipment->shipper_company) }}" >
                </div>

                <div class="col-md-4">
                    <label class="form-label">Shipper Department</label>
                    <input name="shipper_department" class="form-control"
                           value="{{ old('shipper_department', $shipment->shipper_department) }}">
                </div>

                <div class="col-md-4">
                    <label class="form-label">Contact Person</label>
                    <input name="shipper_contact" class="form-control"
                           value="{{ old('shipper_contact', $shipment->shipper_contact) }}" >
                </div>

                <div class="col-md-4">
                    <label class="form-label">Address</label>
                    <input name="shipper_address" class="form-control"
                           value="{{ old('shipper_address', $shipment->shipper_address) }}" >
                </div>

                <div class="col-md-2">
                    <label class="form-label">City</label>
                    <input name="shipper_city" class="form-control"
                           value="{{ old('shipper_city', $shipment->shipper_city) }}" >
                </div>

                <div class="col-md-2">
                    <label class="form-label">Country</label>
                    <input name="shipper_country" class="form-control"
                           value="{{ old('shipper_country', $shipment->shipper_country) }}" >
                </div>

                <div class="col-md-2">
                    <label class="form-label">Phone</label>
                    <input name="shipper_phone" class="form-control"
                           value="{{ old('shipper_phone', $shipment->shipper_phone) }}" >
                </div>

                <div class="col-md-2">
                    <label class="form-label">Origin Airport</label>
                    <input name="origin_airport" class="form-control"
                           value="{{ old('origin_airport', $shipment->origin_airport) }}" >
                </div>
            </div>
        </div>

        <!-- ================= RECEIVER ================= -->
        <div class="stat-card mb-4">
            <h5 class="section-title">Receiver Information</h5>

            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label">Receiver Company</label>
                    <input name="receiver_company" class="form-control"
                           value="{{ old('receiver_company', $shipment->receiver_company) }}" >
                </div>

                <div class="col-md-4">
                    <label class="form-label">Receiver Contact</label>
                    <input name="receiver_contact" class="form-control"
                           value="{{ old('receiver_contact', $shipment->receiver_contact) }}" >
                </div>

                <div class="col-md-4">
                    <label class="form-label">Receiver Address</label>
                    <input name="receiver_address" class="form-control"
                           value="{{ old('receiver_address', $shipment->receiver_address) }}" >
                </div>

                <div class="col-md-2">
                    <label class="form-label">City</label>
                    <input name="receiver_city" class="form-control"
                           value="{{ old('receiver_city', $shipment->receiver_city) }}" >
                </div>

                <div class="col-md-2">
                    <label class="form-label">Country</label>
                    <input name="receiver_country" class="form-control"
                           value="{{ old('receiver_country', $shipment->receiver_country) }}" >
                </div>

                <div class="col-md-2">
                    <label class="form-label">Destination Airport</label>
                    <input name="destination_airport" class="form-control"
                           value="{{ old('destination_airport', $shipment->destination_airport) }}" >
                </div>
            </div>
        </div>

        <!-- ================= CARGO ================= -->
        <div class="stat-card mb-4">
            <h5 class="section-title">Cargo Details</h5>

            <div class="row g-3">
                <div class="col-md-2">
                    <label class="form-label">Pieces</label>
                    <input name="pieces" type="number" class="form-control"
                           value="{{ old('pieces', $shipment->pieces) }}" >
                </div>

                <div class="col-md-2">
                    <label class="form-label">Gross Weight</label>
                    <input name="gross_weight" type="number" class="form-control"
                           value="{{ old('gross_weight', $shipment->gross_weight) }}" >
                </div>

                <div class="col-md-2">
                    <label class="form-label">Chargeable Weight</label>
                    <input name="chargeable_weight" type="number" class="form-control"
                           value="{{ old('chargeable_weight', $shipment->chargeable_weight) }}" >
                </div>

                <div class="col-md-4">
                    <label class="form-label">Nature of Goods</label>
                    <input name="goods_description" class="form-control"
                           value="{{ old('goods_description', $shipment->goods_description) }}" >
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
                        @foreach(['Prepaid','Collect'] as $tc)
                            <option value="{{ $tc }}"
                                {{ old('transport_charges', $shipment->transport_charges) == $tc ? 'selected' : '' }}>
                                {{ $tc }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Duties & Taxes</label>
                    <select name="duties_taxes" class="form-select">
                        @foreach(['Shipper','Consignee','Importer'] as $dt)
                            <option value="{{ $dt }}"
                                {{ old('duties_taxes', $shipment->duties_taxes) == $dt ? 'selected' : '' }}>
                                {{ $dt }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Insurance Amount</label>
                    <input name="insurance_amount" type="number" class="form-control"
                           value="{{ old('insurance_amount', $shipment->insurance_amount) }}">
                </div>

                <div class="col-md-3 d-flex gap-2">
                    <button class="btn btn-success w-100">Update Shipment</button>
                    <a href="{{ route('admin.book') }}" class="btn btn-secondary w-100">Cancel</a>
                </div>
            </div>
        </div>

    </form>
</div>

@include('admin.footer')
