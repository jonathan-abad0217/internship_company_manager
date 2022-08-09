<?php

namespace App\Http\Controllers;
use App\Models\Employees;
use App\Models\Companies;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeForm;

class EmployeeController extends Controller
{
    // To show the employees with their info
    // alphabetical name order ascending
    //10 entries per page
    public function index()
    {      
        $companies = Companies::select('id', 'name')->get();
        $employee = Employees::orderBy('employee_first_name','asc')->paginate(10);
        return view('admin.employees.index')->with('employees', $employee)->with(compact('companies'));
      
    }
    //open create page
    public function create()
    {   
        //get id and name from companies
        $companies = Companies::select('id', 'name')->get();
        
        return view('admin.employees.create',compact('companies'));
    }

   
    public function store(EmployeeForm $request)
    {
        // request data from employeeform and get validated
        $data = $request->validated();
        $companies = Companies::findorFail($request->company_id);
        
        $companies->employees()->create($data);         //create data in database 

            return redirect()->route('employees.index');
       

    }

    public function edit(int $employee)
    {    
       //goes to edit page
        $companies = Companies::all();
        $employee = Employees::findorFail($employee);
        return view('admin.employees.edit',compact('companies','employee'));

    }


    public function update(EmployeeForm $request, $employee_id)
    {
        //update information of the employee
        $data = $request->validated();
        $employee = Employees::findOrFail($employee_id);
        $employee->update($data);
      
        
            return redirect()->route('employees.index');
       
        
      
    }

    //delete employee
    public function delete($id)
    {
        $data=Employees::find($id);
        $data->delete();
        return redirect()->route('employees.index');
    }
}
