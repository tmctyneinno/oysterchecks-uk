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
        Schema::create('aml_verifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained()->onDelete('cascade');
            $table->string('service_reference')->nullable();
            $table->string('client_ref')->nullable();
            $table->string('entity_name')->nullable();
            $table->string('type')->nullable();
            $table->string('enable_monitoring')->nullable();
            $table->string('status')->nullable();
            $table->dateTime('updated_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aml_verifications');
    }
};
