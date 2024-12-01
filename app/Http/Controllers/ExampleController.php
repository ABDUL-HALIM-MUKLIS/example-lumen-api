<?php

namespace App\Http\Controllers;

use App\Models\Example;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
        $dataExample = Example::Getexample();
        if (!$dataExample->isEmpty()) {
            return $dataExample;
        }

        return response()->json([
            'status' => false,
            'message' => 'Data Not Found'
        ]);
    }
}
