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
            $table->string('nama_perusahaan');
            $table->integer('target')->nullable();
            $table->integer('tanggal')->nullable();
            $table->integer('bulan')->nullable();
            $table->integer('tahun')->nullable();
            $table->timestamp('waktu_kunjungan')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('nama_pic');
            $table->string('contact_no_pic');
            $table->string('produk');
            $table->integer('harga');
            $table->date('waktu_pembelian');
            $table->string('lainlain');
            $table->string('foto');
            $table->string('alasan')->nullable();
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
