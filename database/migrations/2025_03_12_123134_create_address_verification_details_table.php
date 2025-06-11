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
        Schema::create('address_verification_details', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('address_verification_id')->constrained()->onDelete('cascade');
            $table->string('address_verification_id');
            $table->foreign('address_verification_id')
                ->references('service_reference')
                ->on('address_verifications')
                ->onDelete('cascade');

            $table->string('entity_name')->nullable();
            $table->string('type')->nullable();
            $table->string('document_id')->nullable();
            $table->string('status')->nullable();
            $table->string('outcome')->nullable();
            $table->string('document_type')->nullable();
            $table->string('issuer')->nullable();
            $table->string('issuing_date')->nullable();
            $table->text('address')->nullable();
            $table->string('address_line')->nullable();
            $table->string('address_country')->nullable();
            $table->string('ip_address_lat_ong')->nullable();
            $table->text('clientValidation')->nullable();
            $table->text('content_analysis')->nullable();
            $table->string('geoLocation_analysis')->nullable();
            $table->string('document_side')->nullable();
            $table->string('file_name')->nullable();
            $table->string('content_type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('address_verification_details');
    }
};
