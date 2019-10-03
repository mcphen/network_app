<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocalisationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('localisation', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('idlocalisation');
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('pays_id');
            $table->string('ville')->nullable();
            $table->timestamps();

            $table->foreign('users_id')
                ->references('idutilisateurs')->on('utilisateurs')
                ->onDelete('cascade');

            $table->foreign('pays_id')
                ->references('idpays')->on('pays')
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
        Schema::dropIfExists('localisation');
    }
}
