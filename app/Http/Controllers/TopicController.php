<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class TopicController extends Controller
{
    //
    public function transformer(){
        $topic = DB::table('topics')
                ->where('route', '/transformer')
                ->get();
        $topic = $topic->toArray();
        return view('pages.transformer',[
            'user' => auth()->user(),
            'topic' => $topic[0]
        ]);
    }

    public function series(){
        $topic = DB::table('topics')
                ->where('route', '/seriesandparrallel')
                ->get();
        $topic = $topic->toArray();
        return view('pages.seriesandparrallel',[
            'user' => auth()->user(),
            'topic' => $topic[0]
        ]);

    }

    public function electric(){
        $topic = DB::table('topics')
                ->where('route', '/electricmotor')
                ->get();
        $topic = $topic->toArray();
        return view('pages.electricmotor',[
            'user' => auth()->user(),
            'topic' => $topic[0]
        ]);


    }

    public function conductor(){
        $topic = DB::table('topics')
                ->where('route', '/conductorandsimulator')
                ->get();
        $topic = $topic->toArray();
        return view('pages.conductorandsimulator',[
            'user' => auth()->user(),
            'topic' => $topic[0]
        ]);
    }
}
