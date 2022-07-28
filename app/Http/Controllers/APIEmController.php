<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use App\Models\Companies;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeForm;

class APIEmController extends Controller
{
    public function index()
    {      
        $companies = Companies::select('id', 'name')->get();
        $employee = Employees::orderBy('employee_first_name','asc')->paginate(10);
        return view('API.employee.employee_index')->with('employees', $employee)->with(compact('companies'));

       
        // $companies = Companies::select('id', 'name')->get();
        // $employee = Employees::all();
        // return view('employees.index',compact('companies', 'employee'));
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Companies::select('id', 'name')->get();
        
        return view('API.employee.employee_create',compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeForm $request)
    {
        
        
        $data = $request->validated();
        $companies = Companies::findorFail($request->company_id);
        
        $companies->employees()->create($data);

           
            return redirect()->route('apie.index');
       

    }

    public function edit(int $employee)
    {    
       
        $companies = Companies::all();
        $employee = Employees::findorFail($employee);
        return view('apie.edit',compact('companies','employee'));

    }

   
    public function update(EmployeeForm $request, $employee_id)
    {
    
        $data = $request->validated();
        $employee = Employees::findOrFail($employee_id);
        $employee->update($data);
            return redirect()->route('apie.index');
       
        
      
    }

  
    public function delete($id)
    {
        $data=Employees::find($id);
        $data->delete();
        return redirect()->route('apie.index');
    }
}

