<?php

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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('password');
            //$table->string('package');
            $table->string('email')->unique();
            $table->boolean('is_banned')->default(1);
            //$table->boolean('is_full')->default(0);
            $table->string('role')->default('seller');
            $table->string('inputstate');
            $table->text('comment');
            //$table->ipAddress('visitor');
            $table->rememberToken();
            $table->timestampsTz();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
