<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsers extends Migration
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
            $table->String('full_name', 100);
            $table->String('email', 100)->unique();
            $table->char('phone_number', 20);
            $table->string('password', 100);
            $table->enum('gender', ['Male', 'Female', 'Other']);
        });
    }

    /**x    
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
