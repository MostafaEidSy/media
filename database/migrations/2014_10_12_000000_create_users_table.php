<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->text('avatar')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('language')->nullable();
            $table->string('gender')->default('Male');
            $table->text('abstract')->nullable();
            $table->string('city')->nullable();
            $table->text('address')->nullable();
            $table->integer('postal_code')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->tinyInteger('activation_method')->default(0);
            $table->string('status')->default('guest');
            $table->text('roles_name')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
