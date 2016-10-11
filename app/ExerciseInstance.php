<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExerciseInstance extends Model
{
    protected $table = 'exercise_instances';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'exercise_duration', 'order'
    ];

    /**
     * Get the exercise that owns the exercise instance.
     */
    public function exercise()
    {
        return $this->belongsTo('App\Exercise', 'exercise_id');
    }

    /**
     * Get the plan day that owns the exercise instance.
     */
    public function planDay()
    {
        return $this->belongsTo('App\PlanDay', 'day_id');
    }
}
