<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('category_requests', function (Blueprint $table) {

            $table->id();

            $table->foreignId('provider_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->foreignId('category_id')
                ->constrained('categories')
                ->cascadeOnDelete();

            $table->string('certificate_file');

            $table->enum(
                'status',
                [
                    'pending',
                    'approved',
                    'rejected'
                ]
            )->default('pending');

            $table->text('rejection_reason')
                ->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(
            'category_requests'
        );
    }
};