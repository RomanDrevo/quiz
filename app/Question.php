<?php

namespace App;
use App\Answer;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    protected $fillable = ["Text"];

    public function answers(){
        return $this->hasMany(Answer::class);
    }
}
