<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Rap2hpoutre\FastExcel\FastExcel;

class ExamController extends Controller
{
    //
    public function list(){
        return view('pages.list-exams',[
            'user' =>auth()->user()
        ]);
    }

    public function create(){
        return view('pages.create-exams',
        [
            'user' => auth()->user()
        ]);
    }

    public function store_exam(){
        $file =request()->file('exam_file');
        $extension = $file->getClientOriginalExtension(); //Get extension of uploaded file
        $validExtensions = array('xls', 'xlsx');
        $filename = $file->getClientOriginalName();
        $tempPath = $file->getRealPath();
        $fileSize = $file->getSize(); //Get size of uploaded file in bytes
        $uploadPath = 'upload/';
        $exam_title = strtolower(str_replace(' ', '_', request()->get('title')));
        $uploadedAs = $uploadPath.$exam_title.'_'.time().'.'.$extension;
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
                $collection = (new FastExcel)->import($path);

                dd($collection);



            }

        }

        $data = request()->all();


        dd($extension);


        //return view('pages.create')
    }
}
