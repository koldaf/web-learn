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
    public function up()
    {
        //
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('question_bank_details_id');
            $table->text('question');
            $table->enum('question_type', ['MC','SA', 'MA']);
            $table->char('difficulty_index');
            $table->integer('point');
            $table->json('options');
            $table->text('correct_answer');
            $table->enum('status',['Active','Inactive']);
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
        Schema::dropIfExists('questions');
    }
};
