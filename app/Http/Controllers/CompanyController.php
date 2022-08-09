<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Employees;
use App\Models\Companies;
use App\Http\Requests\CompanyFormRequest;
use Illuminate\Support\Facades\File;

class CompanyController extends Controller
{
    // To show the companies with their info
    // alphabetical order ascending
    //10 entries per page
    public function index()
    {
        
    $company = Companies::orderBy('name', 'asc')->paginate(10);

    return view('admin.companies.index')->with('companies', $company,);
            
        
    }
    
    public function create()
    {
        //open create page
        return view('admin.companies.create');
    }

    //to store data from create page
    public function store(CompanyFormRequest $request)
    {
        
        $data = $request->validated();
        
        //image storage 
        if($request->hasFile('image')){

            $destination_path ='public/images/companies';           //storage path
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();          //get the original name of the file
            $path = $request->file('image')->storeAs($destination_path, $image_name);
            
            $data['image'] =$image_name;
        
        }else{
            $data['image'] = 'null';                //if there are no picture, null the image
        }
        $companies = Companies::create($data);          //create in database all the requests after validation
       return redirect()->route('companies.index');
    }
    
        //shows the company details and their employees
    public function show($id)
    {
        
        $company = Companies::find($id);

       $employee = Employees::find($id);

        return view('admin.companies.show')->with('companies', $company);
        
    }

    
    public function edit($company)
    {       //goes to edit page
        
        return view('admin.companies.edit', [
            'company' => Companies::findorFail($company)
        ]);
    }

    //update information of the company
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
            
            return redirect()->route('companies.index');
        }
   //delete company
    public function delete($id)
    {
            $data=Companies::find($id);
            $data->delete();
            return redirect()->route('companies.index');
        }
    
}

