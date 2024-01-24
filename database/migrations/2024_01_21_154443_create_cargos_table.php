<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cargos', function (Blueprint $table) {
            $table->id('cargo_id');
            $table->string('nome');
            $table->unsignedBigInteger('departamento_id');
            $table->timestamps();

            $table->foreign('departamento_id')->references('departamento_id')->on('departamentos');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cargos');
    }
};
