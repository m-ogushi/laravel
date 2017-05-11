<?php

use Illuminate\Database\Seeder;

class RegisterMember extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('login')->insert([
              'name' => "ogushi",
              'password' => Hash::make("agent1217")
        ]);
    }
}
