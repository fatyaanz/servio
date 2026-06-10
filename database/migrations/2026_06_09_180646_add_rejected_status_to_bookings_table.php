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
     public function up(): void
    {
        DB::statement("
            ALTER TABLE bookings
            MODIFY COLUMN status ENUM(
                'pending',
                'accepted',
                'on_the_way',
                'diagnosis',
                'waiting_approval',
                'approved',
                'working',
                'payment',
                'completed',
                'cancelled',
                'rejected'
            ) NOT NULL
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
   public function down(): void
    {
        DB::statement("
            ALTER TABLE bookings
            MODIFY COLUMN status ENUM(
                'pending',
                'accepted',
                'on_the_way',
                'diagnosis',
                'waiting_approval',
                'approved',
                'working',
                'payment',
                'completed',
                'cancelled'
            ) NOT NULL
        ");
    }
};
