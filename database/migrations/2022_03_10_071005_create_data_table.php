<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataTable extends Migration
{
    public function up()
    {
        Schema::create('data_pengguna', function (Blueprint $table) {
            $table->id();
            $table->string('data_foto')->nullable();
            $table->string('data_nama_lengkap')->nullable();
            $table->string('data_alamat_lengkap')->nullable();
            $table->string('data_jenis_kelamin')->nullable();
            $table->integer('data_usia_ukur')->nullable(); // BULAN
            $table->dateTime('data_tanggal_lahir')->nullable();
            $table->float('data_berat')->nullable();
            $table->float('data_tinggi')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('data_pengguna');
    }
}
