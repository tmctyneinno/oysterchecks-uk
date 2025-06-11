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
        Schema::create('identity_verifications', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('client_id')->constrained()->onDelete('cascade');
            $table->string('client_id');
            $table->foreign('client_id')
                ->references('client_id')
                ->on('clients')
                ->onDelete('cascade');
            $table->string('service_reference')->nullable();
            $table->string('client_ref')->nullable();
            $table->string('type')->nullable();
            $table->string('classification')->nullable();
            $table->string('document_side')->nullable();
            $table->string('file_name')->nullable();
            $table->string('download_link')->nullable();
            $table->string('content_type')->nullable();
            $table->string('size')->nullable();
            $table->string('document_id')->nullable();
            $table->string('live_photo_id')->nullable();
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
        Schema::dropIfExists('identity_verifications');
    }
};
