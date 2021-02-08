<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Tabel `staffs`
 * 
 * Tabel `staffs` adalah tabel yang menyimpan
 * data kepengurusan.
 * 
 * @since   1.0.0
 * @author  mulyosyahidin95
 */
class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('period_id')->nullable();
            $table->unsignedBigInteger('position_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();

            $table->index('period_id');
            $table->index('position_id');
            $table->index('user_id');

            $table->foreign('period_id')->references('id')->on('periods')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('position_id')->references('id')->on('positions')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staffs');
    }
}
