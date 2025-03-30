<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Top extends Model
{
    public function selectAll(){
        $query = \DB::table('users')->select('email','user_name','password',)->get();
        return $query;
    }
        protected $table = 'users';
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