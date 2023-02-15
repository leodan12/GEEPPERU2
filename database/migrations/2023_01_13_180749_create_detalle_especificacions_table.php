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
        Schema::create('detalle_especificacions', function (Blueprint $table) {
            $table->id();
            $table->string('dato');
            $table->foreignId('especificacion_id');
            $table->foreignId('producto_id');
            $table->foreign('especificacion_id')->references('id')->on('especificacions');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete("cascade");
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
        Schema::dropIfExists('detalle_especificacions');
    }
};
