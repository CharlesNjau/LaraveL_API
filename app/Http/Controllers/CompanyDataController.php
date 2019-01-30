<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use\App\http\Requests;
use App\CompanyData;
use App\Http\Resources\CompanyData as CompanyDataResource;
use Faker\Provider\ru_RU\Company;

class CompanyDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get CompnayBio
        $CompanyBio=CompanyData::paginate(15);
        //Return Compnay Bio as collection of resouce
        return CompanyDataResource::collection($CompanyBio);
    }

   
     
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $method = $request->method();
        $first_name=$request->input('first_name');
        $last_name=$request->input('last_name');
        $company_bio=$request->input('company_bio');
        $title=$request->input('title');
        $web_site=$request->input('web_site');
       

        if ($request->isMethod('post')) {
            //
            $Message= array(
                'Success' =>'Data Inserted successfully!',
                'Status'=>'201',
                'CompanyDetail'=>array
                ('first_name'=>$first_name,
                 'last_name'=>$last_name,
                 'company_bio'=>$company_bio,
                 'website'=>$web_site,
                 'title'=>$title
                )
           );

       
            
            DB::table('company_datas')->insert(
                ['first_name' => $first_name,
                 'last_name' => $last_name,
                 'compnay_bio' => $company_bio,
                 'title' => $title,
                 'web_site' => $web_site,
                 ]
            );
            return json_encode($Message);
           
        }
        else{
            $message=array('Error'=>'Method Not allowed');
            return json_encode($message);

        }

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function AllEmployee()
    {
        //

         //Get CompnayBio
         //$CompanyBio=CompanyData::findOrFail($web_site);
         //Return Compnay Bio as collection of resouce
        

         //$Employee=CompanyData::select('SELECT * FROM company_datas');
         //$Employee = DB::table('company_datas')->pluck('first_name', 'last_name');
         $Employee = DB::Table('company_datas')->select('first_name','last_name')->get(); 
         return $Employee;        

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showme($web_site)
    {
        //

         //Get CompnayBio
         //$CompanyBio=CompanyData::findOrFail($web_site);
         //Return Compnay Bio as collection of resouce
         $result = DB::Table('company_datas')->select('first_name','last_name')->where('web_site',$web_site)->get(); 
         return $result;
        

    }

    public function GetBioByWeb($web_site)
    {
        //

         //Get CompnayBio
         //$CompanyBio=CompanyData::findOrFail($web_site);
         //Return Compnay Bio as collection of resouce

         $result = DB::Table('company_datas')->select('compnay_bio')->where('web_site',$web_site)->get(); 
         return $result;
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

   
}
