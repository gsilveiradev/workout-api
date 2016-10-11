<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Exercise;

class ExercisesController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\JsonResponse
    */
    public function index()
    {
        $exercises = Exercise::all();

        return response()->json(compact('exercises'));
    }
}