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
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('applicantId')->nullable();
            $table->string('externalUserId')->nullable();
            $table->string('key')->nullable();
            $table->string('inspectionId')->nullable();
            $table->string('sourceKey')->nullable();
            $table->string('applicant_type')->nullable();
            $table->string('companyname')->nullable();
            $table->string('firstName')->nullable();
            $table->string('lastName')->nullable();
            $table->string('middleName')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('placeofbirth')->nullable();
            $table->string('dateofbirth')->nullable();
            $table->string('country')->nullable();
            $table->string('countryofbirth')->nullable();
            $table->string('gender')->nullable();
            $table->string('address')->nullable();
            $table->string('registrationnumber')->nullable();
            $table->string('companycreateddate')->nullable();
            $table->string('companyType')->nullable();
            $table->longText('info')->nullable();
            $table->longText('companyInfo')->nullable();
            $table->longText('review')->nullable();
            $table->string('taxpayer')->nullable();
            $table->string('websitelink')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('applicants');
    }
};
