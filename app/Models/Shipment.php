<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;

    /**
     * Mass assignable fields
     */
    protected $fillable = [
        'awb_number',
        'origin',
        'destination',
        'shipment_date',
        'shipment_type',
        'currency',

        // Declared values
        'declared_carriage',
        'declared_customs',

        // Shipper
        'shipper_company',
        'shipper_department',
        'shipper_contact',
        'shipper_address',
        'shipper_city',
        'shipper_country',
        'shipper_phone',
        'origin_airport',

        // Receiver
        'receiver_company',
        'receiver_contact',
        'receiver_address',
        'receiver_city',
        'receiver_country',
        'destination_airport',

        // Cargo
        'pieces',
        'gross_weight',
        'chargeable_weight',
        'goods_description',

        // Charges
        'transport_charges',
        'duties_taxes',
        'insurance_amount',

        // Tracking / Status
        'status',
    ];

    /**
     * Default attributes
     */
    protected $attributes = [
        'status' => 'Booked',
    ];

    /**
     * Casts
     */
    protected $casts = [
        'shipment_date' => 'date',
        'declared_carriage' => 'decimal:2',
        'declared_customs' => 'decimal:2',
        'gross_weight' => 'decimal:2',
        'chargeable_weight' => 'decimal:2',
        'insurance_amount' => 'decimal:2',
    ];

    /**
     * Hide internal IDs
     */
    protected $hidden = [
        'id',
    ];

    public function histories()
{
    return $this->hasMany(ShipmentHistory::class)->orderBy('date', 'desc')->orderBy('time', 'desc');
}

public function history()
    {
        return $this->hasMany(ShipmentHistory::class, 'shipment_id');
    }

}
