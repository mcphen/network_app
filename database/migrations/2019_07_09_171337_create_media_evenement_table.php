<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaEvenementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_evenement', function (Blueprint $table) {

            $table->engine = 'InnoDB';
            $table->bigIncrements('idmedia_evenement');
            $table->string('libelle_media')->nullable();
            $table->unsignedBigInteger('event_id');
            $table->timestamps();

            $table->foreign('event_id')
                ->references('idevenements')->on('evenements')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media_evenement');
    }
}
