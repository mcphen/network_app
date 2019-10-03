<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('idlikes');
            $table->unsignedBigInteger('posts_id');
            $table->unsignedBigInteger('users_idutilisateurs');
            $table->timestamps();

            $table->foreign('users_idutilisateurs')
                ->references('idutilisateurs')->on('utilisateurs')
                ->onDelete('cascade');

                $table->foreign('posts_id')
                ->references('idposts')->on('posts')
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
        Schema::dropIfExists('likes');
    }
}
