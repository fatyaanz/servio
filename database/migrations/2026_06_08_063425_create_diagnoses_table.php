<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('diagnoses', function (Blueprint $table) {

            $table->id();

            $table->foreignId('booking_id')
                ->constrained()
                ->onDelete('cascade');

            $table->text('description');

            $table->decimal(
                'service_fee',
                12,
                2
            )->default(0);

            $table->enum(
                'status',
                [
                    'draft',
                    'sent',
                    'approved',
                    'rejected'
                ]
            )->default('draft');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('diagnoses');
    }
};