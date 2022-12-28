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
            $table->string('nachname');
            $table->string('versandbanhof');
            $table->string('bestimmungsbanhof');
            $table->date('datum');
            $table->integer('zugnummer');
            $table->integer('ref');
            $table->string('Mindestbremshunderstel');
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
