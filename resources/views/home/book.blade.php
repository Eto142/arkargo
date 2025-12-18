@include('home.header')
    <!-- Hero Carousel -->
    <div id="heroCarousel" class="carousel slide hero-carousel" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('assets/images/air-cargo1.webp') }}" alt="Arkargo Aircraft">
                <div class="carousel-caption">
                    <h1>Keeps business moving!</h1>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/images/air-cargo.jpg') }}" alt="Cargo Operations">
                <div class="carousel-caption">
                    <h1>Global Cargo Solutions</h1>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/images/air-cargo2.avif') }}" alt="Logistics Network">
                <div class="carousel-caption">
                    <h1>Connecting the World</h1>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
    
    <!-- Tab Section -->
    <div class="container tab-section">
        <div class="tab-buttons">
            <button class="tab-btn" onclick="showTab('book-cargo')">
                <i class="bi bi-box-seam"></i>
                <span>Book Cargo</span>
            </button>
            {{-- <button class="tab-btn" onclick="showTab('tracking')">
                <i class="bi bi-geo-alt"></i>
                <span>Shipment Tracking</span>
            </button> --}}
            {{-- <button class="tab-btn active" onclick="showTab('flight-schedule')">
                <i class="bi bi-airplane"></i>
                <span>Flight Schedule</span>
            </button> --}}
        </div>
        
        <div class="tab-content-wrapper">
            <!-- Book Cargo Tab -->
            <div id="book-cargo" class="tab-pane" style="display: none;">
           
                
                <div class="row g-3 align-items-end">

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

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('shipment.store') }}">
        @csrf

        {{-- Shipment Details --}}
        <div class="card mb-4 shadow-sm border-secondary">
            <div class="card-header bg-light text-dark">Shipment Details</div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Origin</label>
                        <input type="text" name="origin" class="form-control" value="{{ old('origin') }}" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Destination</label>
                        <input type="text" name="destination" class="form-control" value="{{ old('destination') }}" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Shipment Date</label>
                        <input type="date" name="shipment_date" class="form-control" value="{{ old('shipment_date') }}" required>
                    </div>
                </div>

                <div class="row g-3 mt-3">
                    <div class="col-md-3">
                        <label class="form-label">Shipment Type</label>
                        <select name="shipment_type" class="form-select" required>
                            <option value="">Select</option>
                            <option value="Document" {{ old('shipment_type')=='Document' ? 'selected' : '' }}>Document</option>
                            <option value="Non-Document" {{ old('shipment_type')=='Non-Document' ? 'selected' : '' }}>Non-Document</option>
                            <option value="Commercial" {{ old('shipment_type')=='Commercial' ? 'selected' : '' }}>Commercial</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Declared Value (Carriage)</label>
                        <input type="number" name="declared_carriage" class="form-control" value="{{ old('declared_carriage') }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Declared Value (Customs)</label>
                        <input type="number" name="declared_customs" class="form-control" value="{{ old('declared_customs') }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Currency</label>
                        <select name="currency" class="form-select" required>
                            <option value="USD" {{ old('currency')=='USD' ? 'selected' : '' }}>USD</option>
                            <option value="HKD" {{ old('currency')=='HKD' ? 'selected' : '' }}>HKD</option>
                            <option value="JPY" {{ old('currency')=='JPY' ? 'selected' : '' }}>JPY</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        {{-- Shipper Information --}}
        <div class="card mb-4 shadow-sm border-secondary">
            <div class="card-header bg-light text-dark">Shipper Information</div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <input name="shipper_company" class="form-control" placeholder="Company Name" value="{{ old('shipper_company') }}" required>
                    </div>
                    <div class="col-md-4">
                        <input name="shipper_department" class="form-control" placeholder="Department" value="{{ old('shipper_department') }}">
                    </div>
                    <div class="col-md-4">
                        <input name="shipper_contact" class="form-control" placeholder="Contact Person" value="{{ old('shipper_contact') }}" required>
                    </div>
                </div>

                <div class="row g-3 mt-3">
                    <div class="col-md-4">
                        <input name="shipper_address" class="form-control" placeholder="Address" value="{{ old('shipper_address') }}" required>
                    </div>
                    <div class="col-md-2">
                        <input name="shipper_city" class="form-control" placeholder="City" value="{{ old('shipper_city') }}" required>
                    </div>
                    <div class="col-md-2">
                        <input name="shipper_country" class="form-control" placeholder="Country" value="{{ old('shipper_country') }}" required>
                    </div>
                    <div class="col-md-2">
                        <input name="shipper_phone" class="form-control" placeholder="Phone" value="{{ old('shipper_phone') }}" required>
                    </div>
                </div>
            </div>
        </div>

        {{-- Receiver Information --}}
        <div class="card mb-4 shadow-sm border-secondary">
            <div class="card-header bg-light text-dark">Receiver Information</div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <input name="receiver_company" class="form-control" placeholder="Company Name" value="{{ old('receiver_company') }}" required>
                    </div>
                    <div class="col-md-4">
                        <input name="receiver_contact" class="form-control" placeholder="Contact Person" value="{{ old('receiver_contact') }}" required>
                    </div>
                </div>
                <div class="row g-3 mt-3">
                    <div class="col-md-4">
                        <input name="receiver_address" class="form-control" placeholder="Address" value="{{ old('receiver_address') }}" required>
                    </div>
                    <div class="col-md-2">
                        <input name="receiver_city" class="form-control" placeholder="City" value="{{ old('receiver_city') }}" required>
                    </div>
                    <div class="col-md-2">
                        <input name="receiver_country" class="form-control" placeholder="Country" value="{{ old('receiver_country') }}" required>
                    </div>
                </div>
            </div>
        </div>

        {{-- Cargo Details --}}
        <div class="card mb-4 shadow-sm border-secondary">
            <div class="card-header bg-light text-dark">Cargo Details</div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-2">
                        <input name="pieces" type="number" class="form-control" placeholder="Pieces" value="{{ old('pieces') }}" required>
                    </div>
                    <div class="col-md-2">
                        <input name="gross_weight" type="number" class="form-control" placeholder="Gross Weight" value="{{ old('gross_weight') }}" required>
                    </div>
                    <div class="col-md-2">
                        <input name="chargeable_weight" type="number" class="form-control" placeholder="Chargeable Weight" value="{{ old('chargeable_weight') }}" required>
                    </div>
                    <div class="col-md-3">
                        <input name="goods_description" class="form-control" placeholder="Nature of Goods" value="{{ old('goods_description') }}" required>
                    </div>
                </div>
            </div>
        </div>


        {{-- Payment & Insurance --}}
        <div class="card mb-4 shadow-sm border-secondary">
            <div class="card-header bg-light text-dark">Payment & Insurance</div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-3">
                        <select name="transport_charges" class="form-select" required>
                            <option value="Prepaid" {{ old('transport_charges')=='Prepaid' ? 'selected' : '' }}>Prepaid</option>
                            <option value="Collect" {{ old('transport_charges')=='Collect' ? 'selected' : '' }}>Collect</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select name="duties_taxes" class="form-select" required>
                            <option value="Shipper" {{ old('duties_taxes')=='Shipper' ? 'selected' : '' }}>Shipper</option>
                            <option value="Consignee" {{ old('duties_taxes')=='Consignee' ? 'selected' : '' }}>Consignee</option>
                            <option value="Importer" {{ old('duties_taxes')=='Importer' ? 'selected' : '' }}>Importer</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <input name="insurance_amount" type="number" class="form-control" placeholder="Insurance" value="{{ old('insurance_amount') }}">
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-dark w-100">BOOK SHIPMENT</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
                    </div>
                </div>
            </div>
            
            <!-- Tracking Tab -->

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

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
           <div class="tab-content-wrapper">
            <div id="tracking" class="tab-pane" style="display: none;">

                   
                <div class="row g-3 align-items-end">

                     <div class="row g-3">
                    <div class="col-md-12">
                        <h3>Track Your Shipment</h3>
                        <p>Enter your AWB number to track your cargo</p>
                    </div>
                </div>
                <form method="POST" action="{{ route('shipment.store') }}">
        @csrf

        {{-- Shipment Details --}}
        <div class="card mb-4 shadow-sm border-secondary">
            <div class="card-header bg-light text-dark">Shipment Details</div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Origin</label>
                        <input type="text" name="origin" class="form-control" value="{{ old('origin') }}" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Destination</label>
                        <input type="text" name="destination" class="form-control" value="{{ old('destination') }}" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Shipment Date</label>
                        <input type="date" name="shipment_date" class="form-control" value="{{ old('shipment_date') }}" required>
                    </div>
                </div>

                <div class="row g-3 mt-3">
                    <div class="col-md-3">
                        <label class="form-label">Shipment Type</label>
                        <select name="shipment_type" class="form-select" required>
                            <option value="">Select</option>
                            <option value="Document" {{ old('shipment_type')=='Document' ? 'selected' : '' }}>Document</option>
                            <option value="Non-Document" {{ old('shipment_type')=='Non-Document' ? 'selected' : '' }}>Non-Document</option>
                            <option value="Commercial" {{ old('shipment_type')=='Commercial' ? 'selected' : '' }}>Commercial</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Declared Value (Carriage)</label>
                        <input type="number" name="declared_carriage" class="form-control" value="{{ old('declared_carriage') }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Declared Value (Customs)</label>
                        <input type="number" name="declared_customs" class="form-control" value="{{ old('declared_customs') }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Currency</label>
                        <select name="currency" class="form-select" required>
                            <option value="USD" {{ old('currency')=='USD' ? 'selected' : '' }}>USD</option>
                            <option value="HKD" {{ old('currency')=='HKD' ? 'selected' : '' }}>HKD</option>
                            <option value="JPY" {{ old('currency')=='JPY' ? 'selected' : '' }}>JPY</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        {{-- Shipper Information --}}
        <div class="card mb-4 shadow-sm border-secondary">
            <div class="card-header bg-light text-dark">Shipper Information</div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <input name="shipper_company" class="form-control" placeholder="Company Name" value="{{ old('shipper_company') }}" required>
                    </div>
                    <div class="col-md-4">
                        <input name="shipper_department" class="form-control" placeholder="Department" value="{{ old('shipper_department') }}">
                    </div>
                    <div class="col-md-4">
                        <input name="shipper_contact" class="form-control" placeholder="Contact Person" value="{{ old('shipper_contact') }}" required>
                    </div>
                </div>

                <div class="row g-3 mt-3">
                    <div class="col-md-4">
                        <input name="shipper_address" class="form-control" placeholder="Address" value="{{ old('shipper_address') }}" required>
                    </div>
                    <div class="col-md-2">
                        <input name="shipper_city" class="form-control" placeholder="City" value="{{ old('shipper_city') }}" required>
                    </div>
                    <div class="col-md-2">
                        <input name="shipper_country" class="form-control" placeholder="Country" value="{{ old('shipper_country') }}" required>
                    </div>
                    <div class="col-md-2">
                        <input name="shipper_phone" class="form-control" placeholder="Phone" value="{{ old('shipper_phone') }}" required>
                    </div>
                </div>
            </div>
        </div>

        {{-- Receiver Information --}}
        <div class="card mb-4 shadow-sm border-secondary">
            <div class="card-header bg-light text-dark">Receiver Information</div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <input name="receiver_company" class="form-control" placeholder="Company Name" value="{{ old('receiver_company') }}" required>
                    </div>
                    <div class="col-md-4">
                        <input name="receiver_contact" class="form-control" placeholder="Contact Person" value="{{ old('receiver_contact') }}" required>
                    </div>
                </div>
                <div class="row g-3 mt-3">
                    <div class="col-md-4">
                        <input name="receiver_address" class="form-control" placeholder="Address" value="{{ old('receiver_address') }}" required>
                    </div>
                    <div class="col-md-2">
                        <input name="receiver_city" class="form-control" placeholder="City" value="{{ old('receiver_city') }}" required>
                    </div>
                    <div class="col-md-2">
                        <input name="receiver_country" class="form-control" placeholder="Country" value="{{ old('receiver_country') }}" required>
                    </div>
                </div>
            </div>
        </div>

        {{-- Cargo Details --}}
        <div class="card mb-4 shadow-sm border-secondary">
            <div class="card-header bg-light text-dark">Cargo Details</div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-2">
                        <input name="pieces" type="number" class="form-control" placeholder="Pieces" value="{{ old('pieces') }}" required>
                    </div>
                    <div class="col-md-2">
                        <input name="gross_weight" type="number" class="form-control" placeholder="Gross Weight" value="{{ old('gross_weight') }}" required>
                    </div>
                    <div class="col-md-2">
                        <input name="chargeable_weight" type="number" class="form-control" placeholder="Chargeable Weight" value="{{ old('chargeable_weight') }}" required>
                    </div>
                    <div class="col-md-3">
                        <input name="goods_description" class="form-control" placeholder="Nature of Goods" value="{{ old('goods_description') }}" required>
                    </div>
                </div>
            </div>
        </div>

        {{-- Payment & Insurance --}}
        <div class="card mb-4 shadow-sm border-secondary">
            <div class="card-header bg-light text-dark">Payment & Insurance</div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-3">
                        <select name="transport_charges" class="form-select" required>
                            <option value="Prepaid" {{ old('transport_charges')=='Prepaid' ? 'selected' : '' }}>Prepaid</option>
                            <option value="Collect" {{ old('transport_charges')=='Collect' ? 'selected' : '' }}>Collect</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select name="duties_taxes" class="form-select" required>
                            <option value="Shipper" {{ old('duties_taxes')=='Shipper' ? 'selected' : '' }}>Shipper</option>
                            <option value="Consignee" {{ old('duties_taxes')=='Consignee' ? 'selected' : '' }}>Consignee</option>
                            <option value="Importer" {{ old('duties_taxes')=='Importer' ? 'selected' : '' }}>Importer</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <input name="insurance_amount" type="number" class="form-control" placeholder="Insurance" value="{{ old('insurance_amount') }}">
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-dark w-100">BOOK SHIPMENT</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
        </div>
    </div>

</div>

            </div>

            </div>
            
            <!-- Flight Schedule Tab -->
             <!-- Validation Errors -->
          


            <div class="tab-content-wrapper">

            <div id="flight-schedule" class="tab-pane" style="display: block;">
                 <form method="POST" action="{{ route('shipment.store') }}">
        @csrf

        {{-- Shipment Details --}}
        <div class="card mb-4 shadow-sm border-secondary">
            <div class="card-header bg-light text-dark">Shipment Details</div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Origin</label>
                        <input type="text" name="origin" class="form-control" value="{{ old('origin') }}" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Destination</label>
                        <input type="text" name="destination" class="form-control" value="{{ old('destination') }}" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Shipment Date</label>
                        <input type="date" name="shipment_date" class="form-control" value="{{ old('shipment_date') }}" required>
                    </div>
                </div>

                <div class="row g-3 mt-3">
                    <div class="col-md-3">
                        <label class="form-label">Shipment Type</label>
                        <select name="shipment_type" class="form-select" required>
                            <option value="">Select</option>
                            <option value="Document" {{ old('shipment_type')=='Document' ? 'selected' : '' }}>Document</option>
                            <option value="Non-Document" {{ old('shipment_type')=='Non-Document' ? 'selected' : '' }}>Non-Document</option>
                            <option value="Commercial" {{ old('shipment_type')=='Commercial' ? 'selected' : '' }}>Commercial</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Declared Value (Carriage)</label>
                        <input type="number" name="declared_carriage" class="form-control" value="{{ old('declared_carriage') }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Declared Value (Customs)</label>
                        <input type="number" name="declared_customs" class="form-control" value="{{ old('declared_customs') }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Currency</label>
                        <select name="currency" class="form-select" required>
                            <option value="USD" {{ old('currency')=='USD' ? 'selected' : '' }}>USD</option>
                            <option value="HKD" {{ old('currency')=='HKD' ? 'selected' : '' }}>HKD</option>
                            <option value="JPY" {{ old('currency')=='JPY' ? 'selected' : '' }}>JPY</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        {{-- Shipper Information --}}
        <div class="card mb-4 shadow-sm border-secondary">
            <div class="card-header bg-light text-dark">Shipper Information</div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <input name="shipper_company" class="form-control" placeholder="Company Name" value="{{ old('shipper_company') }}" required>
                    </div>
                    <div class="col-md-4">
                        <input name="shipper_department" class="form-control" placeholder="Department" value="{{ old('shipper_department') }}">
                    </div>
                    <div class="col-md-4">
                        <input name="shipper_contact" class="form-control" placeholder="Contact Person" value="{{ old('shipper_contact') }}" required>
                    </div>
                </div>

                <div class="row g-3 mt-3">
                    <div class="col-md-4">
                        <input name="shipper_address" class="form-control" placeholder="Address" value="{{ old('shipper_address') }}" required>
                    </div>
                    <div class="col-md-2">
                        <input name="shipper_city" class="form-control" placeholder="City" value="{{ old('shipper_city') }}" required>
                    </div>
                    <div class="col-md-2">
                        <input name="shipper_country" class="form-control" placeholder="Country" value="{{ old('shipper_country') }}" required>
                    </div>
                    <div class="col-md-2">
                        <input name="shipper_phone" class="form-control" placeholder="Phone" value="{{ old('shipper_phone') }}" required>
                    </div>
                </div>
            </div>
        </div>

        {{-- Receiver Information --}}
        <div class="card mb-4 shadow-sm border-secondary">
            <div class="card-header bg-light text-dark">Receiver Information</div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <input name="receiver_company" class="form-control" placeholder="Company Name" value="{{ old('receiver_company') }}" required>
                    </div>
                    <div class="col-md-4">
                        <input name="receiver_contact" class="form-control" placeholder="Contact Person" value="{{ old('receiver_contact') }}" required>
                    </div>
                </div>
                <div class="row g-3 mt-3">
                    <div class="col-md-4">
                        <input name="receiver_address" class="form-control" placeholder="Address" value="{{ old('receiver_address') }}" required>
                    </div>
                    <div class="col-md-2">
                        <input name="receiver_city" class="form-control" placeholder="City" value="{{ old('receiver_city') }}" required>
                    </div>
                    <div class="col-md-2">
                        <input name="receiver_country" class="form-control" placeholder="Country" value="{{ old('receiver_country') }}" required>
                    </div>
                </div>
            </div>
        </div>

        {{-- Cargo Details --}}
        <div class="card mb-4 shadow-sm border-secondary">
            <div class="card-header bg-light text-dark">Cargo Details</div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-2">
                        <input name="pieces" type="number" class="form-control" placeholder="Pieces" value="{{ old('pieces') }}" required>
                    </div>
                    <div class="col-md-2">
                        <input name="gross_weight" type="number" class="form-control" placeholder="Gross Weight" value="{{ old('gross_weight') }}" required>
                    </div>
                    <div class="col-md-2">
                        <input name="chargeable_weight" type="number" class="form-control" placeholder="Chargeable Weight" value="{{ old('chargeable_weight') }}" required>
                    </div>
                    <div class="col-md-3">
                        <input name="goods_description" class="form-control" placeholder="Nature of Goods" value="{{ old('goods_description') }}" required>
                    </div>
                </div>
            </div>
        </div>

        {{-- Payment & Insurance --}}
        <div class="card mb-4 shadow-sm border-secondary">
            <div class="card-header bg-light text-dark">Payment & Insurance</div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-3">
                        <select name="transport_charges" class="form-select" required>
                            <option value="Prepaid" {{ old('transport_charges')=='Prepaid' ? 'selected' : '' }}>Prepaid</option>
                            <option value="Collect" {{ old('transport_charges')=='Collect' ? 'selected' : '' }}>Collect</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select name="duties_taxes" class="form-select" required>
                            <option value="Shipper" {{ old('duties_taxes')=='Shipper' ? 'selected' : '' }}>Shipper</option>
                            <option value="Consignee" {{ old('duties_taxes')=='Consignee' ? 'selected' : '' }}>Consignee</option>
                            <option value="Importer" {{ old('duties_taxes')=='Importer' ? 'selected' : '' }}>Importer</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <input name="insurance_amount" type="number" class="form-control" placeholder="Insurance" value="{{ old('insurance_amount') }}">
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-dark w-100">BOOK SHIPMENT</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
</div>
</div>

        </div>
    </div>
    
    
  @include('home.footer')