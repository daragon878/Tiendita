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
        Schema::create('compania', function (Blueprint $table) {
            $table->id();
            $table->string('Ruc');
            $table->string('Razzon_Social');
            $table->string('Sucursal');
            $table->string('Direccion');
            $table->string('Num_Telefono');
            $table->string('correo');
            $table->string('Rugro');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compania');
    }
};
