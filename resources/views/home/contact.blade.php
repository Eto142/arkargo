{{-- resources/views/contact.blade.php --}}
@include('home.header')

<!-- Contact Hero -->
<section class="contact-hero py-5 bg-dark text-white">
    <div class="container">
        <h1 class="mb-2">Contact Us</h1>
        <p class="mb-0">We’re here to help with bookings, tracking, and general enquiries.</p>
    </div>
</section>

<!-- Contact Content with Map Background -->
<section class="contact-content position-relative py-5">
    <!-- Map as background -->
    <div class="map-background position-absolute top-0 start-0 w-100 h-100" style="z-index: -1;">
        <iframe 
            src="https://www.google.com/maps?q=Kuala%20Lumpur%20International%20Airport&output=embed" 
            width="100%" height="100%" style="border:0; filter: brightness(0.6);" loading="lazy">
        </iframe>
    </div>

    <div class="container">
        <div class="row g-4">
            <!-- Contact Form (full width on laptop, stacked on mobile) -->
            <div class="col-12 col-lg-10 mx-lg-auto">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card shadow-sm bg-light">
                    <div class="card-header"><strong>Send us a message</strong></div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('contact.submit') }}">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Full Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter Full Name" value="{{ old('name') }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Email Address</label>
                                    <input type="email" name="email" class="form-control" placeholder="Enter Email Address" value="{{ old('email') }}" required>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label">Subject</label>
                                    <select name="subject" class="form-select" required>
                                        <option value="">Select subject</option>
                                        <option value="Booking">Cargo Booking</option>
                                        <option value="Tracking">Shipment Tracking</option>
                                        <option value="Support">Customer Support</option>
                                        <option value="General">General Enquiry</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Message</label>
                                    <textarea name="message" rows="5" placeholder="To help us serve you better, please include:

• Shipment type (e.g., general cargo, live animals)
• Number of items
• Weight and dimensions
• Origin & destination
• Preferred departure date" class="form-control" required>{{ old('message') }}</textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-dark w-100">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@include('home.footer')
