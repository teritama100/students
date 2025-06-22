<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

     public function up()
     {
         Schema::create('users', function (Blueprint $table) {
             $table->bigIncrements('id');
             $table->string('user_name');
             $table->string('email')->unique();
             $table->string('password');
             $table->remembertoken();
             $table->timestamps();
         });
         

        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('connection');
            $table->text('queue');
            $table->longText('payload');
            $table->longText('exception');
            $table->timestamp('failed_at')->useCurrent();
        });

        Schema::create('school_grades', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->unsignedBigInteger('student_id');
            $table->string('grade')->nullable();
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('img_path')->nullable();
            $table->text('comment')->nullable();
            $table->string('school_year')->nullable();
            $table->string('semester')->nullable();
            $table->integer('japanese')->nullable();
            $table->integer('math')->nullable();
            $table->integer('science')->nullable();
            $table->integer('social_studies')->nullable();
            $table->integer('music')->nullable();
            $table->integer('home_economics')->nullable();
            $table->integer('english')->nullable();
            $table->integer('art')->nullable();
            $table->integer('health_and_physical_education')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropTimestamps();
        });
        Schema::dropIfExists('students');
        Schema::dropIfExists('school_grades');
    }
    
}