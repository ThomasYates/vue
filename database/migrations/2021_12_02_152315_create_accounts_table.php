<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('username')->default('');
            $table->string('password');
            $table->string('email');
            $table->string('nationality');
            $table->string('phone')->default('');
            $table->string('selectedAccountType');
            $table->boolean('tacAgree')->default(false);
            $table->boolean('verified')->default(false);
            $table->timestamp('verified_on')->nullable();
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
        Schema::dropIfExists('accounts');
    }
}
