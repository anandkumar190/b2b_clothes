<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWrapCountToProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
           $table->integer('wrap_count_A');
           $table->integer('wrap_count_B')->nullable();
           $table->integer('wrap_count_C')->nullable();
           $table->integer('weft_count_A');
           $table->integer('weft_count_B')->nullable();
           $table->integer('weft_count_C')->nullable();
           $table->integer('reed');
           $table->integer('pick');
           $table->integer('width_inch');
           $table->integer('width_cm');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
}
