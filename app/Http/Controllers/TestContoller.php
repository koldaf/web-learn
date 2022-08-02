<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\QuestionBank;
use Illuminate\Http\Request;
use App\Models\QuestionInstance;
use Illuminate\Support\Facades\DB;
use App\Models\QuestionUserResponse;
use Illuminate\Support\Facades\Hash;

class TestContoller extends Controller
{
    //
    public function list (){
        $available = QuestionBank::where('status','Active')->get();
        //check if not done
        return view('pages.list-tests',[
            'user' => auth()->user(),
            'tests' => $available,
            // 'link_hash' => Hash:make($available->id)
        ]);
    }

    public function start($id){

        $c = QuestionInstance::where('question_bank_details_id', $id)
                                ->where('user_id', auth()->user()->id)
                                ->where('status','Completed')
                                ->first();
        if(empty($c->id)){
            //Test Details
                $details = QuestionBank::where('id',$id)->first();
                //check if instance of the same exam has been generated
                $check = QuestionInstance::where('question_bank_details_id', $id)
                                            ->where('user_id', auth()->user()->id)
                                            ->where('status','Ongoing')
                                            ->first();
                $qq = [];
                if(!empty($check->id)){
                    //load the already generated questions
                    $questions = QuestionUserResponse::where('user_id', auth()->user()->id)
                                                ->where('instance_id', $check->id)
                                                ->get();
                    foreach ($questions as $question) {
                        $opt = json_decode($question->option, true);
                        $q = ['question'=>$question->question,
                            'options'=>$opt,
                            'q_id' => $question->question_id];
                        array_push($qq,$q);
                    }
                }else{


                    //createinstance
                    $qi = QuestionInstance::create([
                        'question_bank_details_id' => $id,
                        'user_id' => auth()->user()->id,
                        'status' => 'Ongoing',
                        'time_start' => NOW()
                    ]);
                    //dd($qi->id);
                    $questions = Question::where('question_bank_details_id',$id)
                                            ->inRandomOrder()
                                            ->limit(20)
                                            ->get();

                    foreach($questions as $question){
                        $options = json_decode($question->options, true);
                        $opt = $this->reshuffle_array($options);
                        $q = ['question'=>$question->question,
                            'options'=>$opt,
                            'q_id' => $question->question_id];
                        array_push($qq,$q);

                        //Save Instance Generated
                        QuestionUserResponse::create([
                            'user_id' => auth()->user()->id,
                            'instance_id' => $qi->id,
                            'question_id' => $question->id,
                            'question' => $question->question,
                            'option' => json_encode($opt)
                        ]);


                        //$q = ['question'=>$question->question, 'option'=>$question->options ];
                    }
                }
                //dd($qq);
                return view('pages.test', [
                    'user' => auth()->user(),
                    'test_title' => $details,
                    'tests' => $qq,
                    'instance_id' => isset($check->id)? $check->id:$qi->id
                ]);
        }else{
            return redirect()->back()->with('status','You have already completed this test');
        }

    }

    public function reshuffle_array($x){
		//reshuffle array, variable must be in key-value pair
		$values = array_values($x);
		$keys = array_keys($x);
		shuffle($values);
		return array_combine($keys,$values);
    }

    public function submit(){

        $instance_id = request()->get('instance');
        //stop exam
        DB::update("update question_instances set time_completed = NOW(), status = 'Completed' where id = ?", [$instance_id]);
        $resp = request()->all();
        $total = count($resp);
        $keys = array_keys($resp);
        $values = array_values($resp);
        for($i=$total-1; $i > 2; $i--){
            $k = explode('**', $keys[$i]);
            DB::update("UPDATE question_user_responses set response = :resp, updated_at= NOW()  where instance_id = :inst and user_id = :user and question_id = :q",
                        ['resp'=>$values[$i], 'inst'=>$instance_id, 'user'=>auth()->user()->id, 'q'=>$k[1]]);
        }
        return view('pages.end-exam',[
            'user'=>auth()->user(),
            'message'=>'Test was submitted Successfully'
        ]);
    }
}
