<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()

    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('merchant')->default('1828938');
            $table->integer('dynamic')->default(1);
            $table->string('currency')->default('USD');
            $table->string('name')->string('Essay Writing Service');
            $table->string('price');
            $table->integer('qty')->default(1);
            
            //User Request
            $table->string('userName')->nullable();
            $table->string('email')->nullable();
            $table->string('country')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();

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
        Schema::dropIfExists('invoices');
    }
}
