<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZugsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zugs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nachname')->nullable();
            $table->string('versandbanhof');
            $table->string('bestimmungsbanhof');
            $table->string('datum');
            $table->string('zugnummer');
            $table->string('ref');
            $table->string('Mindestbremshunderstel');
            $table->string('bossid');
            $table->string('userid')->nullable();
            $table->string('logo')->default('nologo.png');
            $table->string('seczugnummer')->nullable();
            $table->string('betriebsstelle');
            $table->string('secbetriebsstelle')->nullable();
            $table->string('evu')->nullable();
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
        Schema::dropIfExists('zugs');
    }
}
