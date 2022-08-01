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
        if($request ->sortBy && in_array($request->sortBy,['id', 'created_at'])){
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
                'message'=>'Blog successfully fetched',
                'data'=> $company
            ],200);
            

    }
   

    public function store(CompanyFormRequest $request)
    {
        $company = new Company();

        $company->name = $request->name;
        $company->email = $request->email;
        $company->image = 'null';
        $company->website = $request->website;

        $data = $company->save();
        if(!$data){
            return response()->json([
                'status' => 400,
                'error' => 'something went wrong'
            ]);
        }else{
            return response()->json([
                'message' => 'Data successfully saved',
                'status' => 200,
            ]);
        }
    }
        
    //     $data = $request->validated();

    //     if($request->hasFile('image')){

    //         $destination_path ='public/images/companies';
    //         $image = $request->file('image');
    //         $image_name = $image->getClientOriginalName();
    //         $path = $request->file('image')->storeAs($destination_path, $image_name);

    //         $data['image'] =$image_name;
    //     }else{
    //         $data['image'] = 'null';    
        
    //     }
    //     $companies = Companies::create($data);

    //    return response($companies, 200);
    // }
   
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

            
            return response($company, 200);
        }
   
    public function delete($id)
    {
            $data=Companies::find($id);
            $data->delete();

            return response($data, 200);
        }    
        }
        