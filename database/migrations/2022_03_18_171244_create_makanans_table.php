<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMakanansTable extends Migration
{
    public function up()
    {
        Schema::create('makanan', function (Blueprint $table) {
            $table->id();
            $table->string('makanan_gambar')->nullable();
            $table->string('makanan_nama')->nullable();
            $table->integer('makanan_kalori')->nullable();
            $table->float('makanan_karbohidrat')->nullable();
            $table->float('makanan_lemak')->nullable();
            $table->integer('makanan_protein')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('makanan');
    }
}
