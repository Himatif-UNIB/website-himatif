<?php

use App\Models\Showcase_category;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShowcasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('showcases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable()->constrained('showcase_categories');
            $table->foreignIdFor(User::class, 'user_id')->nullable()->constrained()->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->enum('type', ['app', 'multimedia', 'ml_model'])->default('app')->comment('app=Aplikasi, Sistem Informasi, dll; multimedia=Pamflet, video; ml_model=Model Machine Learning');
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->mediumText('description')->nullable();
            $table->mediumText('tags')->nullable();
            $table->mediumText('technologies')->nullable(); 
            $table->string('github_url')->nullable();
            $table->string('report_drive_id')->nullable();
            $table->string('report_file_name')->nullable();
            $table->string('drive_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('showcases');
    }
}
