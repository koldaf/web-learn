<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Question;
use App\Models\QuestionBank;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use App\Models\QuestionInstance;
use Illuminate\Support\Facades\DB;
use App\Models\QuestionUserResponse;
use Rap2hpoutre\FastExcel\FastExcel;
use Illuminate\Support\Facades\Storage;

class ExamController extends Controller
{
    //
    public function list(){
        return view('pages.list-exams',[
            'user' =>auth()->user(),
            'exams' => QuestionBank::where('user_id', auth()->user()->id)
                                    ->get()
        ]);
    }

    public function create(){
        return view('pages.create-exams',
        [
            'user' => auth()->user()
        ]);
    }

    public function destroy($exam){
        $delete = QuestionBank::where('id',$exam)->delete();
        if($delete){
            Question::whereIn('question_bank_details_id',[$exam])->delete();
        }
        return redirect('/available-exams')->with('success', 'Item deleted successfully');
    }

    public function view_question_set($exam){
        $questions = Question::where('question_bank_details_id', $exam)
                    ->get();
        $exam_detail =QuestionBank::where('id', $exam)->first();


        return view('pages.edit-exams',[
            'questions' =>$questions->toArray(), // $exam->all()->toArray(),
            'exam'=> $exam_detail->toArray(),
            'user' => auth()->user()
        ]);
    }

    public function view_scores($exam){
        $exam = QuestionBank::where('id', $exam)
                            ->first()
                            ->get()
                            ->toArray();
        //get list participants and their scores
        //participants
        $all = User::all();
        foreach ($all as $user){
            //get score for each users
           //dd($user->id);
        }
        dd($this->calculate_score(4, 1));
        //array('user'=>x, 'score'=>y)

        return view('pages.view-score',[
            'user' => auth()->user(),
            'exam' => $exam
        ]);
    }


    public function calculate_score($userid, $instance){
        // $grade = DB::table('question_user_responses')
        //             ->join('questions','question_user_responses.question_id','=','questions.id')
        //              ->where('question_user_responses.response', 'questions.correct_answer')
        //              ->where('question_user_responses.instance_id', $instance)
        //              ->where('question_user_responses.user_id', $userid)
        //             ->count();
        // $grade = DB::table('question_user_responses')
        //     ->join('questions', function($join) use($instance, $userid){
        //         $join->on('question_user_responses.question_id','=','questions.id')
        //                 ->where('question_user_responses.response', 'questions.correct_answer')
        //                 ->where('question_user_responses.instance_id', $instance)
        //                 ->where('question_user_responses.user_id', $userid);
        //     })
        //     ->count();

           $grade = DB::Raw("SELECT * FROM question_user_responses AS qua INNER JOIN questions AS q ON qua.question_id = q.id  WHERE qua.instance_id = '1' AND qua.user_id = '4' AND qua.response = q.correct_answer"); //->count();

                    // ->join('contacts', function ($join) {
                    //     $join->on('users.id', '=', 'contacts.user_id')
                    //          ->where('contacts.user_id', '>', 5);
                    // })
                    //SELECT * FROM question_user_responses AS qua INNER JOIN questions AS q ON qua.question_id = q.id  WHERE qua.instance_id = '1' AND qua.user_id = '4' AND qua.response = q.correct_answer

        return $grade;

    }

    public function edit_quiz($exam){
        $quiz = Question::where('id', $exam)->first()->toArray();
        //dd($quiz);
        return view('pages.edit-quiz',[
            'quiz' => $quiz,
            'user' => auth()->user()
        ]);
    }

    public function store_exam(){
        //validate exam title
        request()->validate([
            'title' => ['string', Rule::unique('question_bank_details', 'exam_title')]
        ],[
            'title.unique' => 'Exam with the title '.request()->get('title').' already exists'
        ]);
        $file =request()->file('exam_file');
        $extension = $file->extension(); //Get extension of uploaded file
        $validExtensions = array('xls', 'xlsx');
        $fileSize = $file->getSize(); //Get size of uploaded file in bytes
        //dd($file->getClientOriginalName());
        if(!in_array($extension, $validExtensions)){
            //return error if file_type invalid
            return redirect()->back()->withErrors('Invalid file type');
        }else{
            //check for file size
            if($fileSize > 50000){
                return redirect()->back()->withErrors('File size limit exceeded');
            }else{
                //store to file
                $path = request()->file('exam_file')->store('uploads');
                $collections = (new FastExcel)->import('../storage/app/'.$path)->toArray();
                //dd($collections);
                $questionBank = QuestionBank::create([
                                    'user_id' => auth()->user()->id,
                                    'exam_title' => request()->get('title'),
                                    'file_link' => $path,
                                    'status' => 'Active'
                                ]);
                //dd($questionBank->id);
                foreach($collections as $collection){
                    if($collection['Type'] == 'MC'){
                        $option = array('A'=>$collection['OptionA'],
                                'B'=>$collection['OptionB'],
                                'C'=>$collection['OptionC'],
                                'D'=>$collection['OptionD']);
                        $options = json_encode($option);
                    }else{
                        $options = '';
                    }
                    //save into database
                    Question::create([
                        'question_bank_details_id' => $questionBank->id,
                        'question' => $collection['Questions'],
                        'question_type' => $collection['Type'],
                        'options' => $options,
                        'correct_answer' => $collection['Correct Answer'],
                        'status' => 'Active'
                    ]);
                }

                return redirect('/available-exams');
            }

        }
    }
}
