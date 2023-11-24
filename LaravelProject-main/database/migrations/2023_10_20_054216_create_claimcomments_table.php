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
        Schema::create('claimcomments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('claim_id'); // Foreign key to claims table
            $table->text('comment_text');
            $table->integer('comment_role');
            $table->timestamps();
    
            $table->foreign('claim_id')->references('id')->on('claims');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('claimcomments');
    }
};
