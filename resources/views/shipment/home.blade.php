<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CARGO TRACKING • AWB {{ $shipment->awb_number }} • Global Logistics Network</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300;400;500;600&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-dark: #0f172a;
            --primary-blue: #1e40af;
            --accent-blue: #3b82f6;
            --status-green: #10b981;
            --status-yellow: #f59e0b;
            --status-red: #ef4444;
            --neutral-gray: #64748b;
            --light-gray: #f8fafc;
            --border-gray: #e2e8f0;
            --card-bg: #ffffff;
            --terminal-bg: #0f172a;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            color: #1e293b;
            line-height: 1.5;
            min-height: 100vh;
        }

        /* Header */
        .system-header {
            background: var(--primary-dark);
            border-bottom: 1px solid rgba(255,255,255,0.08);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .system-header .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .system-info {
            display: flex;
            align-items: center;
            gap: 2rem;
        }

        .system-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.4rem 0.8rem;
            background: rgba(59, 130, 246, 0.1);
            border: 1px solid rgba(59, 130, 246, 0.2);
            border-radius: 4px;
            font-family: 'Roboto Mono', monospace;
            font-size: 0.8rem;
            color: #3b82f6;
            letter-spacing: 0.5px;
        }

        .system-badge i {
            font-size: 0.9rem;
        }

        .timestamp {
            font-family: 'Roboto Mono', monospace;
            font-size: 0.85rem;
            color: #94a3b8;
        }

        /* Main Container */
        .dashboard-container {
            max-width: 1600px;
            margin: 0 auto;
            padding: 2rem;
        }

        /* AWB Display */
        .awb-terminal {
            background: var(--terminal-bg);
            border-radius: 8px;
            padding: 2rem;
            margin-bottom: 2rem;
            border: 1px solid rgba(255,255,255,0.05);
            position: relative;
            overflow: hidden;
        }

        .awb-terminal::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, #3b82f6, transparent);
        }

        .awb-label {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .awb-label-text {
            font-family: 'Roboto Mono', monospace;
            font-size: 0.85rem;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .awb-number {
            font-family: 'Roboto Mono', monospace;
            font-size: 2.5rem;
            font-weight: 600;
            color: #ffffff;
            letter-spacing: 1px;
            margin-bottom: 0.5rem;
        }

        .status-indicator {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.5rem 1rem;
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 6px;
            margin-top: 1rem;
        }

        .status-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #94a3b8;
            animation: pulse 2s infinite;
        }

        .status-dot.active {
            background: #10b981;
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.2);
        }

        .status-dot.pending {
            background: #f59e0b;
        }

        .status-text {
            font-family: 'Roboto Mono', monospace;
            font-size: 0.9rem;
            color: #e2e8f0;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        @keyframes pulse {
            0% { opacity: 1; }
            50% { opacity: 0.5; }
            100% { opacity: 1; }
        }

        /* Grid Layout */
        .dashboard-grid {
            display: grid;
            grid-template-columns: 1fr 400px;
            gap: 2rem;
            margin-bottom: 2rem;
        }

        /* Shipment Details */
        .detail-panel {
            background: var(--card-bg);
            border-radius: 8px;
            padding: 2rem;
            border: 1px solid var(--border-gray);
            box-shadow: 0 1px 3px 0 rgba(0,0,0,0.05);
            margin-bottom: 1.5rem;
        }

        .panel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #f1f5f9;
        }

        .panel-title {
            font-size: 1rem;
            font-weight: 600;
            color: var(--primary-dark);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .panel-title i {
            color: var(--accent-blue);
            font-size: 1.1rem;
        }

        .panel-subtitle {
            font-size: 0.85rem;
            color: var(--neutral-gray);
        }

        /* Information Grid */
        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .info-section {
            margin-bottom: 2rem;
        }

        .info-label {
            display: block;
            font-size: 0.8rem;
            color: var(--neutral-gray);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }

        .info-value {
            font-size: 0.95rem;
            color: var(--primary-dark);
            font-weight: 500;
            line-height: 1.6;
            font-family: 'Inter', sans-serif;
        }

        .info-value.mono {
            font-family: 'Roboto Mono', monospace;
            font-size: 0.9rem;
        }

        .info-value.strong {
            font-weight: 600;
            color: var(--primary-dark);
        }

        .info-divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--border-gray), transparent);
            margin: 1.5rem 0;
        }

        /* Metrics */
        .metrics-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .metric-card {
            background: var(--card-bg);
            border: 1px solid var(--border-gray);
            border-radius: 6px;
            padding: 1.5rem;
            position: relative;
            transition: all 0.2s ease;
        }

        .metric-card:hover {
            border-color: var(--accent-blue);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }

        .metric-value {
            font-family: 'Roboto Mono', monospace;
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--primary-dark);
            margin-bottom: 0.25rem;
        }

        .metric-label {
            font-size: 0.8rem;
            color: var(--neutral-gray);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Tracking Timeline */
        .tracking-timeline {
            background: var(--card-bg);
            border-radius: 8px;
            padding: 2rem;
            border: 1px solid var(--border-gray);
            height: fit-content;
            position: sticky;
            top: 100px;
        }

        .timeline-container {
            position: relative;
            padding-left: 2rem;
            margin-top: 1.5rem;
        }

        .timeline-line {
            position: absolute;
            left: 0.8rem;
            top: 0;
            bottom: 0;
            width: 2px;
            background: linear-gradient(to bottom, #e2e8f0, #e2e8f0);
            z-index: 1;
        }

        .timeline-progress {
            position: absolute;
            left: 0.8rem;
            top: 0;
            width: 2px;
            background: linear-gradient(to bottom, #10b981, #3b82f6);
            z-index: 2;
            transition: height 2s ease;
        }

        .timeline-item {
            position: relative;
            margin-bottom: 2.5rem;
            padding-left: 1.5rem;
        }

        .timeline-item:last-child {
            margin-bottom: 0;
        }

        .timeline-dot {
            position: absolute;
            left: -1.1rem;
            top: 0;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background: var(--card-bg);
            border: 3px solid #e2e8f0;
            z-index: 3;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .timeline-dot.completed {
            border-color: #10b981;
            background: #10b981;
        }

        .timeline-dot.active {
            border-color: #3b82f6;
            background: var(--card-bg);
        }

        .timeline-dot.completed i {
            color: white;
            font-size: 0.7rem;
        }

        .timeline-content {
            padding-top: 0.25rem;
        }

        .timeline-title {
            font-weight: 600;
            color: var(--primary-dark);
            margin-bottom: 0.25rem;
            font-size: 0.95rem;
        }

        .timeline-subtitle {
            font-size: 0.85rem;
            color: var(--neutral-gray);
            margin-bottom: 0.25rem;
            line-height: 1.4;
        }

        .timeline-time {
            font-family: 'Roboto Mono', monospace;
            font-size: 0.8rem;
            color: #94a3b8;
        }

        /* Current Status */
        .current-status {
            background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
            color: white;
            padding: 1.5rem;
            border-radius: 8px;
            margin-top: 2rem;
        }

        .status-label {
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: rgba(255,255,255,0.7);
            margin-bottom: 0.5rem;
        }

        .status-main {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .eta-display {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 1rem;
            border-top: 1px solid rgba(255,255,255,0.1);
        }

        .eta-label {
            font-size: 0.85rem;
            color: rgba(255,255,255,0.7);
        }

        .eta-value {
            font-family: 'Roboto Mono', monospace;
            font-size: 1rem;
            font-weight: 600;
            color: white;
        }

        /* Data Tables */
        .data-table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-table th {
            text-align: left;
            padding: 1rem;
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--neutral-gray);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 2px solid var(--border-gray);
        }

        .data-table td {
            padding: 1rem;
            border-bottom: 1px solid var(--border-gray);
            font-size: 0.9rem;
        }

        .data-table tr:hover {
            background: #f8fafc;
        }

        /* Footer */
        .system-footer {
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 1px solid var(--border-gray);
            text-align: center;
            color: var(--neutral-gray);
            font-size: 0.85rem;
        }

        .system-footer a {
            color: var(--accent-blue);
            text-decoration: none;
        }

        .system-footer a:hover {
            text-decoration: underline;
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .dashboard-grid {
                grid-template-columns: 1fr;
            }
            
            .tracking-timeline {
                position: static;
            }
        }

        @media (max-width: 768px) {
            .dashboard-container {
                padding: 1rem;
            }
            
            .info-grid {
                grid-template-columns: 1fr;
            }
            
            .metrics-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .awb-number {
                font-size: 2rem;
            }
        }

        @media (max-width: 480px) {
            .metrics-grid {
                grid-template-columns: 1fr;
            }
            
            .awb-number {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- System Header -->
    <header class="system-header">
        <div class="container">
            <div class="system-info">
                <div class="system-badge">
                    <i class="bi bi-globe"></i>
                    <span>GLOBAL LOGISTICS NETWORK</span>
                </div>
                <div class="system-badge">
                    <i class="bi bi-shield-check"></i>
                    <span>CARGO TRACKING SYSTEM v4.2</span>
                </div>
            </div>
            <div class="timestamp" id="liveTimestamp">
                {{ now()->format('d M Y H:i:s') }} UTC
            </div>
        </div>
    </header>

    <!-- Main Dashboard -->
    <main class="dashboard-container">
        <!-- AWB Terminal -->
        <div class="awb-terminal">
            <div class="awb-label">
                <div class="awb-label-text">AIR WAYBILL</div>
                <div class="system-badge">ACTIVE • REAL-TIME TRACKING</div>
            </div>
            <div class="awb-number">{{ $shipment->awb_number }}</div>
           <div class="status-indicator">
    <div class="status-dot"></div>
    <div class="status-text">
        {{ $shipment->status }}
    </div>
</div>

        </div>

        <!-- Metrics Dashboard -->
        <div class="metrics-grid">
            <div class="metric-card">
                <div class="metric-value">{{ $shipment->pieces }} PCS</div>
                <div class="metric-label">TOTAL PIECES</div>
            </div>
            <div class="metric-card">
                <div class="metric-value">{{ $shipment->gross_weight }} KG</div>
                <div class="metric-label">GROSS WEIGHT</div>
            </div>
            <div class="metric-card">
                <div class="metric-value">{{ $shipment->chargeable_weight }} KG</div>
                <div class="metric-label">CHARGEABLE WEIGHT</div>
            </div>
            <div class="metric-card">
                <div class="metric-value">{{ $shipment->currency }} {{ number_format($shipment->declared_carriage, 2) }}</div>
                <div class="metric-label">DECLARED VALUE</div>
            </div>
            <div class="metric-card">
                <div class="metric-value">{{ $shipment->shipment_type }}</div>
                <div class="metric-label">SERVICE TYPE</div>
            </div>
        </div>

        <!-- Main Grid -->
        <div class="dashboard-grid">
            <!-- Left Column - Details -->
            <div>
                <!-- Shipment Parties -->
                <div class="detail-panel">
                    <div class="panel-header">
                        <div class="panel-title">
                            <i class="bi bi-diagram-3"></i>
                            SHIPMENT PARTIES
                        </div>
                        <div class="panel-subtitle">CONSIGNMENT DETAILS</div>
                    </div>
                    
                  <div class="info-grid">
    <!-- Shipper -->
    <div class="info-section">
        <div class="info-label">Shipper / Consignor</div>
        <div class="info-value strong">
            <span class="field-label">Company:</span> {{ $shipment->shipper_company }}
        </div>
        <div class="info-value">
            <span class="field-label">Contact Person:</span> {{ $shipment->shipper_contact }}
        </div>
        <div class="info-value">
            <span class="field-label">Address:</span> {{ $shipment->shipper_address }}
        </div>
        <div class="info-value">
            <span class="field-label">City / Country:</span> {{ $shipment->shipper_city }}, {{ $shipment->shipper_country }}
        </div>
        @if($shipment->shipper_phone)
        <div class="info-value mono">
            <span class="field-label">Phone:</span> {{ $shipment->shipper_phone }}
        </div>
        @endif
        @if($shipment->shipper_department)
        <div class="info-value">
            <span class="field-label">Department:</span> {{ $shipment->shipper_department }}
        </div>
        @endif
    </div>

    <!-- Receiver -->
    <div class="info-section">
        <div class="info-label">Consignee / Receiver</div>
        <div class="info-value strong">
            <span class="field-label">Company:</span> {{ $shipment->receiver_company }}
        </div>
        <div class="info-value">
            <span class="field-label">Contact Person:</span> {{ $shipment->receiver_contact }}
        </div>
        <div class="info-value">
            <span class="field-label">Address:</span> {{ $shipment->receiver_address }}
        </div>
        <div class="info-value">
            <span class="field-label">City / Country:</span> {{ $shipment->receiver_city }}, {{ $shipment->receiver_country }}
        </div>
    </div>
</div>


                    <div class="info-divider"></div>

                    <!-- Cargo Details -->
                    <div class="info-grid">
                        <div class="info-section">
                            <div class="info-label">Cargo Description</div>
                            <div class="info-value">{{ $shipment->goods_description }}</div>
                        </div>
                        
                        @if($shipment->dimensions)
                        <div class="info-section">
                            <div class="info-label">Dimensions (L×W×H)</div>
                            <div class="info-value mono">{{ $shipment->dimensions }}</div>
                        </div>
                        @endif
                        
                        <div class="info-section">
                            <div class="info-label">Declared Values</div>
                            <div class="info-value">Carriage: {{ $shipment->currency }} {{ number_format($shipment->declared_carriage, 2) }}</div>
                            <div class="info-value">Customs: {{ $shipment->currency }} {{ number_format($shipment->declared_customs, 2) }}</div>
                            @if($shipment->insurance_amount)
                            <div class="info-value">Insurance: {{ $shipment->currency }} {{ number_format($shipment->insurance_amount, 2) }}</div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Shipping Instructions -->
                <div class="detail-panel">
                    <div class="panel-header">
                        <div class="panel-title">
                            <i class="bi bi-clipboard-data"></i>
                            SHIPPING INSTRUCTIONS
                        </div>
                    </div>
                    
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>ITEM</th>
                                <th>SPECIFICATION</th>
                                {{-- <th>REMARKS</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Handling</td>
                                <td>Temperature Controlled</td>
                                {{-- <td>Maintain 15-25°C</td> --}}
                            </tr>
                            <tr>
                                <td>Security</td>
                                <td>High Value Cargo</td>
                                {{-- <td>Requires Secure Storage</td> --}}
                            </tr>
                            <tr>
                                <td>Documentation</td>
                                <td>Commercial Invoice Attached</td>
                                {{-- <td>Customs Cleared</td> --}}
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Right Column - Tracking -->
            <div class="tracking-timeline">
                <div class="panel-header">
                    <div class="panel-title">
                        <i class="bi bi-radar"></i>
                        TRACKING HISTORY
                    </div>
                    <div class="panel-subtitle">LIVE UPDATES</div>
                </div>
{{-- 
               <div class="timeline-container">
    <div class="timeline-line"></div>
    <div class="timeline-progress" id="timelineProgress"></div>

    @forelse($history as $item)
    <div class="timeline-item">
        <div class="timeline-dot 
            @if($item->status == 'Delivered') completed 
            @elseif($item->status == 'In Transit') active @endif">
            @if($item->status == 'Delivered')
            <i class="bi bi-check"></i>
            @endif
        </div>
        <div class="timeline-content">
            <div class="timeline-title">{{ $item->status }}</div>
            <div class="timeline-subtitle">{{ $item->remarks }} - {{ $item->location }}</div>
            <div class="timeline-time">{{ \Carbon\Carbon::parse($item->date.' '.$item->time)->format('d M Y, H:i') }} UTC</div>
        </div>
    </div>
    @empty
    <p>No tracking history available yet.</p>
    @endforelse
</div>

                </div> --}}



                <div class="timeline-container">
    <div class="timeline-line"></div>
    <div class="timeline-progress"></div>

    @forelse($history as $item)
        <div class="timeline-item">
            <div class="timeline-dot
                @if($loop->first)
                    active   {{-- latest = blue --}}
                @else
                    completed {{-- previous = green --}}
                @endif
            ">
                @unless($loop->first)
                    <i class="bi bi-check"></i>
                @endunless
            </div>

            <div class="timeline-content">
                <div class="timeline-title">{{ $item->status }}</div>
                <div class="timeline-subtitle">
                    {{ $item->remarks }} - {{ $item->location }}
                </div>
                <div class="timeline-time">
                    {{ \Carbon\Carbon::parse($item->date.' '.$item->time)->format('d M Y, H:i') }} UTC
                </div>
            </div>
        </div>
    @empty
        <p>No tracking history available yet.</p>
    @endforelse
</div>

</div>


<style>

    .timeline-container {
    position: relative;
    padding-left: 40px;
}

.timeline-line {
    position: absolute;
    left: 15px;
    top: 0;
    bottom: 0;
    width: 2px;
    background: #e5e7eb; /* light gray base */
}

.timeline-item {
    display: flex;
    margin-bottom: 30px;
    position: relative;
}

.timeline-dot {
    width: 14px;
    height: 14px;
    border-radius: 50%;
    background: #9ca3af; /* default gray */
    position: absolute;
    left: 8px;
    top: 5px;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 2;
}

/* Latest update → BLUE */
.timeline-dot.active {
    background: #2563eb;
}

/* Previous updates → GREEN */
.timeline-dot.completed {
    background: #16a34a;
    color: #fff;
    font-size: 10px;
}

/* Green line for completed steps */
.timeline-item:not(:first-child)::before {
    content: '';
    position: absolute;
    left: 14px;
    top: -30px;
    width: 2px;
    height: 30px;
    background: #16a34a;
}

</style>


              <!-- Current Status -->
<div class="current-status">
    <!-- Status -->
    <div class="status-label">Current Status</div>
    <div class="status-main">
        {{ $shipment->status }}
    </div>

    <!-- ETA / Destination -->
    <div class="eta-display">
        <div class="eta-label">Destination</div>
        <div class="eta-value">
            {{ $shipment->destination }}
        </div>
    </div>

    <!-- Shipment Date -->
    <div class="eta-display">
        <div class="eta-label">Shipment Date</div>
        <div class="eta-value">
            {{ \Carbon\Carbon::parse($shipment->shipment_date)->format('D, M j, Y') }}
        </div>
    </div>
</div>

                </div>
            </div>
        </div>

        <!-- System Footer -->
        <div class="system-footer">
            <div>GLOBAL LOGISTICS NETWORK • CARGO TRACKING SYSTEM v4.2</div>
            <div class="mt-1">
                <a href="#">EXPORT DOCUMENTS</a> • 
                <a href="#">CONTROL SHEET</a> • 
                <a href="#">CUSTOMS DOCS</a> • 
                <a href="#">SUPPORT</a>
            </div>
            <div class="mt-2" style="font-size: 0.75rem; color: #94a3b8;">
                REF: {{ $shipment->awb_number }} • LAST UPDATE: {{ now()->format('d M Y H:i:s') }} UTC
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Update live timestamp
            function updateTimestamp() {
                const now = new Date();
                const timestamp = now.toUTCString().replace('GMT', 'UTC');
                document.getElementById('liveTimestamp').textContent = timestamp;
            }
            
            // Update timeline progress
            const progressBar = document.getElementById('timelineProgress');
            let progressHeight = 0;
            
            switch('{{ $shipment->status }}') {
                case 'Booked':
                    progressHeight = '16%';
                    break;
                case 'In Transit':
                    progressHeight = '66%';
                    break;
                case 'Delivered':
                    progressHeight = '100%';
                    break;
            }
            
            setTimeout(() => {
                progressBar.style.height = progressHeight;
            }, 500);
            
            // Simulate data refresh
            setInterval(updateTimestamp, 1000);
            
            // Add terminal-like typing effect to AWB
            const awbElement = document.querySelector('.awb-number');
            const originalAWB = awbElement.textContent;
            awbElement.textContent = '';
            
            let i = 0;
            function typeWriter() {
                if (i < originalAWB.length) {
                    awbElement.textContent += originalAWB.charAt(i);
                    i++;
                    setTimeout(typeWriter, 50);
                }
            }
            
            // Start typing effect
            setTimeout(typeWriter, 1000);
            
            // Add data refresh indicator
            setInterval(() => {
                const timestamp = document.querySelector('.system-footer div:last-child');
                const now = new Date();
                timestamp.textContent = `REF: {{ $shipment->awb_number }} • LAST UPDATE: ${now.toUTCString().replace('GMT', 'UTC')}`;
                
                // Briefly highlight updated elements
                timestamp.style.color = '#3b82f6';
                setTimeout(() => {
                    timestamp.style.color = '#94a3b8';
                }, 500);
            }, 30000); // Refresh every 30 seconds
        });
    </script>
</body>
</html>