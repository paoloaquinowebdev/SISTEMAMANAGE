<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerfiluserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfiluser', function (Blueprint $table) {
            $table->bigInteger('idperfil');
            $table->bigInteger('iduser');
            $table->dateTimeTz('fecha_creacion');
            $table->bigInteger('usuario_creacion');
            $table->dateTimeTz('fecha_modificacion');
            $table->bigInteger('usuario_modificacion');
            $table->primary(['idperfil', 'iduser']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perfiluser');
    }
}
