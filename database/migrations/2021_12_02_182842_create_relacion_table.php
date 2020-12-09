<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relacion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idcomponente')->unsigned();
            $table->foreign('idcomponente')->references('id')->on('componentes');

            $table->integer('idblog')->unsigned();
            $table->foreign('idblog')->references('id')->on('blog');

            $table->string('valor');
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
        Schema::dropIfExists('relacion');
    }
}
