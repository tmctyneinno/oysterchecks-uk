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
        Schema::create('bureau_checks', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('client_id')->constrained()->onDelete('cascade');
            $table->string('client_id');
            $table->foreign('client_id')
                ->references('client_id')
                ->on('clients')
                ->onDelete('cascade');
            $table->string('service_reference')->nullable();
            $table->string('line')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('status')->nullable();
            $table->string('country')->nullable();
            $table->string('type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bureau_checks');
    }
};
