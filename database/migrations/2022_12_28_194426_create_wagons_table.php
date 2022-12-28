<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWagonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wagons', function (Blueprint $table) {
            $table->id();
            $table->integer('wagennummer');
            $table->string('gattungsbuchstabe');
            $table->float('längeüberpuffer');
            $table->integer('eigenmasse');
            $table->integer('Anzahl der Acshen');
            $table->integer('Gewicht der Ladung');
            $table->integer('Bremsgewicht');
            $table->string('lastwechsel und bremsgewicht');
            $table->string('hinweise zu reibungsbremse');
            $table->string('bemerkungen zur feststellbremse');
            $table->string('lademaßüberschreitung');
            $table->string('außergewöhnliche sendung');
            $table->string('schadwagen');
            $table->string('windgefährdete ladung');
            $table->string('Beladen mit gefahrgut');
            $table->integer('UN-Nummer');
            $table->string('versandbanhof');
            $table->string('bestimmungsbanhof');
            $table->date('datum');



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
        Schema::dropIfExists('wagons');
    }
}