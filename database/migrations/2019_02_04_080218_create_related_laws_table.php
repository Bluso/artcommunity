<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelatedLawsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('related_laws', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('law_cate_id')->nullable();
            $table->string('title');
            $table->string('description')->nullable();
            $table->text('detail')->nullable();
            $table->string('thumb')->nullable();
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
        Schema::dropIfExists('related_laws');
    }
}
