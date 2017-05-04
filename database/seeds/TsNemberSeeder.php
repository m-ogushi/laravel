<?php

use Illuminate\Database\Seeder;

class TsNemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $authors = ['田島　慎弥','来海　拓哉','パク　ミジ','間宮　直樹','西谷　真澄','岩佐　淳哉','市道　裕介','福本　賢人','ハン　テギュ','DEBNATH SURAJIT','小串　光和'];
     foreach ($authors as $author) {
      DB::table('ts')->insert([
         'name' => $author,
      ]);
      }
    }
}
