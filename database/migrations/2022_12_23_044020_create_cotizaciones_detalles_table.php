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
        Schema::create('cotizaciones_detalles', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad');
            $table->foreignId('producto_id'); 
            $table->double('preciototal');
            $table->foreignId('cotizacion_id'); 
            $table->foreign('producto_id')->references('id')->on('productos');
            $table->foreign('cotizacion_id')->references('id')->on('cotizaciones');
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
        Schema::dropIfExists('cotizaciones_detalles');
    }
};
