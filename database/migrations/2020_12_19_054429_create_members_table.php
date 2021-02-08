<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Tabel `members`
 * 
 * Tabel `members` merupakan tabel yang menyimpan
 * data anggota HIMATIF, baik yang pengurus maupun bukan.
 * 
 * @since   1.0.0
 * @author  mulyosyahidin95
 */
class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('force_id')->nullable();
            $table->string('name');
            $table->string('npm', 16)->nullable();
            $table->timestamps();

            $table->index('force_id');

            $table->foreign('force_id')->references('id')->on('forces')->onDelete('SET NULL')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
