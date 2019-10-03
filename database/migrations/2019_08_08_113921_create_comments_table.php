<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('posts_id');
            $table->unsignedBigInteger('users_idutilisateurs');
            $table->text('comment');
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
        Schema::dropIfExists('comments');
    }
}
