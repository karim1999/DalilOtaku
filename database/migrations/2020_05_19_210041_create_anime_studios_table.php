<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimeStudiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anime_studios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('studio_id');
            $table->foreign('studio_id')->references('id')
                ->on('studios')
                ->onDelete('cascade');
            $table->unsignedBigInteger('anime_id');
            $table->foreign('anime_id')->references('id')
                ->on('animes')
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
        Schema::dropIfExists('anime_studios');
    }
}
