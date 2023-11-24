<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();

            $table->string('title');

            $table->date('datedebut')->nullable();

            $table->date('datefin')->nullable();

            $table->string('etattache')->nullable();

            $table->unsignedBigInteger('id_project')->nullable();

            // $table->foreign('id_project', 'id_project_fk_4914119')->references('id')->on('projects');

            $table->timestamps();

            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            // $table->dropForeign('id_project_fk_4914119');
        });

        Schema::dropIfExists('tasks');
    }
}
