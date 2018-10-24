<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('papertype_id');
            $table->integer('educationlevel_id');
            $table->integer('style_id');
            $table->string('subject_id');
            $table->integer('deadline');
            $table->string('pages');
            $table->integer('user_id');
            $table->decimal('total',10,2);
            $table->text('requirement');
            $table->string('status');
            $table->string('website')->nullable();
            $table->boolean('is_assigned')->default(0); //Order assigned or not 0 for boolean
            $table->string('paid_orderid')->nullable();
            $table->boolean('is_completed')->default(0); // Order completed 0 for not
            $table->text('completed_file')->nullable();
        
            $table->softDeletes();
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
        Schema::dropIfExists('orders');
    }
}
