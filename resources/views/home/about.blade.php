
{{-- resources/views/about.blade.php --}}
@include('home.header')

<!-- About Hero -->
<section class="py-5 bg-dark text-white">
    <div class="container">
        <h1 class="mb-2">About Arkargo</h1>
        <p class="mb-0">Connecting businesses to the world through reliable air cargo logistics.</p>
    </div>
</section>

<!-- About Overview -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-md-6">
                <h2>Who We Are</h2>
                <p>
                    Arkargo is a global air cargo logistics company dedicated to providing fast, secure, and efficient
                    freight solutions across international markets. With a strong operational network and industry
                    expertise, we help businesses move goods seamlessly across borders.
                </p>
                <p>
                    From general cargo to specialized shipments, Arkargo combines technology, reliability, and
                    customer-focused service to deliver excellence at every stage of the supply chain.
                </p>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('assets/images/air-cargo.jpg') }}" class="img-fluid rounded shadow" alt="Arkargo Operations">
            </div>
        </div>
    </div>
</section>

<!-- Mission, Vision, Values -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-4 text-center">
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <i class="bi bi-bullseye fs-1 mb-3"></i>
                        <h4>Our Mission</h4>
                        <p>
                            To deliver world-class air cargo solutions that empower global trade through speed,
                            safety, and reliability.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <i class="bi bi-eye fs-1 mb-3"></i>
                        <h4>Our Vision</h4>
                        <p>
                            To be a leading global air cargo partner recognized for innovation, trust, and operational excellence.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <i class="bi bi-award fs-1 mb-3"></i>
                        <h4>Our Values</h4>
                        <p>
                            Safety, integrity, customer commitment, sustainability, and continuous improvement guide everything we do.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- What We Do -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2>What We Do</h2>
            <p class="text-muted">Comprehensive air cargo services designed for modern logistics needs</p>
        </div>
        <div class="row g-4">
            <div class="col-md-3">
                <div class="card h-100 text-center shadow-sm">
                    <div class="card-body">
                        <i class="bi bi-box-seam fs-1 mb-3"></i>
                        <h5>General Cargo</h5>
                        <p>Reliable transportation for everyday commercial shipments worldwide.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 text-center shadow-sm">
                    <div class="card-body">
                        <i class="bi bi-thermometer-snow fs-1 mb-3"></i>
                        <h5>Temperature Control</h5>
                        <p>Specialized handling for pharmaceuticals, perishables, and sensitive cargo.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 text-center shadow-sm">
                    <div class="card-body">
                        <i class="bi bi-airplane fs-1 mb-3"></i>
                        <h5>Charter Services</h5>
                        <p>Dedicated aircraft solutions for urgent and oversized shipments.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 text-center shadow-sm">
                    <div class="card-body">
                        <i class="bi bi-globe fs-1 mb-3"></i>
                        <h5>Global Network</h5>
                        <p>Worldwide coverage supported by trusted partners and local expertise.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats -->
<section class="py-5 bg-dark text-white">
    <div class="container">
        <div class="row text-center g-4">
            <div class="col-md-3">
                <h2>50+</h2>
                <p>Countries Served</p>
            </div>
            <div class="col-md-3">
                <h2>100+</h2>
                <p>Global Partners</p>
            </div>
            <div class="col-md-3">
                <h2>24/7</h2>
                <p>Customer Support</p>
            </div>
            <div class="col-md-3">
                <h2>99%</h2>
                <p>On-Time Delivery</p>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-5">
    <div class="container text-center">
        <h3>Partner with Arkargo Today</h3>
        <p>Experience reliable air cargo logistics built for global business.</p>
        <a href="{{ url('contact') }}" class="btn btn-dark">Get in Touch</a>
    </div>
</section>

@include('home.footer')
