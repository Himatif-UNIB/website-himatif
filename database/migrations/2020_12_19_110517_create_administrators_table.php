<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Tabel `administrators`
 * 
 * Tabel `administrators` adalah tabel yang menyimpan
 * data kepengurusan.
 * 
 * @since   1.0.0
 * @author  mulyosyahidin95
 */
class CreateAdministratorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administrators', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('period_id')->nullable();
            $table->unsignedBigInteger('position_id')->nullable();
            $table->unsignedBigInteger('member_id')->nullable();

            $table->index('period_id');
            $table->index('position_id');
            $table->index('member_id');

            $table->foreign('period_id')->references('id')->on('periods')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('position_id')->references('id')->on('positions')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('member_id')->references('id')->on('members')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('administrators');
    }
}
