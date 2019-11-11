<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePortofolioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portofolio', function (Blueprint $table) {
            $table->increments('id_portofolio');
            $table->string('nama_aplikasi', 100);
            $table->enum('tipe_website', ['Corporate', 'E-Commerce', 'Web App', 'Mobile App']);
            $table->enum('platform',  ['Web Application', 'Mobile Aplication', 'Responsive Web Application']);
            $table->string('domain_portofolio', 100);
            $table->enum('status', ['active','expired']);
            $table->longText('description');        
            $table->integer('id_client')->unsigned();
            $table->foreign('id_client')->references('id_client')->on('client');
            $table->date('tanggal_dibuat');        
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
        Schema::dropIfExists('portofolio');
    }
}
