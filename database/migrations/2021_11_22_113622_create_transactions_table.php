<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_tb', function (Blueprint $table) {
           $table->increments('sN');
           $table->string('transactionId')->unique()->primaryKey();
           $table->integer('account_id');
           $table->string('amount');
           $table->string('date');
           $table->string('status')->default('');
           $table->string('use_status');
           $table->string('resource');
           $table->string('RRR')->default('');
           $table->integer('code')->default(0);

           

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
        Schema::dropIfExists('transaction_tb');
    }
}
