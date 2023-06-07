<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProposedCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposed_courses', function (Blueprint $table) {
            $table->id();
            $table->integer('account_id')->unique();
            $table->string('rrr_code')->unique();
            $table->string('jamb_file');
            $table->string('score');
            $table->integer('department_id');
            $table->integer('course_id');
         
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
        Schema::dropIfExists('proposed_courses');
    }
}
