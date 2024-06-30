<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Company;

class ListController extends Controller
{
    public function _construct() {
        return  $this->middleware('auth:api');
        }
    //list
    public function Index() 
    {
        try {
            //code...
            $Employee = Employee::with('company_details')->get();
            return response()->json([
                'message' => 'Success',
                'data' => $Employee
            ],201);
        } catch (\Throwable $th) {
            throw $th;
                return response()->json([
                    'message' => 'Error',
                ],400);
        }
        
     
    }
}
