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
                $table->string('student_id');
                $table->string('name');
                $table->string('email')->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->unsignedBigInteger('department')->nullable(); //
                $table->unsignedBigInteger('organization_id')->nullable(); //
                $table->foreign('department')->references('department_id')->on('departments')->onDelete('cascade'); //
                $table->foreign('organization_id')->references('organization_id')->on('organizations')->onDelete('cascade'); //
                $table->dateTime('time_in')->nullable();
                $table->dateTime('time_out')->nullable();
                $table->enum('user_role',['admin','student','officer'])->default('student');
                $table->string('password');
                $table->string('stripe_id')->nullable();
                $table->string('pm_type')->nullable();
                $table->string('pm_last_four')->nullable();
                $table->string('trial_ends_at')->nullable();
                $table->rememberToken()->nullable();
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
