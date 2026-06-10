<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {

            $table->id();

            $table->foreignId('customer_id')
                ->constrained('users')
                ->onDelete('cascade');

            $table->foreignId('provider_id')
                ->constrained('users')
                ->onDelete('cascade');

            $table->text('address');

            $table->text('location_note')
                ->nullable();

            $table->date('booking_date');

            $table->time('booking_time');

            $table->text('notes')
                ->nullable();

            $table->enum(
                'status',
                [
                    'pending',
                    'accepted',
                    'on_the_way',
                    'diagnosis',
                    'waiting_approval',
                    'working',
                    'payment',
                    'completed',
                    'cancelled',
                    'rejected'
                ]
            )->default('pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
};
