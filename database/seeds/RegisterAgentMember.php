<?php

use Illuminate\Database\Seeder;

class RegisterAgentMember extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attendancelist')->insert([
            'name' => "小串 光和",
            'section' => "1",
            'end' => "0",
          ]);
    }
}
