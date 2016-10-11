<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\System\Collection;
use App\User;
use App\Exercise;
use App\Plan;
use App\PlanDay;
use App\ExerciseInstance;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        Model::unguard();

        DB::table('users')->delete();

        $exercises = collect([
            ['exercise_name' => 'Crunch'],
            ['exercise_name' => 'Air squat'],
            ['exercise_name' => 'Windmill'],
            ['exercise_name' => 'Push-up'],
            ['exercise_name' => 'Rowing Machine'],
            ['exercise_name' => 'Walking'],
            ['exercise_name' => 'Running']
        ])->each(function($exercise) {
            Exercise::create($exercise);
        });

        $plans = collect([
            ['plan_name' => 'My first plan', 'plan_description' => 'Just a dummy :-)', 'plan_dificulty' => 1]
        ])->each(function($plan) {
            Plan::create($plan);
        });

        $plan_days = collect([
            ['plan_id' => 1, 'day_name' => 'Day 1 - Cardio', 'order' => 1],
            ['plan_id' => 1, 'day_name' => 'Day 2 - Other exercises', 'order' => 2]
        ])->each(function($plan_day) {
            PlanDay::create($plan_day);
        });

        $exercise_instances = collect([
            ['exercise_id' => 5, 'day_id' => 1, 'exercise_duration' => 300, 'order' => 1],
            ['exercise_id' => 6, 'day_id' => 1, 'exercise_duration' => 900, 'order' => 3],
            ['exercise_id' => 7, 'day_id' => 1, 'exercise_duration' => 900, 'order' => 2],
            ['exercise_id' => 1, 'day_id' => 2, 'exercise_duration' => 150, 'order' => 1],
            ['exercise_id' => 2, 'day_id' => 2, 'exercise_duration' => 300, 'order' => 2],
            ['exercise_id' => 3, 'day_id' => 2, 'exercise_duration' => 300, 'order' => 3],
            ['exercise_id' => 4, 'day_id' => 2, 'exercise_duration' => 500, 'order' => 4]
        ])->each(function($exercise_instance) {
            ExerciseInstance::create($exercise_instance);
        });

        $users = collect([
            ['firstname' => 'Guilherme', 'lastname' => 'Silveira da Silva', 'email' => 'guissilveira@gmail.com', 'password' => Hash::make('password')]
        ])->each(function($user) {
            
            // Creating user example
            $user = User::create($user);

            // Adding plan[1]
            $user->plans()->attach(1);
        });

        Model::reguard();
    }
}
