<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGambarPortofolioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gambar_portofolio', function (Blueprint $table) {
            $table->increments('id_gambar_portofolio');
            $table->string('gambar_website', 100);
            $table->string('gambar_mobile', 100);
            $table->integer('id_portofolio')->unsigned();
            $table->foreign('id_portofolio')->references('id_portofolio')->on('portofolio');
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
        Schema::dropIfExists('gambar_portofolio');
    }
}
