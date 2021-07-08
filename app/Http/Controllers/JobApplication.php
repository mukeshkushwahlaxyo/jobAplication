<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Log;
use App\Http\Repositories\FaqRepository;
use App\Http\Resources\GeneralResponse;
use Illuminate\Support\Facades\Validator;
use App\Http\Repositories\JobApplicationRepository;

class JobApplication extends Controller
{
    private $job;

    /**
     * construct
     */
    public function __construct(JobApplicationRepository $job)
    {
        $this->job = $job;
    }
    
    public function index()
    {
        $jobs =  $this->job->getAllByOrder();
        return view('jobseeker.index',compact('jobs'));
    }

   
    public function create()
    {
        return view('jobseeker.create');
    }

   
    public function store(Request $request)
    {
        DB::beginTransaction();
          $data =   $request->validate([
            'name'      => 'required|string|min:3|max:180',
            'email'     => 'required|min:2|email',
            'contact'   => 'required|min:10|max:10',
            'address'   => 'required|string',
            'gender'    => 'required|not_in:""',
            'city_id'   => 'required|not_in:""',
            'current_ctc'=> 'required',
            'expected_ctc'=> 'required',
            'notice_period'=> 'required'
        ]);
        try{

            $this->job->Save($request);
            DB::commit();
            return redirect()->back()->with('success','Job Application Form submitted Successfully'); 
        }
        catch(\Exception $e){
            DB::rollBack();
            \Log::info($e);
            return new GeneralError(['code'=>500,'message' => 'Something Went Wrong']);
        }

    }

    public function show($id)
    {
       $job =  $this->job->findOne($id);
       return view('jobseeker.show',compact('job'));
    }


    public function edit($id)
    {
        $data =  $this->job->findOne($id);

        return view('jobseeker.edit',compact('data'));
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
          $data =   $request->validate([
            'name'      => 'required|string|min:3|max:180',
            'email'     => 'required|min:2|email',
            'contact'   => 'required|min:10|max:10',
            'address'   => 'required|string',
            'gender'    => 'required|not_in:""',
            'city_id'   => 'required|not_in:""',
            'current_ctc'=> 'required',
            'expected_ctc'=> 'required',
            'notice_period'=> 'required'
        ]);
        try{

            $this->job->Save($request,$id);
            DB::commit();
            return redirect()->back()->with('success','Job Application Form Updated Successfully');
        }
        catch(\Exception $e){
            DB::rollBack();
            \Log::info($e);
            return redirect()->back()->with('error','Something Went Wrong');
        }
  
    }

    public function delete($id)
    {
        $this->job->Delete($id);
         return redirect()->back()->with('success','Job Application Form Deleted Successfully');

    }

    public function validation($request,$jobSeekerId =null){
          
    }
}
