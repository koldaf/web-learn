<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function dashboard()
    {
        return view('pages/dashboard',[
            'user' => auth()->user(),
            'topics' => Topic::all()
        ]);

    }
}
