<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormQuestionAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_question_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('answer_id')->nullable();
            $table->unsignedBIgInteger('question_id')->nullable();
            $table->text('answer')->nullable();

            $table->index('answer_id');
            $table->index('question_id');

            $table->foreign('answer_id')->references('id')->on('form_answers')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('question_id')->references('id')->on('form_questions')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_question_answers');
    }
}
