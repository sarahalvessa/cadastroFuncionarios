<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id('func_id');
            $table->string('nome');
            $table->date('data_nascimento');
            $table->unsignedBigInteger('cargo_id');
            $table->timestamps();
            $table->tinyInteger('deleted_at')->default(0);

            $table->foreign('cargo_id')->references('cargo_id')->on('cargos');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('funcionarios');
    }
};
