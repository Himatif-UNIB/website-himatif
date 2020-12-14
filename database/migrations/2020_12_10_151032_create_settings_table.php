<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Tabel pengaturan
 * 
 * Tabel pengaturan adalah tabel yang menyimpan data
 * pengaturan website, seperti nama, deskripsi, logo
 * dan lain sebagainya.
 * 
 * @since   1.0.0
 * @author  mulyosyahidin95
 */

class CreateSettingsTable extends Migration
{
    /**
     * Struktur tabel `settings`
     * 
     * Tabel settings terdiri dari 3 kolom:
     * id, key, value.
     * Dimana kolom key merupakan kunci pengenal untuk row pengaturan
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->mediumText('value')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
