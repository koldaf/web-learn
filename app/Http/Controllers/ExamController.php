<?php

namespace App\Http\Controllers;

use App\Models\QuestionBank;
use App\Models\Question;
use App\Models\QuestionInstance;
use App\Models\QuestionUserResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Rap2hpoutre\FastExcel\FastExcel;

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

        //dd($exam_detail->toArray());

        return view('pages.edit-exams',[
            'questions' =>$questions->toArray(), // $exam->all()->toArray(),
            'exam'=> $exam_detail->toArray(),
            'user' => auth()->user()
        ]);
    }

    public function view_scores($exam){


        //dd($exam_detail->toArray());

        return view('pages.view-score',[
            'user' => auth()->user()
        ]);
    }

    public function calculate_score($qid, $resp){
        $check = Question::where('id', $qid)
                          ->where('correct_answer', $resp)
                          ->count();
        if($check > 0){
            return true;
        }else{
            return false;
        }

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
