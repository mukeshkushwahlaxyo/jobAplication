<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSeeker extends Model
{
    use HasFactory;
    
    protected $table = 'jobs_seeker';
    protected $fillable = [
                            'jobSeekerId',
                            'name',
                            'email',
                            'contact',
                            'address',
                            'gender',
                            'city_id',
                            'expected_ctc',
                            'current_ctc',
                            'notice_period'
                        ];
                        
    protected $primaryKey='jobSeekerId';

    public function educations(){
    	return $this->hasMany('App\Models\Education','jobSeekerId');
    }
    public function experiences(){
    	return $this->hasMany('App\Models\Experience','jobSeekerId');
    }
    public function languages(){
    	return $this->hasMany('App\Models\Language','jobSeekerId');
    }
    public function technicals(){
    	return $this->hasMany('App\Models\Technical','jobSeekerId');
    }

}
