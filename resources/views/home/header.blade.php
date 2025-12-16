<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Arkargo</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <style>
        :root {
            --mas-blue: #1e4a99;
            --mas-dark: #2b2b2b;
            --mas-light-gray: #f5f5f5;
        }
        
        body {
            font-family: 'Rubik', sans-serif;
            margin: 0;
            padding: 0;
        }
        
        /* Notification Banner */
        .notification-banner {
            background-color: var(--mas-dark);
            color: white;
            padding: 12px 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .notification-banner i {
            font-size: 20px;
        }
        
        /* Navigation */
        .navbar {
            background-color: white;
            padding: 15px 0;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .navbar-brand img {
            height: 50px;
        }
        
        .navbar-nav .nav-link {
            color: var(--mas-dark);
            font-weight: 500;
            padding: 8px 20px;
            text-transform: uppercase;
            font-size: 14px;
        }
        
        .navbar-nav .nav-link:hover {
            color: var(--mas-blue);
        }
        
        /* Hero Carousel */
        .hero-carousel {
            position: relative;
            height: 600px;
        }
        
        .carousel-item {
            height: 600px;
        }
        
        .carousel-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .carousel-caption {
            position: absolute;
            bottom: 150px;
            right: 50px;
            left: auto;
            text-align: right;
        }
        
        .carousel-caption h1 {
            font-size: 3.5rem;
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
            color: white;
        }
        
        /* Tab Section */
        .tab-section {
            position: relative;
            margin-top: -100px;
            z-index: 10;
        }
        
        .tab-buttons {
            display: flex;
            justify-content: center;
            gap: 0;
        }
        
        .tab-btn {
            background-color: white;
            color: var(--mas-dark);
            border: none;
            padding: 20px 40px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s;
            border-bottom: 3px solid transparent;
        }
        
        .tab-btn i {
            font-size: 24px;
        }
        
        .tab-btn.active,
        .tab-btn:hover {
            background-color: #4a90a4;
            color: white;
            border-bottom: 3px solid var(--mas-blue);
        }
        
        .tab-content-wrapper {
            background-color: white;
            padding: 40px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        
        .form-label {
            font-weight: 600;
            color: var(--mas-dark);
            margin-bottom: 8px;
            display: block;
        }
        
        .form-select,
        .form-control {
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }
        
        .btn-search {
            background-color: var(--mas-blue);
            color: white;
            border: none;
            padding: 12px 50px;
            font-size: 16px;
            font-weight: 600;
            text-transform: uppercase;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        .btn-search:hover {
            background-color: #153666;
        }
        
        /* Carousel Controls */
        .carousel-control-prev,
        .carousel-control-next {
            width: 50px;
            height: 50px;
            background-color: rgba(30, 74, 153, 0.7);
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
            opacity: 1;
        }
        
        .carousel-control-prev {
            left: 30px;
        }
        
        .carousel-control-next {
            right: 30px;
        }
        
        .carousel-control-prev:hover,
        .carousel-control-next:hover {
            background-color: rgba(30, 74, 153, 0.9);
        }
        
        @media (max-width: 768px) {
            .hero-carousel,
            .carousel-item {
                height: 400px;
            }
            
            .carousel-caption h1 {
                font-size: 2rem;
            }
            
            .tab-btn {
                padding: 15px 20px;
                font-size: 14px;
            }
            
            .tab-content-wrapper {
                padding: 20px;
            }
        }
        
        /* Highlights Section */
        .highlights-section {
            padding: 80px 0;
            background-color: white;
        }
        
        .highlights-section h2 {
            text-align: center;
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--mas-dark);
            margin-bottom: 50px;
        }
        
        .highlight-carousel .carousel-inner {
            padding: 20px 50px;
        }
        
        .highlight-card {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            height: 100%;
        }
        
        .highlight-card img {
            width: 100%;
            height: 300px;
            object-fit: cover;
        }
        
        .highlight-card-body {
            padding: 30px;
        }
        
        .highlight-card-body h3 {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--mas-blue);
            margin-bottom: 15px;
        }
        
        .highlight-card-body p {
            color: #666;
            line-height: 1.6;
        }
        
        /* Services Section */
        .services-section {
            padding: 80px 0;
            background-color: white;
        }
        
        .services-header {
            text-align: center;
            margin-bottom: 60px;
        }
        
        .services-header h4 {
            font-size: 1rem;
            text-transform: uppercase;
            color: #666;
            letter-spacing: 2px;
            margin-bottom: 15px;
        }
        
        .services-header h2 {
            font-size: 2.8rem;
            font-weight: 700;
            color: var(--mas-blue);
            line-height: 1.3;
        }
        
        .services-header p {
            font-size: 1.1rem;
            color: #666;
            max-width: 900px;
            margin: 20px auto 0;
            line-height: 1.7;
        }
        
        .service-card {
            position: relative;
            height: 350px;
            overflow: hidden;
            border-radius: 8px;
            cursor: pointer;
            transition: transform 0.3s;
        }
        
        .service-card:hover {
            transform: scale(1.02);
        }
        
        .service-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .service-card-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
            padding: 30px 20px;
            color: white;
        }
        
        .service-card-overlay i {
            font-size: 40px;
            margin-bottom: 10px;
        }
        
        .service-card-overlay h3 {
            font-size: 1.3rem;
            font-weight: 600;
            text-transform: uppercase;
        }
        
        /* Contact Section */
        .contact-section {
            padding: 80px 0;
            background-color: var(--mas-light-gray);
        }
        
        .contact-box {
            background-color: var(--mas-blue);
            color: white;
            padding: 50px;
            border-radius: 8px;
            height: 100%;
        }
        
        .contact-box h3 {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 10px;
            text-transform: uppercase;
        }
        
        .contact-box h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 30px;
        }
        
        .contact-box p {
            font-size: 1.1rem;
            margin-bottom: 30px;
            line-height: 1.6;
        }
        
        .contact-box .form-select {
            padding: 15px;
            font-size: 1rem;
            border: none;
            border-radius: 4px;
        }
        
        .map-container {
            width: 100%;
            height: 100%;
            min-height: 450px;
            border-radius: 8px;
            overflow: hidden;
        }
        
        .map-container iframe {
            width: 100%;
            height: 100%;
            border: none;
        }
        
        /* Announcements Section */
        .announcements-section {
            padding: 80px 0;
            background-color: white;
        }
        
        .announcements-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 40px;
        }
        
        .announcements-header i {
            font-size: 50px;
            color: var(--mas-dark);
        }
        
        .announcements-header h2 {
            font-size: 2rem;
            font-weight: 700;
            color: var(--mas-dark);
            margin: 0;
        }
        
        .announcements-header .highlight {
            background-color: #f9ed32;
            padding: 5px 10px;
        }
        
        .announcement-carousel .carousel-control-prev,
        .announcement-carousel .carousel-control-next {
            width: 40px;
            height: 40px;
            background-color: var(--mas-blue);
            top: -60px;
        }
        
        .announcement-carousel .carousel-control-prev {
            left: auto;
            right: 60px;
        }
        
        .announcement-carousel .carousel-control-next {
            right: 10px;
        }
        
        .announcement-card {
            background: white;
            border: 1px solid #e0e0e0;
            border-radius: 0;
            padding: 30px;
            height: 100%;
            transition: box-shadow 0.3s;
        }
        
        .announcement-card:hover {
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        
        .announcement-card h3 {
            font-size: 1.1rem;
            color: var(--mas-dark);
            margin-bottom: 15px;
            line-height: 1.5;
        }
        
        .announcement-card .date {
            color: var(--mas-blue);
            font-size: 0.9rem;
            font-weight: 600;
        }
        
        .promo-card {
            background-color: #87CEEB;
            padding: 50px;
            border-radius: 8px;
            text-align: center;
            height: 100%;
        }
        
        .promo-card h3 {
            font-size: 1.8rem;
            font-weight: 700;
            color: white;
            margin-bottom: 20px;
            text-transform: uppercase;
        }
        
        .promo-card .btn {
            background-color: white;
            color: var(--mas-blue);
            border: 2px solid white;
            padding: 12px 30px;
            font-weight: 600;
            text-transform: uppercase;
        }
        
        .social-card {
            background-color: var(--mas-blue);
            padding: 50px;
            border-radius: 8px;
            text-align: center;
            height: 100%;
        }
        
        .social-card h3 {
            font-size: 1.5rem;
            font-weight: 700;
            color: white;
            margin-bottom: 30px;
        }
        
        .social-card .social-icons {
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        
        .social-card .social-icons a {
            color: white;
            font-size: 30px;
            transition: opacity 0.3s;
        }
        
        .social-card .social-icons a:hover {
            opacity: 0.7;
        }
        
        /* Footer */
        .footer {
            background-color: var(--mas-light-gray);
            padding: 60px 0 30px;
        }
        
        .footer h4 {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--mas-dark);
            margin-bottom: 20px;
            text-transform: uppercase;
        }
        
        .footer p {
            color: #666;
            line-height: 1.8;
            font-size: 0.95rem;
        }
        
        .footer ul {
            list-style: none;
            padding: 0;
        }
        
        .footer ul li {
            margin-bottom: 10px;
        }
        
        .footer ul li a {
            color: #666;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .footer ul li a:hover {
            color: var(--mas-blue);
        }
        
        .partner-logos {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 20px;
            margin: 40px 0;
            padding: 20px 0;
            border-top: 1px solid #ddd;
            border-bottom: 1px solid #ddd;
        }
        
        .partner-logos img {
            height: 40px;
            opacity: 0.7;
            transition: opacity 0.3s;
        }
        
        .partner-logos img:hover {
            opacity: 1;
        }
        
        .footer-bottom {
            text-align: center;
            padding-top: 30px;
            border-top: 1px solid #ddd;
            margin-top: 30px;
        }
        
        .footer-bottom p {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 10px;
        }
        
        .footer-links {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }
        
        .footer-links a {
            color: #666;
            text-decoration: none;
            font-size: 0.9rem;
        }
        
        .footer-links a:hover {
            color: var(--mas-blue);
        }
        
        .booking-banner {
            background-color: #e3f2fd;
            padding: 20px;
            text-align: center;
            margin: 40px 0;
            border-radius: 8px;
        }
        
        .booking-banner p {
            margin: 0;
            color: #666;
        }
        
        .booking-banner strong {
            color: #c62828;
        }
    </style>
</head>
<body>
    <!-- Notification Banner -->
    <div class="notification-banner">
        <i class="bi bi-bell"></i>
        <span>TEMPORARY EMBARGO RESTRICTION TO LHR LIFTED, EFFECTIVELY IMMEDIATELY</span>
    </div>
    
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Arkargo Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            ABOUT US
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('about') }}">About us</a></li>
                            {{-- <li><a class="dropdown-item" href="#">Leadership</a></li>
                            <li><a class="dropdown-item" href="#">Awards</a></li> --}}
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            E-SERVICES
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('contact') }}">Book Cargo</a></li>
                            <li><a class="dropdown-item" href="{{ route('shipment.track.form') }}">Track Shipment</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            PRODUCTS
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('general') }}">General Cargo</a></li>
                            <li><a class="dropdown-item" href="{{ url('special') }}">Special Cargo</a></li>
                        </ul>
                    </li>
                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            NETWORK
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Route Map</a></li>
                            <li><a class="dropdown-item" href="#">Destinations</a></li>
                        </ul>
                    </li> --}}
                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            SUSTAINABILITY
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Our Commitment</a></li>
                            <li><a class="dropdown-item" href="#">Initiatives</a></li>
                        </ul>
                    </li> --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            SUPPORT
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('contact') }}">Contact Us</a></li>
                            <li><a class="dropdown-item" href="{{ url('faq') }}">FAQ</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="bi bi-search"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    