<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CreateMerchantsTable extends Migration
{
    /*
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {

        /*
         * Table: merchants
         */
        Schema::create('merchants', function ($table) {
            $table->increments('id');
            $table->string('merchant_name', 100)->nullable();
            $table->string('username', 100)->nullable();
            $table->string('password', 255)->nullable();
            $table->string('email', 100)->nullable();
            $table->text('address')->nullable();
            $table->text('information')->nullable();
            $table->string('img', 50)->nullable();
            $table->integer('phone')->nullable();
            $table->softDeletes();
            $table->nullableTimestamps();
        });
    }

    /*
    * Reverse the migrations.
    *
    * @return void
    */

    public function down()
    {
        Schema::drop('merchants');
    }
}
