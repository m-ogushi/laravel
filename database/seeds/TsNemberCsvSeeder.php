<?php

use Illuminate\Database\Seeder;
use Goodby\CSV\Import\Standard\Lexer;
use Goodby\CSV\Import\Standard\Interpreter;
use Goodby\CSV\Import\Standard\LexerConfig;

class TsNemberCsvSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    const CSV_FILENAME = "tsmenber.csv";

    public function run()
    {
        DB::table('ts')->truncate();

        $this->command->info('[Start] import data.');

        $config = new LexerConfig();
        // セパレーター指定、
        $config->setDelimiter(",");
        $lexer = new Lexer($config);
        $interpreter = new Interpreter();
        $interpreter->addObserver(function(array $rows) 
        {
            // 各列のデータを取得
//            $first = $row[0];
//            $second = $row[1];
            foreach($rows as $row ){
                DB::table('ts')->insert([
                    'name' => $row,
                ]); 
            }
        });

        $lexer->parse(self::CSV_FILENAME, $interpreter);

        $this->command->info('[End] import data.');
    }
}
