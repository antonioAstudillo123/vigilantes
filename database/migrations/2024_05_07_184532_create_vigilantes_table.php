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
        Schema::create('vigilantes', function (Blueprint $table) {
            $table->id();
            $table->string('numeroEmpleado');
            $table->string('nombreCompleto');
            $table->unsignedBigInteger('idPlantel');
            $table->timestamps();

            $table->foreign('idPlantel')->references('id')->on('planteles')->onUpdate('cascade')
            ->onDelete('cascade');;

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vigilantes');
    }
};
