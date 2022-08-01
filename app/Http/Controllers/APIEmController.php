<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use App\Models\Companies;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeForm;

class APIEmController extends Controller
{

    

    public function index(Request $request)
    {
        $employee_query = new Employees();
        if($request ->sortBy && in_array($request->sortBy,['id', 'created_at'])){
            $sortBy=$request->sortBy;

        }else{
            $sortBy='employee_first_name';
        }
        if($request->sortOrder && in_array($request->sortOrder,['asc','desc'])){
            $sortOrder=$request->sortOrder;
        
        }else{
            $sortOrder='desc';
        }
        
        if($request->paginate){
            $employee=$employee_query->orderBY($sortBy,$sortOrder)->paginate($request->paginate);

        }else{
            $employee=$employee_query->ordeBY($sortBy,$sortOrder)->get();

        }
           
            return response()->json([
                'message'=>'Blog successfully fetched',
                'data'=> $employee
            ],200);
            

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

