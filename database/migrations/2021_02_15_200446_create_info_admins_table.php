<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_admins', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->constrained('admins')->onDelete('cascade');
            $table->string('city')->nullable();
            $table->string('gender')->default('Male');
            $table->date('date_of_birth')->nullable();
            $table->string('marital_status')->nullable();
            $table->integer('age')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->text('address')->nullable();
            $table->string('number')->nullable();
            $table->text('url')->nullable();
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
        Schema::dropIfExists('info_admins');
    }
}
