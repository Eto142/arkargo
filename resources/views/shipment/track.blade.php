@include('home.header')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shipment Tracking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        /* Hero / Slider */
        .hero-section {
            min-height: 400px;
            position: relative;
        }

        .carousel-item {
            height: 400px;
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .carousel-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.4);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
            padding: 0 20px;
        }

        .carousel-title {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .carousel-subtitle {
            font-size: 1.2rem;
            font-weight: 400;
        }

        .breadcrumb {
            background: transparent;
            margin-bottom: 1rem;
        }

        .breadcrumb-item a, .breadcrumb-item {
            color: white;
            font-size: 1rem;
        }

        .breadcrumb-item + .breadcrumb-item::before {
            content: ">";
            color: white;
        }

        /* Tracking Form */
        .tracking-form-section {
            background: #f5f5f5;
            padding: 100px 15px 120px;
            border-radius: 30px 30px 0 0;
            margin-top: -50px;
        }

        .tracking-card {
            background: white;
            border-radius: 20px;
            padding: 40px;
            max-width: 900px;
            margin: 0 auto;
            box-shadow: 0 6px 15px rgba(0,0,0,0.1);
        }

        .form-label {
            font-weight: 600;
            color: #333;
        }

        .prefix-input {
            max-width: 100px;
            text-align: center;
            font-weight: 600;
        }

        .awb-input {
            border: 1px solid #ddd;
            padding: 12px 15px;
            font-size: 1rem;
        }

        .track-btn {
            background: #0d5fb8;
            border: none;
            font-weight: 600;
        }

        .track-btn:hover {
            background: #0a4a93;
        }

        @media (max-width: 768px) {
            .carousel-title {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>

<!-- Hero / Slider Section -->
<section class="hero-section">
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">

            <!-- Slide 1: Package Handling -->
            <div class="carousel-item active" style="background-image: url('https://images.unsplash.com/photo-1590073241936-8db6351b3c56?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8c2hpcG1lbnR8fHx8fHwxNjk4OTAwOTM0&ixlib=rb-4.0.3&q=80&w=1200');">
                <div class="carousel-overlay">
                    <h1 class="carousel-title">Safe Package Handling</h1>
                    <p class="carousel-subtitle">We ensure every package is handled with care from pickup to delivery.</p>
                </div>
            </div>

            <!-- Slide 2: Delivery Van -->
            <div class="carousel-item" style="background-image: url('https://images.unsplash.com/photo-1602045482987-8e9e6c7b0b0d?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8ZGVsaXZlcnl8fHx8fHwxNjk4OTAxMjI2&ixlib=rb-4.0.3&q=80&w=1200');">
                <div class="carousel-overlay">
                    <h1 class="carousel-title">Fast Delivery</h1>
                    <p class="carousel-subtitle">Track your shipment and receive it quickly with our reliable logistics network.</p>
                </div>
            </div>

            <!-- Slide 3: Logistics Hub -->
            <div class="carousel-item" style="background-image: url('https://images.unsplash.com/photo-1581091012184-d8f6507c04fc?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8bG9naXN0aWN8fHx8fHwxNjk4OTAxMjk3&ixlib=rb-4.0.3&q=80&w=1200');">
                <div class="carousel-overlay">
                    <h1 class="carousel-title">Track & Manage</h1>
                    <p class="carousel-subtitle">Our advanced hub ensures shipments are monitored at every step.</p>
                </div>
            </div>

        </div>

        <!-- Carousel Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</section>

<!-- AWB Modal -->
@if(session('awb_number'))
<div class="modal fade show" id="awbModal" tabindex="-1" style="display:block;" aria-modal="true" role="dialog">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header justify-content-center border-0">
        <h5 class="modal-title">Shipment Booked Successfully</h5>
      </div>
      <div class="modal-body">
        <p><strong>AWB Number:</strong> {{ session('awb_number') }}</p>
        <a href="{{ session('pdf_path') }}" class="btn-download" download>Download PDF Receipt</a>
      </div>
    </div>
  </div>
</div>
<script>
    setTimeout(() => {
        document.getElementById('awbModal').style.display = 'none';
        document.querySelector('.modal-backdrop')?.remove();
    }, 10000);
</script>
@endif



<!-- Tracking Form Section -->
<section class="tracking-form-section">
    <div class="container">
        <div class="tracking-card">
            <!-- Validation Errors -->
            @if($errors->any())
                <div class="alert alert-danger">{{ $errors->first('awb_number') }}</div>
            @endif

            <form method="POST" action="{{ route('shipment.track') }}">
                @csrf
                <div class="row align-items-end g-3">
                    <div class="col-md-2">
                        <label class="form-label">Prefix</label>
                        <input type="text" class="form-control prefix-input" value="232" readonly>
                    </div>
                    <div class="col-md-1 text-center d-none d-md-block">
                        <span class="fs-4 text-muted">—</span>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">AWB Number</label>
                        <input type="text" name="awb_number" class="form-control awb-input" placeholder="Enter AWB Number" value="{{ old('awb_number') }}" required>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary track-btn w-100">TRACK SHIPMENT</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


@include('home.footer')