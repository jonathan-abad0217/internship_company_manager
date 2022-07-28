<?php

namespace App\Http\Controllers;
use App\Models\Employees;

use Illuminate\Http\Request;
use App\Models\Companies;
use App\Http\Requests\CompanyFormRequest;
use Illuminate\Support\Facades\File;
class APIController extends Controller
{
    
    public function index()
    {
        
    $company = Companies::orderBy('name', 'asc')->paginate(10);

   

    return view('API.company.company_index')->with('companies', $company,);
            
        
    }
   
    public function create()
    {
        
        return view('API.company.company_create');
    }

    
    public function store(CompanyFormRequest $request)
    {
        
        $data = $request->validated();

        if($request->hasFile('image')){

            $destination_path ='public/images/companies';
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('image')->storeAs($destination_path, $image_name);
            
            $data['image'] =$image_name;
        
        }
        $companies = Companies::create($data);
       return redirect()->route('api.index');
    }
    
  
    public function show($id)
    {
        //
        $company = Companies::find($id);

       $employee = Employees::find($id);

        return view('api.show')->with('companies', $company);
        
    }

    
    public function edit($company)
    {
        //
        return view('api.edit', [
            'company' => Companies::findorFail($company)
        ]);
    }

   
    public function update(CompanyFormRequest $request, $id)
    {
        $company = Companies::find($id);
            $data = $request->validated();

            if($request->hasfile('image')){
                
                $destination_path ='public/images/companies';
                $image = $request->file('image');
                $image_name = $image->getClientOriginalName();
                $path = $request->file('image')->storeAs($destination_path, $image_name);

          
                $data['image'] =$image_name;
            }

            $company->update($data);

            
            return redirect()->route('api.index');
        }
   
    public function delete($id)
    {
            $data=Companies::find($id);
            $data->delete();
            return redirect()->route('api.index');
        }
    

        
}