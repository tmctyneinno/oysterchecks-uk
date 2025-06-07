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
        Schema::create('age_estimations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained()->onDelete('cascade');
            $table->string('service_reference')->nullable();
            $table->string('download_link')->nullable();
            $table->string('content_type')->nullable();
            $table->string('perform_liveness_check')->nullable();
            $table->string('size')->nullable();
            $table->string('entity_name')->nullable();
            $table->string('live_photo_id')->nullable();
            $table->string('type')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('age_estimations');
    }
};
