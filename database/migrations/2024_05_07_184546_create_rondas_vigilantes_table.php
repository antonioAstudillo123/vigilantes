<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rondas_vigilantes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idVigilante');
            $table->time('hora');
            $table->date('dia');
            $table->timestamps();

            $table->foreign('idVigilante')->references('id')->on('vigilantes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rondas_vigilantes');
    }
};
