<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Tabel `periods`
 * 
 * Tabel `periods` adalah tabel yang menyimpan data
 * periode kepengurusan HIMATIF
 * 
 * @since   1.0.0
 * @author  mulyosyahidin95
 */
class CreatePeriodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periods', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('is_active')->default(FALSE);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('periods');
    }
}
