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
        Schema::create('question_instances', function (Blueprint $table) {
            $table->id();
            $table->string('question_bank_details_id');
            $table->string('user_id');
            $table->enum('status',['Ongoing','Completed']);
            $table->timestamp('time_start');
            $table->timestamp('time_completed');
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
        Schema::dropIfExists('question_instances');
    }
};
