<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('form_id')->nullable();
            $table->mediumText('question');
            $table->tinyInteger('type')->default(1)->comment('1 = text, 2 = textarea, 3 = radio, 4 = checkbox, 5 = select, 6 = tanggal, 7 = waktu, 8 = tanggal & waktu, 9 = file');
            $table->boolean('is_required')->default(false);
            $table->json('multiple_options')->nullable();
            $table->json('file_rules')->nullable();

            $table->index('form_id');

            $table->foreign('form_id')->references('id')->on('forms')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_questions');
    }
}
