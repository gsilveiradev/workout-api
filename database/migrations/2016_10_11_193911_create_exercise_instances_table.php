<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExerciseInstancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercise_instances', function (Blueprint $table) {
            
            $table->increments('id');
            $table->integer('exercise_duration')->default(0);
            $table->integer('order')->default(0);

            $table->integer('exercise_id')->unsigned();
            $table->foreign('exercise_id')->references('id')->on('exercises');

            $table->integer('day_id')->unsigned()->nullable();
            $table->foreign('day_id')->references('id')->on('plan_days');
            
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
        Schema::drop('exercise_instances');
    }
}
