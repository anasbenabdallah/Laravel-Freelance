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
        Schema::table('claimcomments', function (Blueprint $table) {
            $table->softDeletes(); // Ajoute la colonne 'deleted_at' pour la suppression douce
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('claimcomments', function (Blueprint $table) {
            $table->dropColumn('deleted_at'); // Supprime la colonne 'deleted_at'
        });
    }
};
