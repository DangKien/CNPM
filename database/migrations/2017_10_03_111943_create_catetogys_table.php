<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatetogysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catetogys', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('title');
            $table->string('description');
            $table->integer('status');
            $table->integer('id_cate');
            $table->integer('user_id');
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
        Schema::dropIfExists('catetogys');
    }
}
