<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\PlanDay;

class PlanDaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plan_days = PlanDay::with('exerciseInstances')->with('plan')
            ->orderBy('plan_id', 'ASC')
            ->orderBy('order', 'ASC')
            ->get();

        return response()->json(compact('plan_days'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $plan_day = PlanDay::findOrFail($id);

        $plan_day->load('exerciseInstances')->load('plan');

        return response()->json(compact('plan_day'));
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
            'day_name' => 'required',
            'order' => 'required',
            'plan_id' => 'required|exists:plans,id'
        ]);

        if ($validation->fails()) {

            return response()->json(array(
                'message' => 'Validation error',
                'errors' => $validation->errors()
            ), 422);
        }

        $plan_day = new PlanDay;
        $plan_day->day_name = $request->day_name;
        $plan_day->order = $request->order;
        $plan_day->plan_id = $request->plan_id;
        $plan_day->save();

        return response()->json(compact('plan_day'));
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
            'day_name' => 'required',
            'order' => 'required',
            'plan_id' => 'required|exists:plans,id'
        ]);

        if ($validation->fails()) {

            return response()->json(array(
                'message' => 'Validation error',
                'errors' => $validation->errors()
            ), 422);
        }

        $plan_day = PlanDay::findOrFail($id);
        $plan_day->day_name = $request->day_name;
        $plan_day->order = $request->order;
        $plan_day->plan_id = $request->plan_id;
        $plan_day->save();

        return response()->json(compact('plan_day'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plan_day = PlanDay::findOrFail($id);
        $plan_day->delete();

        return response()->json(array('message' => 'Ok!'), 200);
    }
}