<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            //$table->increments('user_id');
            $table->string('username');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('tipe');
            //$table->id();
            //$table->timestamps();
        });

        DB::table('user')->insert(
                [
                    ['username' => 'admin', 'name' => 'admin', 'email' => 'admin', 'password' => 'admin', 'tipe' => 'admin'],
                    ['username' => 'atasan', 'name' => 'atasan', 'email' => 'atasan', 'password' => 'atasan', 'tipe' => 'atasan'],
                    ['username' => 'sales', 'name' => 'sales', 'email' => 'sales', 'password' => 'sales', 'tipe' => 'sales']
                ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('user');
    }

}
