<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('identity_verifications', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('applicantId')->nullable();
            $table->string('sourceKey')->nullable();
            $table->string('externalUserId')->nullable();
            $table->string('content')->nullable();
            $table->string('country')->nullable();
            $table->string('idDocType')->nullable();
            $table->string('idDocSubType')->nullable();
            $table->string('firstName')->nullable();
            $table->string('lastName')->nullable();
            $table->string('middleName')->nullable();
            $table->string('issuedDate')->nullable();
            $table->string('validUntil')->nullable();
            $table->string('docNumber')->nullable();
            $table->string('dob')->nullable();
            $table->string('placeOfBirth')->nullable();
            $table->string('imageID')->nullable();
            $table->string('fee')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('identity_verification');
    }
};
