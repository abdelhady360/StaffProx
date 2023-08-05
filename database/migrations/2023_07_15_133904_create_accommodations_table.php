<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccommodationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accommodations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('companie_id')->unsigned();
            $table->string('name');
            $table->string('passport_number');
            $table->date('passpor_start');
            $table->date('passpor_end');
            $table->date('dob');
            $table->string('id_number');
            $table->string('unified_no');
            $table->string('nationality');
            $table->string('sex');
            $table->date('accommodation_start');
            $table->date('accommodation_end');
            $table->date('PermitWork_start');
            $table->date('PermitWork_end');
            $table->longText('slug');
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
        Schema::dropIfExists('accommodations');
    }
}
