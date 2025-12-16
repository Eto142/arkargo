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

            {{-- <button class="tab-btn" onclick="showTab('book-cargo')">
                <i class="bi bi-box-seam"></i>
                <span>Book Cargo</span>
            </button> --}}

            <button class="tab-btn" onclick="window.location='{{ url('contact') }}'">
    <i class="bi bi-box-seam"></i>
    <span>Book Cargo</span>
</button>


            <button class="tab-btn" onclick="showTab('tracking')">
                <i class="bi bi-geo-alt"></i>
                <span>Shipment Tracking</span>
            </button>
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
                <form method="POST" action="{{ route('shipment.track') }}">
             @csrf
    <div class="col-12">
        <label for="tracking_number" class="form-label">Track Your Shipment</label>
        <div class="input-group">
            <input 
                type="text" 
                name="awb_number"
                id="tracking_number" 
                class="form-control form-control-lg"
                placeholder="Enter your tracking number"
            >
            <div class="col-md-3">
                        <button type="submit" class="btn btn-dark w-100">Track</button>
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
                 <form method="POST" action="{{ route('shipment.track') }}">
             @csrf
               <div class="row g-3 align-items-end">
    <div class="col-12">
        <label for="tracking_number" class="form-label">Track Your Shipment</label>
        <div class="input-group">
            <input 
                type="text" 
                id="tracking_number" 
                class="form-control form-control-lg"
                name="awb_number"
                placeholder="Enter your tracking number"
            >
            <div class="col-md-3">
                        <button type="submit" class="btn btn-dark w-100">Track</button>
                    </div>
        </div>
    </form>
    </div>
</div>
</div>

        </div>
    </div>
    
    <!-- Highlights Section -->
    <section class="highlights-section">
        <div class="container">
            <h2>Highlights</h2>
            <div id="highlightsCarousel" class="carousel slide highlight-carousel" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="highlight-card">
                                    <img src="{{ asset('assets/images/plane.avif') }}" alt="Singapore to Kuala Lumpur Route">
                                    <div class="highlight-card-body">
                                        <h3>Fly your goods from SIN to KUL from SGD 0.35 per kg</h3>
                                        <p>Take advantage of our competitive rates for shipments between Singapore and Kuala Lumpur. Book now on CargoAI platform.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="highlight-card">
                                    <img src="{{ asset('assets/images/travel.webp') }}" alt="Chen Xing and Xiao Yue">
                                    <div class="highlight-card-body">
                                        <h3>A proud flight for the nation: Arkargo brings Chen Xing & Xiao Yue to Malaysia</h3>
                                        <p>Arkargo successfully transported the beloved giant pandas to their new home in Malaysia, marking a significant moment in wildlife conservation.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#highlightsCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#highlightsCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>
    </section>
    
    <!-- Services Section -->
    <section class="services-section">
        <div class="container">
            <div class="services-header">
                <h4>WE SPECIALIZE IN CARGO SHIPPING</h4>
                <h2>Manage Your Complex Logistics<br>So You Can Focus</h2>
                <p>Arkargo is the world's leading global logistics provider. We support industry and trade in the global exchange of goods through air transport, ensuring efficiency and reliability at every step.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="service-card">
                        <img src="{{ asset('assets/images/global-mail.avif') }}" alt="Global Mail Service">
                        <div class="service-card-overlay">
                            <i class="bi bi-airplane"></i>
                            <h3>GLOBAL MAIL</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-card">
                        <img src="{{ asset('assets/images/Charter-Services.avif') }}" alt="Charter Services">
                        <div class="service-card-overlay">
                            <i class="bi bi-truck"></i>
                            <h3>CHARTER SERVICES</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-card">
                        <img src="{{ asset('assets/images/img1.jpg') }}" alt="MH Centigrade">
                        <div class="service-card-overlay">
                            <i class="bi bi-thermometer-snow"></i>
                            <h3>MH° CENTIGRADE</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-card">
                        <img src="{{ asset('assets/images/img2.jpg') }}" alt="Halal Logistics">
                        <div class="service-card-overlay">
                            <i class="bi bi-award"></i>
                            <h3>HALAL LOGISTICS</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-card">
                        <img src="{{ asset('assets/images/airport.avif') }}" alt="Arkargo Logistics">
                        <div class="service-card-overlay">
                            <i class="bi bi-boxes"></i>
                            <h3>Arkargo LOGISTICS</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-card">
                        <img src="{{ asset('assets/images/services.avif') }}" alt="More Services">
                        <div class="service-card-overlay">
                            <i class="bi bi-grid"></i>
                            <h3>VIEW ALL SERVICES</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Contact Section -->
    <section class="contact-section">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="contact-box">
                        <h3>OUR WORLDWIDE OFFICES</h3>
                        <h2>Contact us</h2>
                        <p>Our global teams are standing by to assist. Get in touch with your nearest Arkargo office below.</p>
                        <select class="form-select">
                            <option value="">- Select Country -</option>
                            <option value="MY">Malaysia</option>
                            <option value="SG">Singapore</option>
                            <option value="TH">Thailand</option>
                            <option value="ID">Indonesia</option>
                            <option value="PH">Philippines</option>
                            <option value="VN">Vietnam</option>
                            <option value="CN">China</option>
                            <option value="JP">Japan</option>
                            <option value="KR">South Korea</option>
                            <option value="AU">Australia</option>
                            <option value="NZ">New Zealand</option>
                            <option value="AE">United Arab Emirates</option>
                            <option value="GB">United Kingdom</option>
                            <option value="US">United States</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="map-container">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.099819573773!2d101.71016731475394!3d2.7455892978473567!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cdb3a7a2a4a0b1%3A0x3a0a0a0a0a0a0a0a!2sKuala%20Lumpur%20International%20Airport!5e0!3m2!1sen!2smy!4v1638888888888!5m2!1sen!2smy" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Announcements Section -->
    <section class="announcements-section">
        <div class="container">
            <div class="announcements-header">
                <i class="bi bi-file-text"></i>
                <h2><span class="highlight">ANNOU</span>NCEMENTS</h2>
            </div>
            
            <div id="announcementsCarousel" class="carousel slide announcement-carousel" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row g-4">
                            <div class="col-md-4">
                                <div class="announcement-card">
                                    <h3>Arkargo Welcomes Henan Province delegation in honour of hosting Mr. Sun...</h3>
                                    <p class="date">Tuesday, 22 April 2025</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="announcement-card">
                                    <h3>Arkargo, Qatar Airways Cargo to Launch a Global Cargo Joint Venture</h3>
                                    <p class="date">Tuesday, 22 April 2025</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="promo-card">
                                    <h3>WHOLE PLANE FOR YOUR SHIPMENT</h3>
                                    <button class="btn">MORE</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row g-4">
                            <div class="col-md-4">
                                <div class="promo-card">
                                    <h3>WEEKLY FLIGHT TO HANOI, YANGON & MANILA</h3>
                                    <button class="btn">MORE</button>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="social-card">
                                    <h3>VISIT US AT LINKEDIN @ MAB KARGO</h3>
                                    <div class="social-icons">
                                        <a href="#"><i class="bi bi-github"></i></a>
                                        <a href="#"><i class="bi bi-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="announcement-card">
                                    <h3>Latest updates and news from Arkargo operations worldwide</h3>
                                    <p class="date">Check back for regular updates</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#announcementsCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#announcementsCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
            
            <div class="booking-banner">
                <p>Book your cargo space on our MH <strong>passenger</strong> or our MH <strong>freighter</strong> aircraft now!</p>
            </div>
        </div>
    </section>
    
  @include('home.footer')