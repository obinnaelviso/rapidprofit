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
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->foreignId('role_id')->constrained();

            // Nullables
            $table->string('phone')->nullable();
            $table->string('referral_code')->nullable();
            // $table->string('referral_percentage')->nullable();
            $table->string('country')->nullable();
            $table->string('address')->nullable();
            $table->timestamp('email_verified_at')->nullable();

            $table->string('password');
            $table->foreignId('status_id')->constrained();
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
