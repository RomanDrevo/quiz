<?php

use Illuminate\Database\Seeder;

class AnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table("answers")->insert(["question_id" => 1, "text" => "Good", "correct" => true]);
//        DB::table("answers")->insert(["question_id" => 1, "text" => "Fine", "correct" => false]);
//        DB::table("answers")->insert(["question_id" => 1, "text" => "Great", "correct" => false]);
//        DB::table("answers")->insert(["question_id" => 1, "text" => "OK", "correct" => false]);

        DB::table("answers")->insert(["question_id" => 2, "text" => "23", "correct" => true]);
        DB::table("answers")->insert(["question_id" => 2, "text" => "45", "correct" => false]);
        DB::table("answers")->insert(["question_id" => 2, "text" => "65", "correct" => false]);
        DB::table("answers")->insert(["question_id" => 2, "text" => "11", "correct" => false]);


        DB::table("answers")->insert(["question_id" => 3, "text" => "London", "correct" => true]);
        DB::table("answers")->insert(["question_id" => 3, "text" => "Berlin", "correct" => false]);
        DB::table("answers")->insert(["question_id" => 3, "text" => "Ulan Bator", "correct" => false]);
        DB::table("answers")->insert(["question_id" => 3, "text" => "Prague", "correct" => false]);


    }
}
