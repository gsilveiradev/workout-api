<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $table = 'exercises';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'exercise_name'
    ];

    /**
     * Get the exercise instances for the exercise.
     */
    public function exerciseInstances()
    {
        return $this->hasMany('App\ExerciseInstance');
    }
}
