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
        Schema::create('evenimente', function (Blueprint $table) {
            $table->id();
            $table->string('nume');
            $table->text('descriere')->nullable();
            $table->string('adresa', 50)->nullable();
            $table->integer('pret')->nullable();
            $table->dateTime('data');
            $table->string('telefon', 20)->nullable();
            $table->string('email', 100)->nullable();
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
        Schema::dropIfExists('evenimente');
    }
};
