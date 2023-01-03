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
            $table->string('Beladenmitgefahrgut')->nullable();
            $table->string('UNNummer')->nullable();
            $table->string('versandbanhof');
            $table->string('bestimmungsbanhof');
            $table->string('datum');
            $table->string('a')->nullable();
            $table->string('b')->nullable();
            $table->string('d')->nullable();
            $table->string('e')->nullable();
            $table->string('k')->nullable();
            $table->string('l')->nullable();
            $table->string('h')->nullable();
            $table->string('sh')->nullable();
            $table->string('bm')->nullable();
            $table->string('fir')->nullable();
            $table->string('sec')->nullable();
            $table->string('thir')->nullable();
            $table->string('four')->nullable();
            $table->string('five')->nullable();
            $table->string('ge')->nullable();

            





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