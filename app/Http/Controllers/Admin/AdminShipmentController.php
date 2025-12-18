<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shipment;
use Illuminate\Http\Request;

class AdminShipmentController extends Controller
{
    //



      public function bookcargo()
    {
        $shipments = Shipment::latest()->paginate(20);
        return view('admin.shipments.book', compact('shipments'));
    }


      /**
     * View all shipments
     */
    public function index()
    {
        $shipments = Shipment::latest()->paginate(20);
        return view('admin.shipments.index', compact('shipments'));
    }

    /**
     * View single shipment
     */
    public function show($id)
    {
        $shipment = Shipment::findOrFail($id);
        return view('admin.shipments.show', compact('shipment'));
    }

    /**
     * Update shipment status
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string',
        ]);

        $shipment = Shipment::findOrFail($id);
        $shipment->update([
            'status' => $request->status,
        ]);

        return back()->with('success', 'Shipment status updated successfully.');
    }

}
