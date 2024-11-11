<?php

namespace App\Http\Controllers;
use App\Models\Batch; // Ensure you import the Batch model
use App\Models\Quiz; // Ensure you import the Batch model
use App\Models\Course;
use App\Models\Question;
use App\Models\Option;
use App\Models\UserAnswer;
use App\Models\Assignment;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        // Get all batches
        $batches = Batch::all();

        // Get the selected batch id from the request
        $batchId = $request->get('batch_id');

        // Get quizzes based on the selected batch
        $quizzes = collect(); // Default to an empty collection

        if ($batchId) {
            // Fetch quizzes for the selected batch
            $quizzes = Quiz::whereHas('batches', function ($query) use ($batchId) {
                $query->where('batch_id', $batchId);
            })->get();
        }

        // Pass quizzes and batches to the view
        return view('Student.dashboard', compact('quizzes', 'batches', 'batchId'));
    }




    public function show($id) {
        // Fetch the quiz with related questions and options
        $quiz = Quiz::with('questions.options')->findOrFail($id);
        return view('student.quizzes.show', compact('quiz')); // Ensure quiz is passed to the view
    }



    public function selectBatch()
    {
        // Retrieve all batches
        $batches = Batch::all();

        // Pass batches to the view
        return view('dashboard.selectBatch', compact('batches'));
    }




    // Method to show the quizzes after selecting a batch
    public function showQuiz(Request $request)
    {
        $batchId = $request->input('batch_id');

        // Fetch quizzes related to the selected batch
        $quizzes = Quiz::where('batch_id', $batchId)->get();

        // Pass the quizzes to the view
        return view('Student.Quizzes.show', compact('quizzes'));
    }





    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'course_id' => 'required|exists:courses,id',
            'due_date' => 'required|date',
            'batch_id' => 'nullable|array', // Accepts an array of batch IDs
        ]);

        // Create the quiz without 'batch_id' in this model if it's a separate relationship
        $quiz = Quiz::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'course_id' => $validatedData['course_id'],
            'due_date' => $validatedData['due_date'],
        ]);

        // Attach batch IDs to the quiz
        if ($request->has('batch_id') && is_array($request->batch_id)) {
            $quiz->batches()->attach($request->batch_id);
        }

        return redirect()->route('Student.Quizzes')->with('success', 'Quiz Created Successfully');
    }


    public function update(Request $request, $id)
{
    $quiz = Quiz::findOrFail($id);

    // Validate and update quiz
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'course_id' => 'required|exists:courses,id', // Validate course_id
        'due_date' => 'required|date', // Validate due_date
        'batch_id' => 'nullable|array', // Accept an array of batch IDs
    ]);

    // Update the quiz details
    $quiz->update([
        'title' => $validatedData['title'],
        'description' => $validatedData['description'],
        'course_id' => $validatedData['course_id'],
        'due_date' => $validatedData['due_date'],
    ]);

    // Handle batch associations (attach or detach)
    if ($request->has('batch_id') && is_array($request->batch_id)) {
        $quiz->batches()->sync($request->batch_id); // Sync ensures batches are attached/detached correctly
    }

    return redirect()->route('Student.quizzes')->with('success', 'Quiz Updated Successfully');
}



    public function addQuestions($id)
    {
        $quiz = Quiz::findOrFail($id);
        $batches = Batch::all(); // Fetch all batches

        return view('Student.Quizzes.add-questions', compact('quiz', 'batches'));
    }


    public function storeQuestions(Request $request, $quizId)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'text' => 'required|string|max:255',      // Validate the question text
            'options' => 'required|array',            // Ensure options are provided as an array
            'options.*' => 'required|string|max:255', // Each option must be a string and valid
            'correct_option' => 'required|integer',   // Ensure a correct option is selected
        ]);

        // Find the quiz associated with this question
        $quiz = Quiz::findOrFail($quizId);

        // Create the question
        $question = new Question();
        $question->text = $validatedData['text'];
        $question->quiz_id = $quiz->id;
        $question->correct_option_id = $validatedData['correct_option'];
        $question->batch_id = $request->input('batch_id') ?? NULL; // Ensure batch_id is set
        $question->save();


        // Create the options for the question
        foreach ($validatedData['options'] as $index => $optionText) {
            $option = new Option();
            $option->text = $optionText;
            $option->question_id = $question->id;
            $option->is_correct = ($index == $validatedData['correct_option']); // Set correct option based on index
            $option->save();
        }


        // Redirect to the quiz details page with a success message
        return redirect()->route('Student.quizzes.show', $quiz->id)->with('success', 'Question and options added successfully.');
    }


    public function submit(Request $request, $quizId)
    {
        $quiz = Quiz::with('questions.options')->findOrFail($quizId);
        $score = 0;
        $totalQuestions = $quiz->questions->count();

        foreach ($quiz->questions as $question) {
            $selectedOptionId = $request->input("answers.{$question->id}");
            $correctOption = $question->options->where('is_correct', true)->first();

            // Check if selected option is correct
            if ($correctOption && $selectedOptionId == $correctOption->id) {
                $score++;
            }
        }

        // Calculate the result
        $percentage = ($score / $totalQuestions) * 100;

        return view('Student.quizzes.result', compact('quiz', 'score', 'totalQuestions', 'percentage'));
    }


    public function submitQuiz(Request $request, $quizId)
    {
        $quiz = Quiz::with('questions.options')->findOrFail($quizId);
        $score = 0;
        $totalQuestions = $quiz->questions->count();

        foreach ($quiz->questions as $question) {
            $selectedOptionId = $request->input("answers.{$question->id}");
            $correctOption = $question->options->where('is_correct', true)->first();

            // Check if the selected option is correct
            if ($correctOption && $selectedOptionId == $correctOption->id) {
                $score++;
            }

            // Only insert into user_answers if an option was selected
            if ($selectedOptionId !== null) {
                UserAnswer::create([
                    'users_id' => auth()->id(),
                    'quiz_id' => $quizId,
                    'question_id' => $question->id,
                    'option_id' => $selectedOptionId,
                ]);
            }
        }

        $percentage = ($score / $totalQuestions) * 100;

        // Redirect with query parameters
        return redirect()->route('quizzes.result', [
            'quizId' => $quizId,
            'score' => $score,
            'totalQuestions' => $totalQuestions,
            'percentage' => $percentage
        ]);
    }




    public function result(Request $request, $quizId)
    {
        $quiz = Quiz::findOrFail($quizId);

        // Get data from the request
        $score = $request->query('score');
        $totalQuestions = $request->query('totalQuestions');
        $percentage = $request->query('percentage');

        return view('Student.quizzes.result', compact('quiz', 'score', 'totalQuestions', 'percentage'));
    }
    public function showAssignments()
    {
        // Fetch assignments along with the associated course
        $assignments = Assignment::with('course')->get();

        return view('Student.Assignments.assignments', compact('assignments'));
    }



  }
