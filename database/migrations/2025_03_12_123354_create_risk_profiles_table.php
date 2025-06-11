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
        Schema::create('risk_profiles', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('client_id')->constrained()->onDelete('cascade');
            $table->string('client_id');
            $table->foreign('client_id')
                ->references('client_id')
                ->on('clients')
                ->onDelete('cascade');
            $table->string('service_reference')->nullable();
            $table->string('type')->nullable();
            $table->string('line')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('fromDate')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('risk_profiles');
    }
};
