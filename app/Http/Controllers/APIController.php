<?php

namespace App\Http\Controllers;
use App\Models\Employees;

use Illuminate\Http\Request;
use App\Models\Companies;
use App\Http\Requests\CompanyFormRequest;
use Illuminate\Support\Facades\File;
class APIController extends Controller
{
    
    public function index(Request $request)
    {
        $company_query = new Companies();
        if($request ->sortBy && in_array($request->sortBy,['id', 'website'])){
            $sortBy=$request->sortBy;

        }else{
            $sortBy='name';
        }
        if($request->sortOrder && in_array($request->sortOrder,['asc','desc'])){
            $sortOrder=$request->sortOrder;
        
        }else{
            $sortOrder='desc';
        }
        
        if($request->paginate){
            $company=$company_query->orderBY($sortBy,$sortOrder)->paginate($request->paginate);

        }else{
            $company=$company_query->ordeBY($sortBy,$sortOrder)->get();

        }
           
            return response()->json([
                'message'=>'Data successfully fetched',
                'status' => 200,
                'data'=> $company
            ]);
            

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
            $data['image'] ="null";
        }
        $companies = Companies::create($data);

       return response()->json([
        'message' => 'Data successfully saved',
        'status' => 200,
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

            
            return response()->json([
                'message' => 'Data successfully updated',
                'status' => 200,
               ]);
        }
   
    public function delete($id)
    {
            $data=Companies::find($id);
            $data->delete();

            return response()->json([
                'message' => 'Data successfully deleted',
                'status' => 200,
            ]);
        }    
        }
        