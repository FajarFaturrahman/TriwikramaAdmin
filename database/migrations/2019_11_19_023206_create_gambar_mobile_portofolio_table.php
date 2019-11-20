<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGambarMobilePortofolioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gambar_mobile_portofolio', function (Blueprint $table) {
            $table->increments('id');
            $table->string('gambar_mobile', 100);            
            $table->integer('id_portofolio')->unsigned();
            $table->foreign('id_portofolio')->references('id')->on('portofolio')->onDelete('cascade');
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
        Schema::dropIfExists('gambar_mobile_portofolio');
    }
}
