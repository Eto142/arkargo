<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Shipment Receipt</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; color: #333; }
        .header { text-align: center; margin-bottom: 15px; }
        .logo { max-width: 150px; margin-bottom: 10px; }
        h2 { margin: 5px 0; color: #0d5fb8; }
        .section { margin-bottom: 20px; }
        h4 { margin-bottom: 8px; color: #0d5fb8; border-bottom: 1px solid #ddd; padding-bottom: 3px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 6px; text-align: left; }
        th { background-color: #f0f0f0; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        .barcode { text-align: center; margin: 15px 0; }
        .footer { margin-top: 30px; font-size: 10px; text-align: center; color: #777; }
    </style>
</head>
<body>

<div class="header">
    <img src="{{ public_path('logo.png') }}" class="logo" alt="Company Logo">
    <h2>Shipment Receipt</h2>
    <p>AWB Number: <strong>{{ $shipment->awb_number }}</strong></p>
</div>

<div class="barcode">
    {{$shipment->awb_number}}
</div>

<div class="section">
    <h4>Shipment Details</h4>
    <table>
        <tr><th>Origin</th><td>{{ $shipment->origin }}</td></tr>
        <tr><th>Destination</th><td>{{ $shipment->destination }}</td></tr>
        <tr><th>Shipment Date</th><td>{{ $shipment->shipment_date }}</td></tr>
        <tr><th>Shipment Type</th><td>{{ $shipment->shipment_type }}</td></tr>
        <tr><th>Declared Carriage</th><td>{{ $shipment->declared_carriage ?? 'N/A' }}</td></tr>
        <tr><th>Declared Customs</th><td>{{ $shipment->declared_customs ?? 'N/A' }}</td></tr>
        <tr><th>Currency</th><td>{{ $shipment->currency }}</td></tr>
        <tr><th>Pieces</th><td>{{ $shipment->pieces }}</td></tr>
        <tr><th>Gross Weight</th><td>{{ $shipment->gross_weight }}</td></tr>
        <tr><th>Chargeable Weight</th><td>{{ $shipment->chargeable_weight }}</td></tr>
        <tr><th>Goods Description</th><td>{{ $shipment->goods_description }}</td></tr>
        <tr><th>Status</th><td>{{ $shipment->status ?? 'Pending' }}</td></tr>
    </table>
</div>

<div class="section">
    <h4>Shipper Details</h4>
    <table>
        <tr><th>Company</th><td>{{ $shipment->shipper_company }}</td></tr>
        <tr><th>Department</th><td>{{ $shipment->shipper_department ?? 'N/A' }}</td></tr>
        <tr><th>Contact</th><td>{{ $shipment->shipper_contact }}</td></tr>
        <tr><th>Address</th><td>{{ $shipment->shipper_address }}</td></tr>
        <tr><th>City</th><td>{{ $shipment->shipper_city }}</td></tr>
        <tr><th>Country</th><td>{{ $shipment->shipper_country }}</td></tr>
        <tr><th>Phone</th><td>{{ $shipment->shipper_phone }}</td></tr>
        <tr><th>Origin Airport </th><td>{{ $shipment->origin_airport }}</td></tr>
    </table>
</div>

<div class="section">
    <h4>Receiver Details</h4>
    <table>
        <tr><th>Company</th><td>{{ $shipment->receiver_company }}</td></tr>
        <tr><th>Contact</th><td>{{ $shipment->receiver_contact }}</td></tr>
        <tr><th>Address</th><td>{{ $shipment->receiver_address }}</td></tr>
        <tr><th>City</th><td>{{ $shipment->receiver_city }}</td></tr>
        <tr><th>Country</th><td>{{ $shipment->receiver_country }}</td></tr>
         <tr><th>Destination Airport </th><td>{{ $shipment->destination_airport }}</td></tr>
    </table>
</div>

<div class="section">
    <h4>Charges & Insurance</h4>
    <table>
        <tr><th>Transport Charges</th><td>{{ $shipment->transport_charges }}</td></tr>
        <tr><th>Duties & Taxes</th><td>{{ $shipment->duties_taxes }}</td></tr>
        <tr><th>Insurance Amount</th><td>{{ $shipment->insurance_amount ?? 'N/A' }}</td></tr>
    </table>
</div>

<div class="footer">
    <p>Please keep this receipt for your records. Track your shipment online using the AWB number.</p>
</div>

</body>
</html>
