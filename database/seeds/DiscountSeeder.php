<?php

use Illuminate\Database\Seeder;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('discount_table')->insert([
            'discount_type' => 'Public',
            'amount' => 17500
        ]);

        DB::table('discount_table')->insert([
            'discount_type' => 'Private',
            'amount' => 14000
        ]);

        DB::table('discount_table')->insert([
            'discount_type' => 'ALS',
            'amount' => 17500
        ]);
    }
}
