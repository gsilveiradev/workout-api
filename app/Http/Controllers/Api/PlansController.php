<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Plan;

class PlansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans = Plan::with('planDays')->get();

        return response()->json(compact('plans'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $plan = Plan::findOrFail($id);

        $plan->load('planDays');

        return response()->json(compact('plan'));
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
            'plan_name' => 'required',
            'plan_dificulty' => 'required'
        ]);

        if ($validation->fails()) {

            return response()->json(array(
                'message' => 'Validation error',
                'errors' => $validation->errors()
            ), 422);
        }

        $plan = new Plan;
        $plan->plan_name = $request->plan_name;
        $plan->plan_description = $request->plan_description;
        $plan->plan_dificulty = $request->plan_dificulty;
        $plan->save();

        return response()->json(compact('plan'));
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
            'plan_name' => 'required',
            'plan_dificulty' => 'required'
        ]);

        if ($validation->fails()) {

            return response()->json(array(
                'message' => 'Validation error',
                'errors' => $validation->errors()
            ), 422);
        }

        $plan = Plan::findOrFail($id);
        $plan->plan_name = $request->plan_name;
        $plan->plan_description = $request->plan_description;
        $plan->plan_dificulty = $request->plan_dificulty;
        $plan->save();

        return response()->json(compact('plan'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plan = Plan::findOrFail($id);
        $plan->delete();

        return response()->json(array('message' => 'Ok!'), 200);
    }
}