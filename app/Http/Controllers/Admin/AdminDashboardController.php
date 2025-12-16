<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Shipment;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    /**
     * Admin dashboard overview
     */
   public function index()
    {
        $totalShipments = Shipment::count();
        $inTransit = Shipment::where('status', 'In Transit')->count();
        $delivered = Shipment::where('status', 'Delivered')->count();
        $booked = Shipment::where('status', 'Booked')->count();

        $recentShipments = Shipment::latest()->take(10)->get();

        return view('admin.dashboard', compact(
            'totalShipments',
            'inTransit',
            'delivered',
            'booked',
            'recentShipments'
        ));
    }
  
    /**
     * Admin logout
     */
    public function logout(Request $request)
    {
        auth('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
