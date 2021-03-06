<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('source_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_en');
            $table->timestamps();
        });
        Schema::create('sources', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('link');
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')->references('id')
                ->on('source_types')
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
        Schema::dropIfExists('sources');
        Schema::dropIfExists('source_types');
    }
}
