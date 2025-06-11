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
        Schema::create('aml_verification_details', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('aml_verification_id')->constrained()->onDelete('cascade');
            $table->string('aml_verification_id');
            $table->foreign('aml_verification_id')
                ->references('service_reference')
                ->on('aml_verification')
                ->onDelete('cascade');
            $table->string('service_reference')->nullable();
            $table->string('client_ref')->nullable();
            $table->string('outcome')->nullable();
            $table->string('status')->nullable();
            $table->text('pep')->nullable();
            $table->text('watchlist')->nullable();
            $table->text('otherLists')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aml_verification_details');
    }
};
