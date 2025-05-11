<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Top2 extends Model
{
    public function selectAll(){
        $query = \DB::table('students')->select('id','grade','name','addres','img_path','comment',)->get();
        return $query;
    }
        protected $table = 'students';
        protected $fillable = ['user_name', 'email','password'];
        protected $dates =  ['created_at', 'updated_at'];
}