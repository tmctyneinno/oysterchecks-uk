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
        Schema::create('age_estimation_details', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('age_estimation_id')->constrained()->onDelete('cascade');
            $table->string('age_estimation_id');
            $table->foreign('age_estimation_id')
                ->references('service_reference')
                ->on('age_estimations')
                ->onDelete('cascade');
            $table->string('entity_name')->nullable();
            $table->string('type')->nullable();
            $table->string('live_photo_id')->nullable();
            $table->string('status')->nullable();
            $table->string('outcome')->nullable();
            $table->string('age_estimation_analysis')->nullable();
            $table->string('authenticity_analysis')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('age_estimation_details');
    }
};
