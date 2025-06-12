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
        Schema::create('identity_verification_details', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('identity_verification_id')->constrained()->onDelete('cascade');
            $table->string('identity_verification_id');
            // $table->foreign('identity_verification_id')
            //     ->references('service_reference')
            //     ->on('identity_verifications')
            //     ->onDelete('cascade');

            $table->string('entity_name')->nullable();
            $table->string('type')->nullable();
            $table->string('document_id')->nullable();
            $table->string('live_photo_id')->nullable();
            $table->string('status')->nullable();
            $table->longText('faceAnalysis')->nullable();
            $table->longText('authenticityAnalysis')->nullable();
            $table->longText('integrityAnalysis')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('identity_verification_details');
    }
};
