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
        
        return Employees::orderBy('employee_first_name', 'asc')->paginate(10);  

      
    }

    public function store(EmployeeForm $request)
    {
        
        $data = $request->validated();
        $companies = Companies::findorFail($request->company_id);
        
        $companies->employees()->create($data);
            return Employees::all();

    }


   
    public function update(EmployeeForm $request, $employee_id)
    {
    
        $data = $request->validated();
        $employee = Employees::findOrFail($employee_id);
        $employee->update($data);
            return Employees::all();
       
        
      
    }

  
    public function delete($id)
    {
        $data=Employees::find($id);
        $data->delete();
        return Employees::all();
    }
}

