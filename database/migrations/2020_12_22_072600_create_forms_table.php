<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('title');
            $table->mediumText('description')->nullable();
            $table->text('post_message')->nullable();
            $table->dateTime('auto_close_date')->nullable();
            $table->mediumInteger('auto_close_answer')->nullable();
            $table->tinyInteger('status')->default(1)->comment('1 = Draft, 2 = Buka, 3 = Tutup');
            $table->dateTime('closed_at')->nullable();
            $table->timestamps();

            $table->index('user_id');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('SET NULL')->onUpdate('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forms');
    }
}
