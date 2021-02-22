<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePictureGalleryCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('picture_gallery_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('gallery_id')->nullable();

            $table->index('category_id');
            $table->index('gallery_id');

            $table->foreign('category_id')->references('id')->on('gallery_categories')->onDelete('CASCADE')->onUpdate('NO ACTION');
            $table->foreign('gallery_id')->references('id')->on('picture_galleries')->onDelete('CASCADE')->onUpdate('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('picture_gallery_categories');
    }
}
