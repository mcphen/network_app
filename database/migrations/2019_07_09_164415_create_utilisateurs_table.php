<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUtilisateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('idutilisateurs');
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->date('date_naissance')->nullable();
            $table->string('genre', 45)->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->unsignedBigInteger('promotion_id');
            $table->integer('actived')->nullable();
            $table->unsignedBigInteger('role_id');
            $table->string('pics');
            $table->string('banniere');
            $table->string('remember_token');
            $table->integer('first_connexion')->default(0);

            $table->timestamps();

            $table->foreign('promotion_id')
                ->references('idpromotion')->on('promotion')
                ->onDelete('cascade');

            $table->foreign('role_id')
                ->references('idrole')->on('role')
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
        Schema::dropIfExists('utilisateurs');
    }
}
