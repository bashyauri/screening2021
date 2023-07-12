<?php

use App\Models\Programme;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_accountcreation', function (Blueprint $table) {
            $table->integer('account_id')->primaryKey();
            $table->string('surname');
            $table->string('firstname');
            $table->string('m_name');
            $table->foreignIdFor(Programme::class);
            $table->string('email')->unique();
            $table->string('p_number')->unique();
            $table->string('password');
            $table->string('vpassword');
            $table->integer('complate')->unsigned()->nullable()->default('0');
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
        Schema::dropIfExists('tb_accountcreation');
    }
}
