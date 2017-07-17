<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("questions")->insert(["Text" => "How are you?"]);
        DB::table("questions")->insert(["Text" => "How old are you?"]);
        DB::table("questions")->insert(["Text" => "Where do you live?"]);

    }
}
