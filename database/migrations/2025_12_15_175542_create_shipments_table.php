<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();

            // AWB
            $table->string('awb_number')->unique();

            // Routing
            $table->string('origin');
            $table->string('destination');
            $table->date('shipment_date');

            // Shipment info
            $table->string('shipment_type');
            $table->string('currency', 3);
            $table->decimal('declared_carriage', 12, 2)->nullable();
            $table->decimal('declared_customs', 12, 2)->nullable();

            // Shipper
            $table->string('shipper_company');
            $table->string('shipper_department')->nullable();
            $table->string('shipper_contact');
            $table->string('shipper_address');
            $table->string('shipper_city');
            $table->string('shipper_country');
            $table->string('shipper_phone');
            $table->string('shipper_postal_code')->nullable();
            $table->string('shipper_tax_id')->nullable();
             $table->string('origin_airport');

            // Receiver
            $table->string('receiver_company');
            $table->string('receiver_contact');
            $table->string('receiver_address');
            $table->string('receiver_city');
            $table->string('receiver_country');
            $table->string('destination_airport');

            // Cargo
            $table->unsignedInteger('pieces');
            $table->decimal('gross_weight', 10, 2);
            $table->decimal('chargeable_weight', 10, 2);
            $table->string('goods_description');
            $table->string('dimensions')->nullable();

            // Charges
            $table->enum('transport_charges', ['Prepaid', 'Collect']);
            $table->enum('duties_taxes', ['Shipper', 'Consignee', 'Importer']);
            $table->decimal('insurance_amount', 12, 2)->nullable();

            // Tracking
            $table->string('status')->default('Booked');

            $table->timestamps();

            // Indexes for performance
            $table->index('origin');
            $table->index('destination');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};
