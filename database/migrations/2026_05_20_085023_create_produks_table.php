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
        Schema::create('produks', function (Blueprint $table) {

            $table->id();

            $table->string('nama_produk');

            $table->string('foto')->nullable();

            $table->integer('harga');

            $table->integer('stok');

            $table->string('satuan');

            $table->text('deskripsi')->nullable();

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
        Schema::dropIfExists('produks');
    }
};
