<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('points')->default(180);
            $table->boolean('gopay_linked')->default(false);
            $table->boolean('ovo_linked')->default(false);
            $table->boolean('notif_booking')->default(true);
            $table->boolean('notif_promo')->default(true);
            $table->boolean('notif_chat')->default(true);
            $table->string('language')->default('id');
            $table->boolean('dark_mode')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'points',
                'gopay_linked',
                'ovo_linked',
                'notif_booking',
                'notif_promo',
                'notif_chat',
                'language',
                'dark_mode'
            ]);
        });
    }
};
