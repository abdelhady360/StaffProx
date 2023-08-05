<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('companie_id')->unsigned();
            $table->string('name');
            $table->string('passport_number');
            $table->date('passpor_start');
            $table->date('passpor_end');
            $table->string('dob');
            $table->string('nationality');
            $table->string('sex');
            $table->date('visa_start');
            $table->date('visa_end');
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
        Schema::dropIfExists('visas');
    }
}
