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
        Schema::create('detalle_subcategoria_productos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subcategoria_id');
            $table->foreignId('producto_id');
            $table->foreign('subcategoria_id')->references('id')->on('subcategorias');
            $table->foreign('producto_id')->references('id')->on('productos');
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
        Schema::dropIfExists('detalle_subcategoria_productos');
    }
};
