<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilpemeriksaansTable extends Migration
{
    public function up()
    {
        Schema::create('hasil_pemeriksaan', function (Blueprint $table) {
            $table->id();
            $table->integer('hasil_umur_ukur')->nullable(); // BULAN
            $table->dateTime('hasil_tanggal_lahir')->nullable();
            $table->float('hasil_berat')->nullable();
            $table->float('hasil_tinggi')->nullable();
            $table->float('hasil_berat_total')->nullable();
            $table->float('hasil_tinggi_total')->nullable();

            $table->unsignedBigInteger('data_id')->nullable()->default(null);
            $table->foreign('data_id')->references('id')->on('data_pengguna')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hasil_pemeriksaan');
    }
}
