<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Company;
use File;
class CompanyController extends Controller
{
    //list 
    public function Index()
    {
        $Company = Company::paginate(5);
        // return $Company;
        return view('admin.company.list',compact('Company'));

        
    }

    //create
    public function Create()
    {
        return view('admin.company.create');
        
    }

    //store
    public function store(Request $request)
    {
        //valiadetion
        $request->validate([
            'name'          =>  'required',
            'email'         =>  'nullable|email|unique:companies',
            'logo'          =>  'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100'
        ]);
        $Company            = new Company();
        if ( $request->logo) {
            $image = $request->file('logo')->store('image', 'public');
            $Company->logo      =  'storage/'.$image;
        }
       
        $Company->name      =  $request->name;
        $Company->email     =  $request->email;
        $Company->website   =  $request->website;
        $Company->save();
        
        return redirect()->route('company.list')->with('success', 'Company Data has been saved Successfully');
        // return  $image;
    }

    //Show
    public function Show($id)
    {
        $Company            = Company::find($id);
        return view('admin.company.show',['Company'=>$Company]);
        
    }

    //Show
    public function edit($id)
    {
        $Company            = Company::find($id);
        return view('admin.company.edit',['Company'=>$Company]);
        
    }

     //store
     public function Update(Request $request)
     {
        // return  $request->all();
         //valiadetion
         $request->validate([
             'id'            =>  'required|exists:companies,id',
             'name'          =>  'required',
             'email'         =>  'nullable|email|unique:companies,email,'.$request->id,
             'logo'          =>  'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100'
         ]);
         
         $Company            = Company::find($request->id);
         if ( $request->logo) {
             $image = $request->file('logo')->store('image', 'public');
             $Company->logo      =  'storage/'.$image;
         }
        
         $Company->name      =  $request->name;
         $Company->email     =  $request->email;
         $Company->website   =  $request->website;
         $Company->save();
         
         return redirect()->route('company.list')->with('success', 'Company Data has been updated Successfully');
         // return  $image;
     }

    //Delete
    public function Destroy(Request $request)
    {

        //valiadetion
        $Company            = Company::find($request->id);
        $image_path         = public_path($Company->logo);
        $Employee            = Employee::where('company',$request->id)->first();
        if ($Employee) {
            return back()->withErrors('Please remove employes from company then try again');
        }
        if (!$Company) {
            return back()->withErrors('Invalid Token');
        }

            if(File::exists($image_path)) {
                File::delete($image_path);
            }
            $Company ->delete();
        return redirect()->route('company.list')->with('success', 'Company Data has been Deleted Successfully');
        // return  $image;
    }
}
