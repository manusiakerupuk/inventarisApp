<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukubarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bukubarangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('barangID');
            $table->date('tanggal');
            $table->integer('jumlah');
            $table->string('hargasatuan', 255);
            $table->string('nomor', 255);
            $table->string('jumlahharga', 255);
            $table->string('keterangan', 255);
            $table->string('tipe', 255);
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
        Schema::dropIfExists('bukubarangs');
    }
}
