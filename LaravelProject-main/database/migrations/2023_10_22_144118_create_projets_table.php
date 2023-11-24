<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetsTable extends Migration
{
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();

            $table->string('titre');

            $table->text('description')->nullable();

            $table->date('date_debut')->nullable();

            $table->date('date_fin')->nullable();

            $table->decimal('budget', 15, 2)->nullable();

            $table->string('competences')->nullable();

            $table->string('etat')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
