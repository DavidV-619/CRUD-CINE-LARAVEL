<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_peliculas', function (Blueprint $table) {
            $table->id();

            $table->string('Nombre');
            $table->string('Poster')->nullable();
            $table->time('Duracion');
            $table->string('Clasificacion');

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
        Schema::dropIfExists('m_peliculas');
    }
};
