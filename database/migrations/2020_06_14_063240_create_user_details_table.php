<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('first_name',151)->nullable();
			$table->string('last_name',151)->nullable();
			$table->tinyInteger('gender')->nullable();
			$table->date('dob')->nullable();
			$table->unsignedBigInteger('phone')->nullable();
			$table->text('address')->nullable();
			$table->string('image_path')->nullable();
			$table->string('image_name')->nullable();
			$table->string('origin_name')->nullable();
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
        Schema::dropIfExists('user_details');
    }
}
