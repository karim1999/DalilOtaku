<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animes', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title')->nullable();
            $table->boolean('isAiring')->default(false);
            $table->date('start_at');
            $table->date('end_at')->nullable();
            $table->double('score')->default(0);
            $table->longText('description')->nullable();
            $table->string('image_url');
            $table->unsignedBigInteger('studio_id');
            $table->foreign('studio_id')->references('id')
                ->on('studios')
                ->onDelete('cascade');
            $table->integer('episodes')->nullable();
            $table->integer('last_episode')->nullable();
            $table->integer('airingAt')->nullable();
            $table->string('broadcast')->nullable();
            $table->string('season');
            $table->string('year');

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
        Schema::dropIfExists('animes');
    }
}
