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
        Schema::create('diagnosis_produks', function (Blueprint $table) {

            $table->id();

            $table->foreignId('diagnosis_id')
                ->constrained()
                ->onDelete('cascade');

            $table->foreignId('produk_id')
                ->constrained('produks')
                ->onDelete('cascade');

            $table->integer('qty')
                ->default(1);

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
        Schema::dropIfExists('diagnosis_produks');
    }
};


