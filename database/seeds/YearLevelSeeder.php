<?php

use Illuminate\Database\Seeder;

class YearLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('yearlevel')->insert([
            'yearlevel' => '11'
        ]);

        DB::table('yearlevel')->insert([
            'yearlevel' => '12'
        ]);
    }
}
