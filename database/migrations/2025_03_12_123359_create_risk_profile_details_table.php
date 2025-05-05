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
        Schema::create('risk_profile_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidate_id')->constrained()->onDelete('cascade');
            $table->string('service_reference')->nullable();
            $table->string('overall')->nullable();
            $table->string('risk')->nullable();
            $table->longText('breakdown')->nullable();
            $table->string('country')->nullable();
            $table->string('political_exposure_risk')->nullable();
            $table->string('occupation_risk')->nullable();
            $table->string('watchlist_risk')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('risk_profile_details');
    }
};
