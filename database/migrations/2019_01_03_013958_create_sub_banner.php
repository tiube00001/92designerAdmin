<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubBanner extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_banner', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->comment('父级banner的id');
            $table->string('main_img')->comment('展示图片');
            $table->string('summary')->comment('描述文字');
            $table->integer('width')->comment('图片宽，单位px');
            $table->integer('height')->comment('图片宽，单位px');
            $table->integer('sort')->comment('序号');
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
        Schema::dropIfExists('sub_banner');
    }
}
