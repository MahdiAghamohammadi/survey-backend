<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyQuestionAnswer extends Model
{
    use HasFactory;
    protected $fillable = ['survey_question_id', 'survey_answer_id', 'answer'];

    public function questions()
    {
        return $this->belongsToMany(SurveyQuestion::class, 'survey_questions', 'survey_question_id');
    }
    public function answers()
    {
        return $this->belongsToMany(SurveyAnswer::class, 'survey_answers', 'survey_answer_id');
    }
}
