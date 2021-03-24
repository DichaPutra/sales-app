<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTargetTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('target', function (Blueprint $table) {
            $table->id();
            $table->integer('target');
            $table->timestamps();
        });

        DB::table('target')->insert(
                [
                    ['id' => '1', 'target' => '1']
                ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('target');
    }

}
