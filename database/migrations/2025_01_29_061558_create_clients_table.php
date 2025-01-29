<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('firstName');
            $table->string('lastname');
            $table->string('dob');
            $table->integer('phone');
            $table->integer('genderId');
            $table->string('address');
            $table->string('email')->unique();
            $table->string('passportNum');
            $table->string('countryCode');
            $table->string('passportAuthority');
            $table->string('nidNumm');
            $table->string('plaseOfBirth');
            $table->string('passportIssueDateStart');
            $table->string('passportIssueDateEnd');
            $table->string('fatherName');
            $table->string('motherName');
            $table->string('spouseName');
            $table->string('s_dob');
            $table->string('s_address');
            $table->string('emgName');
            $table->string('emgRelation');
            $table->string('emgAddress');
            $table->string('emgPhone');
            $table->integer('referid');
            $table->integer('countructAmount');
            $table->integer('advance');
            $table->integer('countryId');
            $table->string('payMathod');
            $table->string('payBankName');
            $table->string('payAccountNum');
            $table->string('remark');
            $table->string('pImg');
            $table->string('passImg');
            $table->string('nidImg');
            $table->string('sNidImg');
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
        Schema::dropIfExists('clients');
    }
}
