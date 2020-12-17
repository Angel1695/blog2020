<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idreferencias')->nullable();
            $table->foreign('idreferencias')->references('id')->on('referencias');

            $table->integer('idcapitulos')->unsigned();
            $table->foreign('idcapitulos')->references('id')->on('capitulos');

            $table->integer('idpractica')->nullable();
            $table->foreign('idpractica')->references('id')->on('practicas');

            $table->integer('idtabla')->nullable();
            $table->foreign('idtabla')->references('id')->on('tablas');

            $table->string('titular');
            $table->string('autor');
            $table->string('fercha');
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
        Schema::dropIfExists('blog');
    }
}
