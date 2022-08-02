<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionUserResponse extends Model
{
    use HasFactory;
    //protected $table = 'question_instances';

    protected $guarded = ['id'];
    //public $timestamps = false;
}
