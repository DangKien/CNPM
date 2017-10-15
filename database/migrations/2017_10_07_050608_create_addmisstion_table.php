<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddmisstionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addmission', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_student');
            $table->integer('gender');
            $table->date('birthday');
            $table->string('class_add');
            $table->string('name_parent');
            $table->string('phone');
            $table->string('email');
            $table->string('address');
            $table->integer('status');
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
        Schema::dropIfExists('addmission');
    }
}
