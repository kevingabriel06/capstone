<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id('activity_id');
            $table->string('title');
            $table->string('description');
            $table->date('date_start');
            $table->date('date_end');
            $table->time('start_time');
            $table->time('end_time');
            $table->datetime('registration_deadline');
            $table->decimal('registration_fee');
            $table->string('status');
            $table->string('image_path');
            $table->integer('department_id');
            $table->integer('organization_id');
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
        Schema::dropIfExists('activities');
    }
}
