<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrats', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('poste');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->float('remuneration');
            $table->string('remarque')->nullable();
            $table->unsignedBigInteger('offre_id')->nullable();
            // Ajoutez cette colonne de clé étrangère
                       $table->timestamps();
                    //   $table->foreign('offre_id')->references('id')->on('offres');
                      // Définit la relation avec la table "offres"
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contrats');
    }
};
