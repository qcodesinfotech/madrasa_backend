<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignSyllabiTable extends Migration
{

    public function up()
    {
        Schema::create('assign_syllabi', function (Blueprint $table) {
            $table->id();
            $table->string('student_id');
            $table->string('type_syllabus_id');
            $table->string('month');
         
            $table->timestamps();
        });
    }



    public function down()
    {
        Schema::dropIfExists('assign_syllabi');
    }
}
