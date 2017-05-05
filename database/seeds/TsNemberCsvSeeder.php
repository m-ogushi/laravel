<?php

use Illuminate\Database\Seeder;

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
        $this->command->info('[Start] import data.');

        $config = new LexerConfig();
        // セパレーター指定、"\t"を指定すればtsvファイルとかも取り込めます
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
                    'name' => $row[0],
                ]); 
            }
        });

        $lexer->parse(app_path() . self::CSV_FILENAME, $interpreter);

        $this->command->info('[End] import data.');
    }
}
