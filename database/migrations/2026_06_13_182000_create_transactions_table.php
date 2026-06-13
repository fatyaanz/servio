<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('booking_id')
                ->constrained('bookings')
                ->onDelete('cascade');
                
            $table->foreignId('customer_id')
                ->constrained('users')
                ->onDelete('cascade');
                
            $table->foreignId('provider_id')
                ->constrained('users')
                ->onDelete('cascade');
                
            $table->decimal('amount', 12, 2);
            $table->decimal('service_fee', 12, 2);
            $table->decimal('app_fee', 12, 2);
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
