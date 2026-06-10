<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        DB::statement("
            ALTER TABLE bookings
            MODIFY status ENUM(
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
            )
            DEFAULT 'pending'
        ");
    }

    public function down()
    {
        DB::statement("
            ALTER TABLE bookings
            MODIFY status ENUM(
                'pending',
                'accepted',
                'on_the_way',
                'diagnosis',
                'waiting_approval',
                'working',
                'payment',
                'completed',
                'cancelled'
            )
            DEFAULT 'pending'
        ");
    }
};