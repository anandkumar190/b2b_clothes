<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlendContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blend_contents', function (Blueprint $table) {
            $table->id();
            $table->string('blend_content_name',150);
            $table->integer('created_by');
            $table->tinyInteger('is_active')->comment('1 for active 0 for inactive');
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
        Schema::dropIfExists('blend_contents');
    }
}
