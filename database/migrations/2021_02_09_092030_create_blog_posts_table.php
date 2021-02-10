<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('title');
            $table->string('slug');
            $table->mediumText('content');
            $table->text('excerpt')->nullable();
            $table->string('status')->default('draft')->comment('draft|published');
            $table->boolean('allow_comment')->default(true);
            $table->boolean('moderate_comment')->default(false);
            $table->timestamps();
            $table->softDeletes();

            $table->index('user_id');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('SET NULL')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_posts');
    }
}
