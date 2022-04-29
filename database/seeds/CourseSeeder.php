<?php

use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('course')->insert([
            'course' => 'Industrial Arts(IA)-Automotive Servicing'
        ]);

        DB::table('course')->insert([
            'course' => 'Industrial Arts(IA)-Electrical Installation and Maintenance'
        ]);

        DB::table('course')->insert([
            'course' => 'Industrial Arts(IA)-Electronic Products Assembly and Servicing'
        ]);

        DB::table('course')->insert([
            'course' => 'Information and Communication Technology (ICT)-Computer System Servicing NC II'
        ]);

        DB::table('course')->insert([
            'course' => 'Information and Communication Technology (ICT)-Programming'
        ]);

        DB::table('course')->insert([
            'course' => 'Home Economics (HE)-Housekeeping NC II/Front Office Services NC II'
        ]);

        DB::table('course')->insert([
            'course' => 'Home Economics (HE)-Food and Beverage Services NC II/Bread and Pastry Production NC II'
        ]);

    }
}
