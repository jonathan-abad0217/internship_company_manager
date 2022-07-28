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
    return Companies::orderBy('name', 'asc')->paginate(10);   
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
        }else{
            $data['image'] = 'null';    
        
        }
        $companies = Companies::create($data);
       return Companies::all();
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

            
            return Companies::all();
        }
   
    public function delete($id)
    {
            $data=Companies::find($id);
            $data->delete();
            return Companies::all();
        }
    

        
}