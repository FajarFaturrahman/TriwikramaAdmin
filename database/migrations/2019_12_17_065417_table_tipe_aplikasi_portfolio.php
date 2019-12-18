<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableTipeAplikasiPortfolio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipe_aplikasi_portofolio', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('tipe_website', ['Corporate', 'E-Commerce', 'Web App', 'Mobile App']);            
            $table->integer('portofolio_id')->unsigned();
            $table->foreign('portofolio_id')->references('id')->on('portofolio')->onDelete('cascade');
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
        Schema::dropIfExists('tipe_aplikasi_portofolio');
    }
}
