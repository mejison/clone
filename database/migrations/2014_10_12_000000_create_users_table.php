<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('password')->nullable();
            $table->string('phone')->nullable();
            $table->string('email_other')->nullable();
            $table->string('comment')->nullable();
            $table->string('avatar')->nullable();
            $table->string('activate_link')->nullable();
            $table->float('ballance');
            $table->enum('status', ['active', 'pending', 'declined', 'sent']);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
