<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $table = 'plans';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'plan_name', 'plan_description', 'plan_dificulty'
    ];

    /**
     * The users that belong to the plan.
     */
    public function users()
    {
        return $this->belongsToMany('App\User', 'user_plans');
    }

    /**
     * Get the plan days instances for the plan.
     */
    public function planDays()
    {
        return $this->hasMany('App\PlanDay');
    }
}
