<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->length(50);
            $table->string('server',50);
            $table->string('account',50);
            $table->string('username',50);
            $table->string('password',50);
            $table->string('type',50);
            $table->string('network',50);
            $table->string('noofconn',50);
            $table->string('phone',50);
            $table->string('rental',50);
            $table->string('address',50);
            $table->string('total',50);
            $table->string('remark',50);
             
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
        Schema::dropIfExists('customers');
    }
}
