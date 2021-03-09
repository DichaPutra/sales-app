<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKunjunganTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('kunjungan', function (Blueprint $table) {
            $table->id();
            //$table->increments('kunjungan_id');
            
            
//            $table->foreignId('user_id')->constrained();
            $table->BigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('user');
//            $table->foreignId('customer_id')->constrained();
            $table->BigInteger('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customer');
            
            $table->integer('target');
            $table->integer('tanggal');
            $table->integer('bulan');
            $table->integer('tahun');
            $table->date('waktu_kunjungan');
            $table->string('nama_pic');
            $table->string('contact_no_pic');
            $table->string('produk');
            $table->integer('harga');
            $table->date('waktu_pembelian');
            $table->string('lainlain');
            $table->string('foto');
            $table->string('alasan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('kunjungan');
    }

}
