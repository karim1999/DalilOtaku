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
        Schema::create('seasons', function (Blueprint $table) {
            $table->id();
            $table->integer("year");
            $table->string("season");
            $table->timestamps();
        });

        Schema::create('animes', function (Blueprint $table) {
            $table->id();
            $table->integer('mal_id');
            $table->string('title_en');
            $table->string('title')->nullable();
            $table->boolean('isAiring')->default(false);
            $table->string('start_at')->nullable();
            $table->date('end_at')->nullable();
            $table->double('score')->default(0)->nullable();
            $table->longText('description')->nullable();
            $table->string('image_url');
            $table->integer('episodes')->nullable();
            $table->integer('last_episode')->nullable();
            $table->integer('airingAt')->nullable();
            $table->string('broadcast')->nullable();
            $table->unsignedBigInteger('season_id');
            $table->foreign('season_id')->references('id')
                ->on('seasons')
                ->onDelete('cascade');

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
        Schema::dropIfExists('seasons');
    }
}
