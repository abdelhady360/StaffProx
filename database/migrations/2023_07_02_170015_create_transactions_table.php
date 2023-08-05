<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->integer('lfees');
            $table->integer('ofees');
            $table->string('emirate');
            $table->string('authority');
            $table->longText('url');
            $table->longText('info');
            $table->longText('sinfo');
            $table->longText('note')->nullable();
            $table->longText('doc');
            $table->string('slug')->unique();
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
        Schema::dropIfExists('transactions');
    }
}
