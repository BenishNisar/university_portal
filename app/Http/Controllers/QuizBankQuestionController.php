<?php

namespace App\Http\Controllers;
use App\Models\Semester;
use App\Models\Subject;
use App\Models\Quizs;
use App\Models\Quest;
use App\Models\Answers;
use Illuminate\Http\Request;

class QuizBankQuestionController extends Controller
{
    public function index(){
        $semesters = Semester::all();
        $subjects = Subject::all();
        $quizzes = Quizs::all();
        return view('teacher.quiz_question_bank.index',compact('semesters', 'subjects', 'quizzes'));
    }

// In your Controller


public function saveQuiz(Request $request)
{
    try {
        $request->validate([
            'semester' => 'required|exists:semesters,id',
            'subject' => 'required|exists:subjects,id',
            'quiz_no' => 'required',
            'question' => 'required|string',
            'answer_1' => 'required|string',
            'answer_2' => 'required|string',
            'answer_3' => 'required|string',
            'answer_4' => 'required|string',
            'correct_answer' => 'required|in:1,2,3,4',
        ]);

        Quizs::create([
            'semester_id' => $request->semester,
            'subject_id' => $request->subject,
            'quiz_number' => $request->quiz_no,
            'question' => $request->question,
            'answer_1' => $request->answer_1,
            'answer_2' => $request->answer_2,
            'answer_3' => $request->answer_3,
            'answer_4' => $request->answer_4,
            'correct_answer' => $request->correct_answer,
        ]);

        return redirect()->back()->with('success', 'Quiz saved successfully!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error saving quiz: ' . $e->getMessage());
    }
}




}
