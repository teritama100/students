<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Top3 extends Model
{
    public function selectAll(){
        $query = \DB::table('school_grades')->select('id','grade','term','japanese','math','science','social_students','music','home_economics','english','art','health_and_physial_education',)->get();
        return $query;
    }
        protected $table = 'school_grades';
        protected $fillable = ['user_name', 'email','password'];
        protected $dates =  ['created_at', 'updated_at'];
}
{
    $id;
    $grade;
    $term;
    $japanese;
    $math;
    $science;
    $social_studies;
    $music;
    $home_economics;
    $english;
    $art;
    $health_and_physial_education;
   }