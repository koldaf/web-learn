<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    private $tablename = 'question_user_responses';
    public function up()
    {
        //
        Schema::create($this->tablename, function(Blueprint $table){
            $table->id();
            $table->string('user_id');
            $table->string('instance_id');
            $table->string('question_id');
            $table->string('response');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
