<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('tags');
            $table->integer('weave');
            $table->integer('category');
            $table->integer('sub_category')->nullable();
            $table->integer('gsm');
            $table->integer('trade_name');
            $table->integer('finish');
            $table->string('image_1',150)->nullable();
            $table->string('image_2',150)->nullable();
            $table->string('image_3',150)->nullable();
            $table->integer('color_1')->nullable();
            $table->integer('color_2')->nullable();
            $table->integer('color_3')->nullable();
            $table->integer('color_4')->nullable();
            $table->integer('color_5')->nullable();
            $table->integer('color_6')->nullable();
            $table->integer('blend_1')->nullable();
            $table->integer('percentage_1')->nullable();
            $table->integer('blend_2')->nullable();
            $table->integer('percentage_2')->nullable();
            $table->integer('blend_3')->nullable();
            $table->integer('percentage_3')->nullable();
            $table->integer('blend_4')->nullable();
            $table->integer('percentage_4')->nullable();
            $table->tinyInteger('old_image_1')->nullable();
            $table->tinyInteger('old_image_2')->nullable();
            $table->tinyInteger('old_image_3')->nullable();
            $table->integer('meter');
            $table->integer('yard')->nullable();
            $table->integer('inr');
            $table->integer('usd')->nullable();
            $table->integer('euro')->nullable();
            $table->integer('moq')->nullable();
            $table->integer('certificate')->nullable();
            $table->tinyInteger('insception')->nullable();
            $table->tinyInteger('test')->nullable();
            $table->integer('location')->nullable();
            $table->integer('country')->nullable();
            $table->integer('created_by');
            $table->tinyInteger('is_active')->default('1');
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
        Schema::dropIfExists('products');
    }
}
