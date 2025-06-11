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
        Schema::create('document_verification_details', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('document_verification_id')->constrained()->onDelete('cascade');
            $table->string('document_verification_id');
            $table->foreign('document_verification_id')
                ->references('service_reference')
                ->on('document_verifications')
                ->onDelete('cascade');
            $table->string('entity_name')->nullable();
            $table->string('type')->nullable();
            $table->string('client_ref')->nullable();
            $table->string('document_id')->nullable();
            $table->string('status')->nullable();
            $table->string('outcome')->nullable();
            $table->string('document_type')->nullable();
            $table->string('has_two_sides')->nullable();
            $table->string('issuing_country')->nullable();
            $table->string('issuing_date')->nullable();
            $table->string('document_number')->nullable();
            $table->string('last_name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('gender')->nullable();
            $table->string('dob')->nullable();
            $table->string('nationality')->nullable();
            $table->string('mrz1')->nullable();
            $table->string('mrz2')->nullable();
            $table->string('mrzFormat')->nullable();
            $table->string('mrzChecksum')->nullable();
            $table->string('basicAccessControl')->nullable();
            $table->string('chipAuthentication')->nullable();
            $table->string('passiveAuthentication')->nullable();
            $table->string('activeAuthentication')->nullable();
            $table->string('pace')->nullable();
            $table->string('chipAndVisualFacialSimilarity')->nullable();
            $table->longText('consistencyAnalysis')->nullable();
            $table->longText('contentAnalysis')->nullable();
            $table->longText('formatAnalysis')->nullable();
            $table->longText('forensicAnalysis')->nullable();
            $table->longText('frontAndBackAnalysis')->nullable();
            $table->longText('extractedImages')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_verification_details');
    }
};
