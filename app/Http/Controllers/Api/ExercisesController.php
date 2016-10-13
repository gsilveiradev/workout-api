<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Exercise;

class ExercisesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exercises = Exercise::all();

        return response()->json(compact('exercises'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $exercise = Exercise::findOrFail($id);

        return response()->json(compact('exercise'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'exercise_name' => 'required'
        ]);

        if ($validation->fails()) {

            return response()->json(array(
                'message' => 'Validation error',
                'errors' => $validation->errors()
            ), 422);
        }

        $exercise = new Exercise;
        $exercise->exercise_name = $request->exercise_name;
        $exercise->save();

        return response()->json(compact('exercise'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'exercise_name' => 'required'
        ]);

        if ($validation->fails()) {

            return response()->json(array(
                'message' => 'Validation error',
                'errors' => $validation->errors()
            ), 422);
        }

        $exercise = Exercise::findOrFail($id);
        $exercise->exercise_name = $request->exercise_name;
        $exercise->save();

        return response()->json(compact('exercise'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exercise = Exercise::findOrFail($id);
        $exercise->delete();

        return response()->json(array('message' => 'Ok!'), 200);
    }
}