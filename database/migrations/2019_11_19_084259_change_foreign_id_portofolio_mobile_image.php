<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeForeignIdPortofolioMobileImage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gambar_mobile_portofolio', function($table){
            $table->renameColumn('id_portofolio', 'portofolio_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gambar_mobile_portofolio', function($table){
            $table->renameColumn('portofolio_id', 'id_portofolio');
        });
    }
}
