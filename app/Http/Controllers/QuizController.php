<?php

namespace App\Http\Controllers;

use App\Question;
use App\Answer;
use Illuminate\Http\Request;

use Carbon\Carbon;
use Illuminate\Support\Facades\Response;

class QuizController extends Controller
{

    public function index(){
        return view('home');
    }


    public function getAllQuestions(){

        $questions = Question::with("answers")->orderBy('id', 'desc')->get();

        return Response::json([
            'data' => $questions->toArray()
        ]);
    }

    public function createNewQuestion(Request $request){



        $question = Question::create( ["Text" => $request->newQuiz['Text']]);

        foreach ($request->newQuiz['answers'] as $answer)
            $question->answers()->create(["text" =>$answer["t"], "correct" => $answer["c"]]);


    }

    public function destroy(Request $request){


        $question = Question::find($request->questionId);


        $question->answers()->where("question_id", $request->newQuiz['id'])->delete();

        if(is_null($question)){
            return response("Not found", 403);
        }

        $question->delete();

        return response("OK, question has been deleted", 200);
    }


    public function checkTheAnswer(Request $request){

        $answer = Answer::where("id", $request->choosenOption)->first();

        return response([
            "data" => $answer["correct"]
        ]);

    }
}
