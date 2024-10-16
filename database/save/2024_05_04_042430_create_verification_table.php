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
        Schema::create('verifications', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->nullable();
            $table->tinyText('name')->nullable();
            $table->tinyText('sub_name')->nullable();
            $table->tinyText('sub2_name')->nullable();
            $table->string('report_type')->nullable();
            $table->double('fee')->nullable();
            $table->double('discount')->nullable();
            $table->string('type')->nullable();
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
        Schema::dropIfExists('verifications');
    }
};
