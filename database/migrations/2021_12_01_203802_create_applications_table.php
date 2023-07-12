<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('application_form')) return;
        Schema::create('application_form', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rrr_code')->unique();
            $table->string('transactionId')->unique();
            $table->string('account_id')->unique();
            $table->string('surname');
            $table->string('firstname');
            $table->string('m_name')->nullable();
            $table->string('programme_id');
            $table->string('gender');
            $table->string('d_birth');
            $table->string('marital_status');
            $table->string('nationality');
            $table->integer('stateid')->unsigned();
            $table->integer('lgaid')->unsigned();
            $table->string('home_town');
            $table->string('p_number');
            $table->longText('home_address');
            $table->longText('cor_address');
            $table->string('sponsor');
            $table->string('nextkin_name');
            $table->string('nextkin_gsm');
            $table->longText('nextkin_address');
            $table->string('filename')->nullable();
            $table->integer('department_id')->default(0);
            $table->string('remark')->nullable();
            $table->string('recommendation')->nullable();
            $table->string('pro_status')->nullable();
            $table->integer('batch')->default(0);
            $table->string('list_status')->nullable();
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
        Schema::dropIfExists('application_form');
    }
}
