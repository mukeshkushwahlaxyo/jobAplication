<?php

namespace App\Http\Repositories;

use Illuminate\Http\Request;
use App\Models\JobSeeker;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Language;
use App\Models\Technical;
use Auth;

class JobApplicationRepository 
{
	public function Save(Request $request)
	{
		$this->CreateAndUpdate($request);
	}

	public function CreateAndUpdate($request,$jobSeekerId =null){
        $data = $request->all();
        if($jobSeekerId != null ){
            JobSeeker::find($jobSeekerId)->update($data);
            Education::where('jobSeekerId',$jobSeekerId)->delete();
            Experience::where('jobSeekerId',$jobSeekerId)->delete();
            Language::where('jobSeekerId',$jobSeekerId)->delete();
            Technical::where('jobSeekerId',$jobSeekerId)->delete();

        }else{
	        $jobSeekerId = JobSeeker::create($data)->jobSeekerId;
        }
 

        $eduNames = $request->eduName;
        foreach ($eduNames as $key => $eduName) {
            $eduData = [
                'jobSeekerId'   => $jobSeekerId,
                'educName'      => $eduName,
                'board'         => $request->board[$key],
                'year'          => $request->year[$key],
                'percent'       => $request->percent[$key]
            ];

            Education::create($eduData);
        }

        $companies = $request->company;

        foreach ($companies as $ckey => $company) {
            $expData = [
                'jobSeekerId'   => $jobSeekerId,
                'company'       => $company,
                'designation'   => $request->designation[$ckey],
                'from'          => $request->from[$ckey],
                'to'            => $request->to[$ckey]
            ];
            Experience::create($expData);
        }

        $languages = isset($request->langName) ? $request->langName : [];


        foreach ($languages as $lkey => $language) {
            $answers  = isset($request->$language) ? $request->$language : [];
            foreach ($answers as $akey => $answer) {
                $langData = [
                    'jobSeekerId' =>$jobSeekerId,
                    'langName' => $language,
                    'answer' =>  $answer
                ];
                Language::create($langData);
            }

        } 
        $techNames = isset($request->techName) ? $request->techName : [];

        foreach ($techNames as $lkey => $techName) {
            $tanswer  = isset($request->$techName) ? $request->$techName : '';
            $techData = [
                'jobSeekerId'   =>$jobSeekerId,
                'techName' => $techName,
                'answer' =>  $tanswer
            ];
            if($tanswer !=''){
                Technical::create($techData);
            }
            
        }
    }

    public function getAllByOrder(){
    	return JobSeeker::with(['educations','experiences','languages','technicals'])->orderBy('jobSeekerId','desc')->get();
    }

    public function findOne($id){
    	return JobSeeker::with(['educations','experiences','languages','technicals'])->find($id);
    }

    public function Delete($id){
    	return JobSeeker::destroy($id);
    }
}
