<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClanaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clanaks', function (Blueprint $table) {
            $table->id();
            $table->string('naslov',50);
            $table->string('tekst',300);
         
            $table->foreignId('autorId')->constrained('korisniks');
            $table->timestamp('datumObjavljivanja');
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
        Schema::dropIfExists('clanaks');
    }
}
