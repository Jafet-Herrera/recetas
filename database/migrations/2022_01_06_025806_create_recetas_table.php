<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recetas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->comment('El usuario que crea la receta');
            $table->foreignId('categoria_id')->constrained('categoria_recetas')->comment('La categoría de la receta');
            $table->string('titulo');//VARHCAR limita a 255 caracteres 
            $table->text('ingredientes');
            $table->text('preparacion');
            $table->string('imagen');
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
        Schema::dropIfExists('recetas');
    }
}
