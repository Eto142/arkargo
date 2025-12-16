
{{-- resources/views/services/special-cargo.blade.php --}}
@include('home.header')

<!-- Hero Section -->
<section class="py-5 bg-dark text-white">
    <div class="container">
        <h1 class="mb-2">Special Cargo</h1>
        <p class="mb-0">Expert handling for sensitive, valuable, and non-standard cargo shipments.</p>
    </div>
</section>

<!-- Overview -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-md-6">
                <h2>What is Special Cargo?</h2>
                <p>
                    Special cargo includes shipments that require enhanced handling, documentation, or specific
                    transport conditions due to their nature, value, or regulatory requirements. Arkargo provides
                    specialized logistics solutions to ensure safety, compliance, and reliability.
                </p>
                <p>
                    Our trained teams and global infrastructure enable us to manage complex cargo with precision
                    and care at every stage of the journey.
                </p>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('assets/images/Charter-Services.avif') }}" class="img-fluid rounded shadow" alt="Special Cargo Handling">
            </div>
        </div>
    </div>
</section>

<!-- Types of Special Cargo -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2>Types of Special Cargo We Handle</h2>
            <p class="text-muted">Tailored solutions for complex logistics needs</p>
        </div>
        <div class="row g-4">
            <div class="col-md-3">
                <div class="card h-100 text-center shadow-sm">
                    <div class="card-body">
                        <i class="bi bi-thermometer-snow fs-1 mb-3"></i>
                        <h5>Temperature-Controlled</h5>
                        <p>Pharmaceuticals, perishables, and sensitive medical supplies.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 text-center shadow-sm">
                    <div class="card-body">
                        <i class="bi bi-shield-lock fs-1 mb-3"></i>
                        <h5>Valuable Cargo</h5>
                        <p>High-value goods requiring enhanced security and monitoring.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 text-center shadow-sm">
                    <div class="card-body">
                        <i class="bi bi-exclamation-triangle fs-1 mb-3"></i>
                        <h5>Dangerous Goods</h5>
                        <p>Regulated materials handled in full compliance with IATA standards.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 text-center shadow-sm">
                    <div class="card-body">
                        <i class="bi bi-heart fs-1 mb-3"></i>
                        <h5>Live Animals</h5>
                        <p>Safe, humane transport following international animal welfare regulations.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Arkargo -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2>Why Choose Arkargo for Special Cargo?</h2>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5>Certified Expertise</h5>
                        <p>Our teams are trained and certified to manage specialized cargo categories safely.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5>Regulatory Compliance</h5>
                        <p>We strictly adhere to international aviation, customs, and safety regulations.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5>End-to-End Monitoring</h5>
                        <p>Real-time tracking and proactive handling throughout the shipment lifecycle.</p>
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
            <h2>Our Special Cargo Process</h2>
        </div>
        <div class="row text-center g-4">
            <div class="col-md-3">
                <h5>1. Assessment</h5>
                <p>Detailed review of cargo requirements and regulations.</p>
            </div>
            <div class="col-md-3">
                <h5>2. Planning</h5>
                <p>Customized routing, packaging, and handling solutions.</p>
            </div>
            <div class="col-md-3">
                <h5>3. Execution</h5>
                <p>Secure transport with specialized handling procedures.</p>
            </div>
            <div class="col-md-3">
                <h5>4. Delivery</h5>
                <p>Safe arrival with full compliance and documentation.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-5">
    <div class="container text-center">
        <h3>Need Expert Handling for Special Cargo?</h3>
        <p>Trust Arkargo to manage your most sensitive shipments with care and precision.</p>
        <a href="{{ url('contact') }}" class="btn btn-dark me-2">Contact Us</a>
        <a href="{{ url('/') }}#book-cargo" class="btn btn-outline-dark">Request a Quote</a>
    </div>
</section>

@include('home.footer')
