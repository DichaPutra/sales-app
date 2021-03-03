<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->increments('customer_id');
            $table->string('nama_perusahaan');
            $table->string('alamat');
            $table->string('contact_no_perusahaan');
            $table->string('nama_pic');
            $table->string('email');
            $table->string('contact_no_pic');
            $table->string('twitter');
            $table->string('fb');
            $table->string('wa');
            //$table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer');
    }
}
