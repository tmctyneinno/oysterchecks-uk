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
        Schema::create('bureau_check_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bureau_check_id')->constrained()->onDelete('cascade');
            $table->string('service_reference')->nullable();
            $table->string('address_id')->nullable();
            $table->string('line')->nullable();
            $table->string('city')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('type')->nullable();
            $table->string('entity_name')->nullable();
            $table->string('status')->nullable();
            $table->string('outcome')->nullable();
            $table->tinyText('breakdown')->nullable();
            $table->text('address')->nullable();
            $table->text('dob')->nullable();
            $table->string('id_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bureau_check_details');
    }
};
