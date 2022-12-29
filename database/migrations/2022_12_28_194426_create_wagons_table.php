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
            $table->string('wagennummer');
            $table->string('gattungsbuchstabe');
            $table->string('längeüberpuffer');
            $table->string('eigenmasse');
            $table->string('AnzahlderAcshen');
            $table->string('GewichtderLadung');
            $table->string('Bremsgewicht');
            $table->string('lastwechselundbremsgewicht');
            $table->string('hinweisezureibungsbremse');
            $table->string('bremsstellung');
            $table->string('bemerkungenzurfeststellbremse');
            $table->string('bemerkung');
            $table->string('Schadwagen');
            $table->string('Beladenmitgefahrgut');
            $table->string('UNNummer');
            $table->string('versandbanhof')->nullable();
            $table->string('bestimmungsbanhof')->nullable();
            $table->string('datum')->nullable();



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