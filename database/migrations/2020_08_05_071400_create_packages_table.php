<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->string('name');
            $table->string('description')->nullable();
            $table->unsignedFloat('min_amount', 15, 2);
            $table->unsignedFloat('max_amount', 15, 2);
            $table->unsignedFloat('gift_bonus', 15, 2)->default(0);
            $table->unsignedInteger('percentage');
            $table->unsignedInteger('duration');
            $table->foreignId('status_id')->constrained();
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
        Schema::dropIfExists('packages');
    }
}
