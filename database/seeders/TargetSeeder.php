<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TargetSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('target')->insert([
            'target' => 1
        ]);
    }

}
