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
            $table->string('nama_pic')->nullable();
            $table->string('contact_no_pic')->nullable();
            $table->string('produk')->nullable();
            $table->integer('harga')->nullable();
            $table->date('waktu_pembelian')->nullable();
            $table->string('lainlain')->nullable();
            $table->string('foto')->nullable();
            $table->string('alasan')->nullable();
            $table->string('status');
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
