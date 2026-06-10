<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('provider_services', function (Blueprint $table) {

            $table->id();

            $table->foreignId('provider_id')
                ->constrained('users')
                ->onDelete('cascade');

            $table->foreignId('category_id')
                ->constrained('categories')
                ->onDelete('cascade');

            $table->enum('status', [
                'pending',
                'approved',
                'rejected'
            ])->default('pending');

            $table->text('reject_reason')->nullable();

            $table->timestamp('approved_at')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('provider_services');
    }
};