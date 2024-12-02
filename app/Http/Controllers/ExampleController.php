<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Example;
use Illuminate\Support\Facades\Validator;

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

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'example' => 'required|string|max:255',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'error' => $validator->errors()
                ], 400);
            }

            $data = [
                'example' => $request->example,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];

            $dataExample = Example::SaveExample($data);
            if ($dataExample <= 0) {
                return response()->json([
                    'status' => false,
                    'message' => 'Data Not Found'
                ]);
            }

            return response()->json([
                'status' => true,
                'message' => 'Data Saved Successfully',
                'data' => $dataExample
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
            ]);
        }
    }

    public function update($id, Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'example' => 'required|string|max:255',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'error' => $validator->errors()
                ], 400);
            }

            $data = [
                'example' => $request->example,
                'updated_at' => date('Y-m-d H:i:s')
            ];

            $dataExample = Example::UpdateExample($id, $data);
            if (!$dataExample) {
                return response()->json([
                    'status' => false,
                    'message' => 'Data Not Found'
                ]);
            }

            return response()->json([
                'status' => true,
                'message' => 'Data Updated Successfully',
                'data' => $dataExample
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $dataExample = Example::DeleteExample($id);
            if (!$dataExample) {
                return response()->json([
                    'status' => false,
                    'message' => 'Data Not Found'
                ]);
            }

            return response()->json([
                'status' => true,
                'message' => 'Data Deleted Successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
            ]);
        }
    }
}
