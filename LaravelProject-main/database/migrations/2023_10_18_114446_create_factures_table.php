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
    Schema::create('factures', function (Blueprint $table) {
        $table->id();
        $table->string('client');
        $table->string('caissier');
        $table->decimal('Montant', 8, 2); // Assuming Montant is a decimal value with 8 digits in total and 2 after the decimal point.
        $table->string('Etat'); // You can also use an enum if there are specific states.
        $table->date('date'); // This will create a date column.
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('factures');
    }
};
