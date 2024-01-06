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
        Schema::create('bilete', function (Blueprint $table) {
            $table->id();
            $table->string('tip', 50);
            $table->decimal('pret', 10, 2);
            $table->integer('disponibilitate');
            $table->unsignedBigInteger('id_eveniment')->nullable();
            $table->foreign('id_eveniment')->references('id')->on('evenimente');
            $table->unsignedBigInteger('id_user')->nullable();
            $table->foreign('id_user')->references('id')->on('users');
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
        Schema::dropIfExists('bilete');
    }
};
