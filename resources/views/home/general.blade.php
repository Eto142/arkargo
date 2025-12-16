
{{-- resources/views/services/general-cargo.blade.php --}}
@include('home.header')

<!-- Hero Section -->
<section class="py-5 bg-dark text-white">
    <div class="container">
        <h1 class="mb-2">General Cargo</h1>
        <p class="mb-0">Reliable air freight solutions for everyday commercial shipments worldwide.</p>
    </div>
</section>

<!-- Overview -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-md-6">
                <h2>What is General Cargo?</h2>
                <p>
                    General cargo refers to standard commercial goods that do not require special handling conditions
                    such as temperature control or hazardous material procedures. Arkargo ensures these shipments are
                    transported safely, efficiently, and on schedule across global destinations.
                </p>
                <p>
                    Whether you are shipping retail products, industrial equipment, or business supplies, our
                    general cargo services are designed to keep your supply chain moving.
                </p>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('assets/images/services.avif') }}" class="img-fluid rounded shadow" alt="General Cargo">
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2>Why Choose Arkargo for General Cargo?</h2>
            <p class="text-muted">Trusted logistics expertise with global reach</p>
        </div>
        <div class="row g-4">
            <div class="col-md-3">
                <div class="card h-100 text-center shadow-sm">
                    <div class="card-body">
                        <i class="bi bi-globe fs-1 mb-3"></i>
                        <h5>Global Coverage</h5>
                        <p>Ship to and from major international destinations with ease.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 text-center shadow-sm">
                    <div class="card-body">
                        <i class="bi bi-clock-history fs-1 mb-3"></i>
                        <h5>On-Time Delivery</h5>
                        <p>Optimized flight schedules to ensure timely cargo delivery.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 text-center shadow-sm">
                    <div class="card-body">
                        <i class="bi bi-shield-check fs-1 mb-3"></i>
                        <h5>Secure Handling</h5>
                        <p>Strict handling standards to protect your goods at every stage.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 text-center shadow-sm">
                    <div class="card-body">
                        <i class="bi bi-headset fs-1 mb-3"></i>
                        <h5>Dedicated Support</h5>
                        <p>Our logistics experts are available 24/7 to assist you.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Cargo Types -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2>Types of General Cargo We Handle</h2>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5>Retail & Consumer Goods</h5>
                        <p>Clothing, electronics, household items, and packaged products.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5>Industrial & Manufacturing</h5>
                        <p>Machinery parts, tools, and non-hazardous industrial equipment.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5>Documents & Printed Materials</h5>
                        <p>Business documents, marketing materials, and publications.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Process -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2>Our General Cargo Process</h2>
        </div>
        <div class="row text-center g-4">
            <div class="col-md-3">
                <h5>1. Booking</h5>
                <p>Submit shipment details through our online booking platform.</p>
            </div>
            <div class="col-md-3">
                <h5>2. Acceptance</h5>
                <p>Cargo is checked and accepted at the origin station.</p>
            </div>
            <div class="col-md-3">
                <h5>3. Transportation</h5>
                <p>Shipped via our scheduled flights and global network.</p>
            </div>
            <div class="col-md-3">
                <h5>4. Delivery</h5>
                <p>Arrives at destination safely and on time.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-5">
    <div class="container text-center">
        <h3>Ship Your General Cargo with Confidence</h3>
        <p>Fast, secure, and global air cargo solutions tailored to your business.</p>
        <a href="{{ url('contact') }}" class="btn btn-dark me-2">Contact Us</a>
        <a href="{{ url('/') }}#book-cargo" class="btn btn-outline-dark">Book Now</a>
    </div>
</section>

@include('home.footer')
