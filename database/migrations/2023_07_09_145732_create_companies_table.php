<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->date('license_start');
            $table->date('license_end');
            $table->date('icp_start');
            $table->date('icp_end');
            $table->date('insurance_end');
            $table->string('no_facility');
            $table->string('emirate');
            $table->string('phone_number');
            $table->string('license_number');
            $table->string('email');
            $table->string('address');
            $table->string('slug');
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
        Schema::dropIfExists('companies');
    }
}
