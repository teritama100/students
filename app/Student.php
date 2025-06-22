<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['grade', 'name', 'address', 'img_path', 'comment'];
    public function grades()
{
    return $this->hasMany(\App\SchoolGrade::class, 'student_id');
}


}
