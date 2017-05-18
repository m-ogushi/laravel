<?php

use Illuminate\Database\Seeder;
use Goodby\CSV\Import\Standard\Lexer;
use Goodby\CSV\Import\Standard\Interpreter;
use Goodby\CSV\Import\Standard\LexerConfig;

class AgentMemberCsv extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    
    const CSV_FILENAME = "storage/agentmember.csv";

    public function run()
    {
        DB::table('attendancelist')->truncate();

        $this->command->info('[Start] import data.');

        $config = new LexerConfig();
        // セパレーター指定、
        $config->setDelimiter(",");
        $lexer = new Lexer($config);
        $interpreter = new Interpreter();
        $interpreter->addObserver(function(array $rows) 
        {
            // 各列のデータを取得
            DB::table('attendancelist')->insert([
                'name' => $rows[0],
                'section' => $rows[1]
            ]); 
        });
        

        $lexer->parse(self::CSV_FILENAME, $interpreter);

        $this->command->info('[End] import data.');
    }
}
