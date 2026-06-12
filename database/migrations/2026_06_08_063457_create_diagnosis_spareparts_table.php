<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create(
            'diagnosis_spareparts',
            function (Blueprint $table) {

                $table->id();

                $table->foreignId('diagnosis_id')
                    ->constrained()
                    ->onDelete('cascade');

                $table->foreignId('sparepart_id')
                    ->constrained()
                    ->onDelete('cascade');

                $table->integer('qty')
                    ->default(1);

                $table->timestamps();
            }
        );
    }

    public function down()
    {
        Schema::dropIfExists(
            'diagnosis_spareparts'
        );
    }
};