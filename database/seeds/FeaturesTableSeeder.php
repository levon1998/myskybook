<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeaturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('features')->insert([
                'id' => $i,
                'name' => "Feature #{$i}",
                'code' => $i * 22
            ]);

            DB::table('plans')->insert([
                'id' => $i,
                'name' => "Plan #{$i}",
                'price' => $i * 10
            ]);

            DB::table('feature_plan')->insert([
                'plan_id' => $i,
                'feature_id' => $i
            ]);
        }
    }
}
