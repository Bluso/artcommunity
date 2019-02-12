<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsActivitysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_activitys', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cate_id')->nullable();
            $table->string('title');
            $table->string('description');
            $table->text('detail');
            $table->string('thumb');
            $table->string('image')->nullable();
            $table->text('keywords')->nullable();
            $table->text('seo')->nullable();
            $table->string('file')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_activitys');
    }
}
