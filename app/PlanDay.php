<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanDay extends Model
{
    protected $table = 'plan_days';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'day_name', 'order'
    ];

    /**
     * Get the exercise instances for the plan day.
     */
    public function exerciseInstances()
    {
        return $this->hasMany('App\ExerciseInstance', 'day_id');
    }

    /**
     * Get the plan that owns the plan day.
     */
    public function plan()
    {
        return $this->belongsTo('App\Plan', 'plan_id');
    }
}
