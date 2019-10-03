<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('idformations');
            $table->string('ecole')->nullable();
            $table->string('diplome_obtenu')->nullable();
            $table->string('domaine_etude')->nullable();
            $table->string('resultat_obtenu')->nullable();
            $table->string('annee_debut', 45)->nullable();
            $table->string('annee_fin', 45)->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('users_id');
            $table->dateTime('date_creation_formation')->nullable();
            $table->dateTime('update_creation_formation')->nullable();
            $table->timestamps();

            $table->foreign('users_id')
                ->references('idutilisateurs')->on('utilisateurs')
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
        Schema::dropIfExists('formations');
    }
}
