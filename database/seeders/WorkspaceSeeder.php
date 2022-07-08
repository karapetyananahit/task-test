<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class WorkspaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {

            $randomDescription = "";

            $randomCount = mt_rand(1, 10);

            for ($j = 0; $j < $randomCount; $j++) {
                $randomDescription .= Str::random(mt_rand(3, 10)) . mt_rand(1,9);
            }



            DB::table('workspaces')->insert([
                'user_id' => mt_rand(1, 10),
                'name' => Str::random(5),
                'slug' => $randomDescription,

            ]);
        }
    }
}
