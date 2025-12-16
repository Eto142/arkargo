<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
// use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade\Pdf; // <--- note the alias "Pdf"
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ShipmentController extends Controller
{
    // Show booking form (Registration)
    public function create()
    {
        return view('shipment.book');
    }


 // Store shipment
    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'origin' => 'required|string',
    //         'destination' => 'required|string',
    //         'shipment_date' => 'required|date',
    //         'shipment_type' => 'required|string',
    //         'declared_carriage' => 'nullable|numeric',
    //         'declared_customs' => 'nullable|numeric',
    //         'currency' => 'required|string',

    //         'shipper_company' => 'required|string',
    //         'shipper_department' => 'nullable|string',
    //         'shipper_contact' => 'required|string',
    //         'shipper_address' => 'required|string',
    //         'shipper_city' => 'required|string',
    //         'shipper_country' => 'required|string',
    //         'shipper_phone' => 'required|string',

    //         'receiver_company' => 'required|string',
    //         'receiver_contact' => 'required|string',
    //         'receiver_address' => 'required|string',
    //         'receiver_city' => 'required|string',
    //         'receiver_country' => 'required|string',

    //         'pieces' => 'required|integer|min:1',
    //         'gross_weight' => 'required|numeric',
    //         'chargeable_weight' => 'required|numeric',
    //         'goods_description' => 'required|string',

    //         'transport_charges' => 'required|string',
    //         'duties_taxes' => 'required|string',
    //         'insurance_amount' => 'nullable|numeric',
    //     ]);

    //     // Generate unique AWB Number
    //     $validated['awb_number'] = $this->generateAwb();

    //     // Create shipment
    //     $shipment = Shipment::create($validated);

    //     return redirect()
    //         ->route('shipment.track.form')
    //         ->with('success', 'Shipment booked successfully. AWB: ' . $shipment->awb_number);
    // }







public function store(Request $request)
{
    $validated = $request->validate([
        'origin' => 'required|string',
        'destination' => 'required|string',
        'shipment_date' => 'required|date',
        'shipment_type' => 'required|string',
        'declared_carriage' => 'nullable|numeric',
        'declared_customs' => 'nullable|numeric',
        'currency' => 'required|string',

        'shipper_company' => 'required|string',
        'shipper_department' => 'nullable|string',
        'shipper_contact' => 'required|string',
        'shipper_address' => 'required|string',
        'shipper_city' => 'required|string',
        'shipper_country' => 'required|string',
        'shipper_phone' => 'required|string',

        'receiver_company' => 'required|string',
        'receiver_contact' => 'required|string',
        'receiver_address' => 'required|string',
        'receiver_city' => 'required|string',
        'receiver_country' => 'required|string',

        'pieces' => 'required|integer|min:1',
        'gross_weight' => 'required|numeric',
        'chargeable_weight' => 'required|numeric',
        'goods_description' => 'required|string',

        'transport_charges' => 'required|string',
        'duties_taxes' => 'required|string',
        'insurance_amount' => 'nullable|numeric',
    ]);

    // Generate unique AWB Number
    $validated['awb_number'] = $this->generateAwb();

    // Create shipment
    $shipment = Shipment::create($validated);

    // Generate PDF
    $pdf = PDF::loadView('shipment.pdf_receipt', compact('shipment'));

    // Save PDF to public storage
    $pdfPath = 'shipments/awb_' . $shipment->awb_number . '.pdf';
    Storage::disk('public')->put($pdfPath, $pdf->output());

    

    // Pass AWB number and PDF path to modal
    return redirect()->route('shipment.track.form')
        ->with([
            'success' => 'Shipment booked successfully.',
            'awb_number' => $shipment->awb_number,
            'pdf_path' => asset('storage/' . $pdfPath)
        ]);
}




    // Simple AWB generator
    private function generateAwb()
    {
        do {
            $awb = 'AWB' . strtoupper(Str::random(8));
        } while (Shipment::where('awb_number', $awb)->exists());

        return $awb;
    }



     // Track shipment form (Login)
    public function trackForm()
    {
        return view('shipment.track');
    }



   // Process tracking request
public function track(Request $request)
{
    $request->validate([
        'awb_number' => 'required|exists:shipments,awb_number',
    ]);

    // Get the shipment
    $shipment = Shipment::where('awb_number', $request->awb_number)->first();

    // If somehow $shipment is null (shouldn't happen because of validation)
    if (!$shipment) {
        return back()->withErrors(['awb_number' => 'Shipment not found']);
    }

    return view('shipment.home', compact('shipment'));
}

  
}
