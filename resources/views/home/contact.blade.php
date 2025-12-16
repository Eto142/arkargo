
{{-- resources/views/contact.blade.php --}}
@include('home.header')

<!-- Contact Hero -->
<section class="contact-hero py-5 bg-dark text-white">
    <div class="container">
        <h1 class="mb-2">Contact Us</h1>
        <p class="mb-0">We’re here to help with bookings, tracking, and general enquiries.</p>
    </div>
</section>

<!-- Contact Content -->
<section class="contact-content py-5">
    <div class="container">
        <div class="row g-4">
            <!-- Contact Form -->
            <div class="col-md-6">
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

                <div class="card shadow-sm">
                    <div class="card-header bg-light"><strong>Send us a message</strong></div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('contact.submit') }}">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Full Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Email Address</label>
                                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                                </div>
                                <div class="col-md-6">
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
                                    <textarea name="message" rows="5" class="form-control" required>{{ old('message') }}</textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-dark w-100">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Offices & Map -->
            <div class="col-md-6">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-light"><strong>Our Worldwide Offices</strong></div>
                    <div class="card-body">
                        <select class="form-select mb-3" id="officeSelect" onchange="changeOffice()">
                            <option value="">Select Country</option>
                            <option value="MY">Malaysia</option>
                            <option value="SG">Singapore</option>
                            <option value="GB">United Kingdom</option>
                            <option value="US">United States</option>
                            <option value="AE">United Arab Emirates</option>
                        </select>
                        <div id="officeDetails" class="small text-muted">
                            Select a country to view office details.
                        </div>
                    </div>
                </div>

                <div class="map-container shadow-sm" style="height:320px;">
                    <iframe id="officeMap"
                        src="https://www.google.com/maps?q=Kuala%20Lumpur%20International%20Airport&output=embed"
                        width="100%" height="100%" style="border:0" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
function changeOffice() {
    const map = document.getElementById('officeMap');
    const details = document.getElementById('officeDetails');
    const value = document.getElementById('officeSelect').value;

    const offices = {
        MY: {
            map: 'Kuala Lumpur International Airport',
            text: 'Arkargo Malaysia\nEmail: info.my@arkargo.com\nPhone: +60 3 0000 0000'
        },
        SG: {
            map: 'Singapore Changi Airport',
            text: 'Arkargo Singapore\nEmail: info.sg@arkargo.com\nPhone: +65 6000 0000'
        },
        GB: {
            map: 'London Heathrow Airport',
            text: 'Arkargo UK\nEmail: info.uk@arkargo.com\nPhone: +44 20 0000 0000'
        },
        US: {
            map: 'JFK International Airport',
            text: 'Arkargo USA\nEmail: info.us@arkargo.com\nPhone: +1 212 000 0000'
        },
        AE: {
            map: 'Dubai International Airport',
            text: 'Arkargo UAE\nEmail: info.ae@arkargo.com\nPhone: +971 4 000 0000'
        }
    };

    if (offices[value]) {
        map.src = `https://www.google.com/maps?q=${encodeURIComponent(offices[value].map)}&output=embed`;
        details.innerText = offices[value].text;
    }
}
</script>

@include('home.footer')

