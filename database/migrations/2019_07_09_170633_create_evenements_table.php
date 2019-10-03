<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvenementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evenements', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('idevenements');
            $table->string('titre_evenement')->nullable();
            $table->text('description')->nullable();
            $table->dateTime('date_evenement')->nullable();
            $table->dateTime('date_creation_event')->nullable();
            $table->dateTime('update_creation_event')->nullable();
            $table->unsignedBigInteger('createur_event');
            $table->string('avatar_event')->nullable();
            $table->timestamps();

            $table->foreign('createur_event')
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
        Schema::dropIfExists('evenements');
    }
}
