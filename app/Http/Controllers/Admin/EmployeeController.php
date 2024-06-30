<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Company;
use DataTables;

class EmployeeController extends Controller
{
    //
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Employee::query()->with('Company_details');

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
    
                            $btn = '<a href="'.route('employee.show', $row->id).'" class="btn btn-primary btn-sm m-1">View</a>';
                            $btn = $btn.'<a href="'.route('employee.edit', $row->id).'" class="btn btn-warning btn-sm  m-1">Edit</a>';
                            $btn = $btn.'<a onclick="deleted('.$row->id.')" class="btn btn-danger btn-sm m-1">Delete</a>';
      
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
          
        return view('admin.employee.list');
    }

    //create
    public function Create()
    {
        $Company = Company::get();
        return view('admin.employee.create',['Company' => $Company]);
        
    }

     //store
     public function store(Request $request)
     {
         //valiadetion
         $request->validate([
             'first_name'          =>  'required',
             'last_name'           =>  'required',
             'company'             =>  'required|exists:companies,id',
             'email'               =>  'nullable|email|unique:employees',
             'phone'               =>  'nullable',
            
         ]);
         $Employee            = new Employee();
         $Employee->first_name      =  $request->first_name;
         $Employee->last_name       =  $request->last_name;
         $Employee->company         =  $request->company;
         $Employee->email           =  $request->email;
         $Employee->phone           =  $request->phone;
         $Employee->save();
         
         return redirect()->route('employee.list')->with('success', 'Employee Data has been saved Successfully');
         // return  $image;
     }

     //Show
    public function Show($id)
    {
        $Employee = Employee::with('Company_details')->find($id);
        return view('admin.employee.show',['Employee'=>$Employee]);
        
    }

    //Show
    public function edit($id)
    {
        $Company = Company::get();
        $Employee = Employee::find($id);
        return view('admin.employee.edit',['Employee'=>$Employee,'Company'=>$Company]);
        
    }

    //store
    public function Update(Request $request)
    {
        //valiadetion
        $request->validate([
            'id'                  =>  'required|exists:employees,id',
            'first_name'          =>  'required',
            'last_name'           =>  'required',
            'company'             =>  'required|exists:companies,id',
            'email'               =>  'nullable|email|unique:employees,email,'.$request->id,
            'phone'               =>  'nullable',
           
        ]);
        $Employee            = Employee::find($request->id);
        $Employee->first_name      =  $request->first_name;
        $Employee->last_name       =  $request->last_name;
        $Employee->company         =  $request->company;
        $Employee->email           =  $request->email;
        $Employee->phone           =  $request->phone;
        $Employee->save();
        
        return redirect()->route('employee.list')->with('success', 'Employee Data has been updated Successfully');
        // return  $image;
    }

    //Delete
    public function Destroy(Request $request)
    {
        //valiadetion
        $Employee            = Employee::find($request->id);
        if (!$Employee) {
            return back()->withErrors('Invalid Token');
        }
        $Employee ->delete();
        return redirect()->route('employee.list')->with('success', 'Employee Data has been Deleted Successfully');
        // return  $image;
    }
}
