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
        Schema::create('polluted_sites', function (Blueprint $table) {
            $table->id('S_ID');
            $table->string('S_Name');
            $table->string('Pollutant_type');
            $table->string('Region');
            $table->string('username');
            $table->float('Level_of_PH');
            $table->float('Amount_of_waste_materials');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('polluted_sites');
    }
};
