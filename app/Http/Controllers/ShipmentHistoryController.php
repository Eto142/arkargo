<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use App\Models\ShipmentHistory;
use Illuminate\Http\Request;

class ShipmentHistoryController extends Controller
{
    public function edit(Shipment $shipment)
    {
        $histories = $shipment->histories()->orderBy('date', 'desc')->orderBy('time', 'desc')->get();
        return view('admin.shipments.history', compact('shipment', 'histories'));
    }

    public function store(Request $request, Shipment $shipment)
    {
        $request->validate([
            'date' => 'required|date',
            'time' => 'required',
            'location' => 'required|string',
            'status' => 'required|string',
            'remarks' => 'nullable|string',
        ]);

        $shipment->histories()->create($request->all());

        return redirect()->route('shipment.history.edit', $shipment->id)
                         ->with('success', 'History entry added successfully.');
    }


    //  public function edithistory(Shipment $shipment)
    // {
    //     $histories = $shipment->histories()->orderBy('date', 'desc')->orderBy('time', 'desc')->get();
    //     return view('admin.shipments.edit-history', compact('shipment', 'histories'));
    // }

    // Show page to edit a single history entry
public function edithistory(ShipmentHistory $history)
{
    return view('admin.shipments.edit-history', compact('history'));
}



    public function update(Request $request, ShipmentHistory $history)
    {
        $request->validate([
            'date' => 'required|date',
            'time' => 'required',
            'location' => 'required|string',
            'status' => 'required|string',
            'remarks' => 'nullable|string',
        ]);

        $history->update($request->all());

        return redirect()->back()->with('success', 'History entry updated successfully.');
    }

    public function destroy(ShipmentHistory $history)
    {
        $history->delete();
        return redirect()->back()->with('success', 'History entry deleted successfully.');
    }
}
