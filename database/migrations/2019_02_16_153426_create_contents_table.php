<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->increments('content_id');
            $table->text('front');
            $table->text('detail')->nullable();
            //save image
            $table->string('f_filename')->nullable();
            $table->string('d_filename')->nullable();
            //$table->string('mime')->nullable();
            //$table->string('original_filename')->nullable();

            $table->unsignedInteger('chapter_id');
            $table->foreign('chapter_id')->references('chapter_id')->on('chapters');
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
        Schema::dropIfExists('contents');
    }
}
