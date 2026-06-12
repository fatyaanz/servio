<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table(
            'diagnosis_produks',
            function (Blueprint $table) {

                $table->boolean('is_selected')
                    ->default(false)
                    ->after('qty');

            }
        );
    }

    public function down()
    {
        Schema::table(
            'diagnosis_produks',
            function (Blueprint $table) {

                $table->dropColumn(
                    'is_selected'
                );

            }
        );
    }
};