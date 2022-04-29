<?php

use Illuminate\Database\Seeder;

class SchoolyearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('school_year')->insert([
            'school_year' => '2020-2021'
        ]);
    }
}
