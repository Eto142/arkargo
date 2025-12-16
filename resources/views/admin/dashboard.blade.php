<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Logistics Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --primary: #0d5fb8;
            --primary-dark: #084a8a;
            --secondary: #6c757d;
            --success: #28a745;
            --warning: #ffc107;
            --danger: #dc3545;
            --light: #f8f9fa;
            --dark: #343a40;
            --sidebar-width: 260px;
            --sidebar-collapsed: 70px;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f7fb;
            color: #333;
            font-size: 0.95rem;
        }

        /* Enhanced Sidebar */
        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            background: linear-gradient(180deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            padding: 0;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1000;
            box-shadow: 3px 0 15px rgba(0, 0, 0, 0.1);
        }

        .sidebar.collapsed {
            width: var(--sidebar-collapsed);
        }

        .sidebar-header {
            padding: 20px 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .sidebar-header h3 {
            font-size: 1.3rem;
            font-weight: 700;
            margin: 0;
            white-space: nowrap;
            transition: opacity 0.3s;
        }

        .sidebar.collapsed .sidebar-header h3 {
            opacity: 0;
        }

        .logo-icon {
            width: 36px;
            height: 36px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .admin-profile {
            padding: 20px 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .admin-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: white;
            flex-shrink: 0;
        }

        .admin-info {
            transition: opacity 0.3s;
        }

        .sidebar.collapsed .admin-info {
            opacity: 0;
        }

        .admin-info h6 {
            margin: 0;
            font-weight: 600;
        }

        .admin-info small {
            opacity: 0.8;
            font-size: 0.8rem;
        }

        .sidebar-nav {
            padding: 20px 0;
        }

        .nav-item {
            margin: 2px 10px;
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.85);
            padding: 12px 15px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            transition: all 0.2s;
            position: relative;
        }

        .nav-link:hover {
            color: white;
            background: rgba(255, 255, 255, 0.1);
            transform: translateX(3px);
        }

        .nav-link.active {
            color: white;
            background: rgba(255, 255, 255, 0.15);
            font-weight: 500;
        }

        .nav-link.active::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background: white;
            border-radius: 0 4px 4px 0;
        }

        .nav-icon {
            font-size: 1.2rem;
            width: 24px;
            text-align: center;
            flex-shrink: 0;
        }

        .nav-text {
            transition: opacity 0.3s;
        }

        .sidebar.collapsed .nav-text {
            opacity: 0;
        }

        .sidebar-footer {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 20px 15px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .toggle-btn {
            position: absolute;
            top: 20px;
            right: -12px;
            width: 24px;
            height: 24px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            cursor: pointer;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            transition: all 0.3s;
            z-index: 1001;
            border: none;
            padding: 0;
        }

        .toggle-btn:hover {
            transform: scale(1.1);
        }

        /* Main Content */
        .main-content {
            margin-left: calc(var(--sidebar-width) + 20px);
            padding: 25px;
            transition: margin-left 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            min-height: 100vh;
        }

        .sidebar.collapsed ~ .main-content {
            margin-left: calc(var(--sidebar-collapsed) + 20px);
        }

        /* Header */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eaeaea;
        }

        .page-header h1 {
            font-size: 1.8rem;
            font-weight: 600;
            color: var(--dark);
            margin: 0;
        }

        .header-actions {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .notification-btn {
            position: relative;
            background: none;
            border: none;
            color: var(--secondary);
            font-size: 1.2rem;
            cursor: pointer;
        }

        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: var(--danger);
            color: white;
            font-size: 0.7rem;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            border: 1px solid #eaeaea;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.08);
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 15px;
        }

        .stat-icon.shipments { background: rgba(13, 95, 184, 0.1); color: var(--primary); }
        .stat-icon.transit { background: rgba(255, 193, 7, 0.1); color: var(--warning); }
        .stat-icon.delivered { background: rgba(40, 167, 69, 0.1); color: var(--success); }
        .stat-icon.pending { background: rgba(220, 53, 69, 0.1); color: var(--danger); }

        .stat-content h3 {
            font-size: 2rem;
            font-weight: 700;
            margin: 0;
            line-height: 1;
        }

        .stat-content p {
            color: var(--secondary);
            margin: 5px 0 0 0;
            font-size: 0.9rem;
        }

        .stat-trend {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 0.85rem;
            margin-top: 8px;
        }

        .trend-up { color: var(--success); }
        .trend-down { color: var(--danger); }

        /* Charts Section */
        .charts-section {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 20px;
            margin-bottom: 30px;
        }

        @media (max-width: 1200px) {
            .charts-section {
                grid-template-columns: 1fr;
            }
        }

        .chart-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            border: 1px solid #eaeaea;
        }

        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .chart-header h5 {
            font-weight: 600;
            margin: 0;
        }

        /* Recent Shipments Table */
        .table-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            border: 1px solid #eaeaea;
        }

        .table-header {
            padding: 20px;
            border-bottom: 1px solid #eaeaea;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .table-header h5 {
            font-weight: 600;
            margin: 0;
        }

        .table-actions {
            display: flex;
            gap: 10px;
        }

        .table-container {
            overflow-x: auto;
        }

        .table {
            margin: 0;
        }

        .table thead th {
            background: #f8f9fa;
            color: var(--dark);
            font-weight: 600;
            padding: 15px;
            border-bottom: 2px solid #eaeaea;
            white-space: nowrap;
        }

        .table tbody td {
            padding: 15px;
            vertical-align: middle;
            border-color: #eaeaea;
        }

        .status-badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .status-pending { background: #fff3cd; color: #856404; }
        .status-processing { background: #cce5ff; color: #004085; }
        .status-transit { background: #d1ecf1; color: #0c5460; }
        .status-delivered { background: #d4edda; color: #155724; }

        .action-buttons {
            display: flex;
            gap: 8px;
        }

        .btn-icon {
            width: 32px;
            height: 32px;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Quick Actions */
        .quick-actions {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            border: 1px solid #eaeaea;
            margin-bottom: 30px;
        }

        .quick-actions h5 {
            font-weight: 600;
            margin-bottom: 20px;
        }

        .action-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 15px;
        }

        .action-btn {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px 15px;
            background: #f8f9fa;
            border: 1px solid #eaeaea;
            border-radius: 10px;
            color: var(--dark);
            text-decoration: none;
            transition: all 0.2s;
        }

        .action-btn:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-2px);
            border-color: var(--primary);
        }

        .action-btn i {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                left: -260px;
            }
            .sidebar.collapsed {
                left: 0;
            }
            .main-content {
                margin-left: 20px !important;
            }
            .charts-section {
                grid-template-columns: 1fr;
            }
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 3px;
        }

        ::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 3px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #a8a8a8;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <button class="toggle-btn" onclick="toggleSidebar()">
            <i class="bi bi-chevron-left"></i>
        </button>
        
        <div class="sidebar-header">
            <div class="logo-icon">
                <i class="bi bi-box-seam-fill"></i>
            </div>
            <h3>LogisticsPro</h3>
        </div>

        <div class="admin-profile">
            <div class="admin-avatar">
                {{ strtoupper(substr(auth()->guard('admin')->user()->name, 0, 1)) }}
            </div>
            <div class="admin-info">
                <h6>{{ auth()->guard('admin')->user()->name }}</h6>
                <small>Super Admin</small>
            </div>
        </div>

        <div class="sidebar-nav">
            <div class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link active">
                    <i class="bi bi-speedometer2 nav-icon"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('admin.shipments') }}" class="nav-link">
                    <i class="bi bi-box-seam nav-icon"></i>
                    <span class="nav-text">Shipments</span>
                    <span class="badge bg-danger ms-auto">5</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="#" class="nav-link">
                    <i class="bi bi-people nav-icon"></i>
                    <span class="nav-text">Customers</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="#" class="nav-link">
                    <i class="bi bi-bar-chart nav-icon"></i>
                    <span class="nav-text">Analytics</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="#" class="nav-link">
                    <i class="bi bi-gear nav-icon"></i>
                    <span class="nav-text">Settings</span>
                </a>
            </div>
        </div>

        <div class="sidebar-footer">
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-light w-100 d-flex align-items-center justify-content-center gap-2">
                    <i class="bi bi-box-arrow-right"></i>
                    <span class="nav-text">Logout</span>
                </button>
            </form>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="page-header">
            <div>
                <h1>Dashboard Overview</h1>
                <p class="text-muted mb-0">Welcome back! Here's what's happening with your shipments today.</p>
            </div>
            <div class="header-actions">
                <button class="notification-btn">
                    <i class="bi bi-bell"></i>
                    <span class="notification-badge">3</span>
                </button>
                <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        <i class="bi bi-calendar3 me-2"></i>
                        This Month
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">This Week</a></li>
                        <li><a class="dropdown-item" href="#">This Month</a></li>
                        <li><a class="dropdown-item" href="#">This Quarter</a></li>
                        <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon shipments">
                    <i class="bi bi-truck"></i>
                </div>
                <div class="stat-content">
                    <h3>{{ $totalShipments }}</h3>
                    <p>Total Shipments</p>
                    <div class="stat-trend trend-up">
                        <i class="bi bi-arrow-up"></i>
                        <span>12% from last month</span>
                    </div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon transit">
                    <i class="bi bi-clock-history"></i>
                </div>
                <div class="stat-content">
                    <h3>{{ $inTransit }}</h3>
                    <p>In Transit</p>
                    <div class="stat-trend trend-up">
                        <i class="bi bi-arrow-up"></i>
                        <span>8% from yesterday</span>
                    </div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon delivered">
                    <i class="bi bi-check-circle"></i>
                </div>
                <div class="stat-content">
                    <h3>{{ $delivered }}</h3>
                    <p>Delivered</p>
                    <div class="stat-trend trend-up">
                        <i class="bi bi-arrow-up"></i>
                        <span>15% from last month</span>
                    </div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon pending">
                    <i class="bi bi-exclamation-circle"></i>
                </div>
                <div class="stat-content">
                    <h3>{{ $booked }}</h3>
                    <p>Pending Bookings</p>
                    <div class="stat-trend trend-down">
                        <i class="bi bi-arrow-down"></i>
                        <span>5% from last week</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- <!-- Charts Section -->
        <div class="charts-section">
            <div class="chart-card">
                <div class="chart-header">
                    <h5>Shipment Volume</h5>
                    <select class="form-select form-select-sm" style="width: auto;">
                        <option>Last 7 days</option>
                        <option selected>Last 30 days</option>
                        <option>Last 90 days</option>
                    </select>
                </div>
                <canvas id="shipmentChart" height="250"></canvas>
            </div>
            <div class="chart-card">
                <div class="chart-header">
                    <h5>Status Distribution</h5>
                </div>
                <canvas id="statusChart" height="250"></canvas>
            </div>
        </div> --}}

        <!-- Quick Actions -->
        <div class="quick-actions">
            <h5>Quick Actions</h5>
            <div class="action-grid">
                <a href="#" class="action-btn">
                    <i class="bi bi-plus-circle"></i>
                    <span>New Shipment</span>
                </a>
                <a href="#" class="action-btn">
                    <i class="bi bi-file-earmark-text"></i>
                    <span>Generate Report</span>
                </a>
                <a href="#" class="action-btn">
                    <i class="bi bi-printer"></i>
                    <span>Print Labels</span>
                </a>
                <a href="#" class="action-btn">
                    <i class="bi bi-envelope"></i>
                    <span>Send Alerts</span>
                </a>
            </div>
        </div>

        <!-- Recent Shipments Table -->
        <div class="table-card">
            <div class="table-header">
                <h5>Recent Shipments</h5>
                <div class="table-actions">
                    <button class="btn btn-sm btn-outline-secondary">
                        <i class="bi bi-filter me-1"></i> Filter
                    </button>
                    <button class="btn btn-sm btn-outline-secondary">
                        <i class="bi bi-download me-1"></i> Export
                    </button>
                </div>
            </div>
            <div class="table-container">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>AWB Number</th>
                            <th>Shipper</th>
                            <th>Receiver</th>
                            <th>Origin</th>
                            <th>Destination</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentShipments as $shipment)
                        <tr>
                            <td><strong>{{ $shipment->awb_number }}</strong></td>
                            <td>{{ $shipment->shipper_company }}</td>
                            <td>{{ $shipment->receiver_company }}</td>
                            <td>{{ $shipment->origin ?? 'N/A' }}</td>
                            <td>{{ $shipment->destination ?? 'N/A' }}</td>
                            <td>
                                @php
                                    $statusClass = 'status-processing';
                                    if($shipment->status == 'delivered') $statusClass = 'status-delivered';
                                    elseif($shipment->status == 'in_transit') $statusClass = 'status-transit';
                                    elseif($shipment->status == 'pending') $statusClass = 'status-pending';
                                @endphp
                                <span class="status-badge {{ $statusClass }}">
                                    <i class="bi bi-circle-fill" style="font-size: 0.5rem;"></i>
                                    {{ ucfirst(str_replace('_', ' ', $shipment->status)) }}
                                </span>
                            </td>
                            <td>{{ $shipment->updated_at }}</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('admin.shipments.show', $shipment->id) }}" 
                                       class="btn btn-sm btn-outline-primary btn-icon" 
                                       title="View">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-outline-secondary btn-icon" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-outline-danger btn-icon" title="Cancel">
                                        <i class="bi bi-x-circle"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center py-4">
                                <div class="text-muted">
                                    <i class="bi bi-inbox" style="font-size: 2rem;"></i>
                                    <p class="mt-2 mb-0">No shipments found</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="p-3 border-top">
                <a href="{{ route('admin.shipments') }}" class="btn btn-link text-decoration-none">
                    View All Shipments <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const icon = document.querySelector('.toggle-btn i');
        sidebar.classList.toggle('collapsed');
        
        if (sidebar.classList.contains('collapsed')) {
            icon.classList.remove('bi-chevron-left');
            icon.classList.add('bi-chevron-right');
        } else {
            icon.classList.remove('bi-chevron-right');
            icon.classList.add('bi-chevron-left');
        }
    }

    // Initialize Charts
    document.addEventListener('DOMContentLoaded', function() {
        // Shipment Volume Chart
        const shipmentCtx = document.getElementById('shipmentChart').getContext('2d');
        new Chart(shipmentCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                datasets: [{
                    label: 'Shipments',
                    data: [120, 150, 180, 200, 240, 280, 300],
                    borderColor: '#0d5fb8',
                    backgroundColor: 'rgba(13, 95, 184, 0.1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            drawBorder: false
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });

        // Status Distribution Chart
        const statusCtx = document.getElementById('statusChart').getContext('2d');
        new Chart(statusCtx, {
            type: 'doughnut',
            data: {
                labels: ['Delivered', 'In Transit', 'Processing', 'Pending'],
                datasets: [{
                    data: [45, 25, 20, 10],
                    backgroundColor: [
                        '#28a745',
                        '#0d5fb8',
                        '#ffc107',
                        '#dc3545'
                    ],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                cutout: '70%',
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });

        // Set active nav link
        const currentPath = window.location.pathname;
        document.querySelectorAll('.nav-link').forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href') === currentPath) {
                link.classList.add('active');
            }
        });
    });

    // Notification click handler
    document.querySelector('.notification-btn').addEventListener('click', function() {
        alert('You have 3 unread notifications');
    });
</script>
</body>
</html>