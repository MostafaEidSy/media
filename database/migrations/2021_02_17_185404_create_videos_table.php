<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('image')->nullable();
            $table->foreignId('category_id')->nullable()->constrained('category_videos')->onDelete('set null');
            $table->string('quality');
            $table->text('description')->nullable();
            $table->longText('content')->nullable();
            $table->string('language');
            $table->string('release');
            $table->string('duration');
            $table->text('video');
            $table->tinyInteger('inHome')->default(0);
            $table->text('slug')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
}
