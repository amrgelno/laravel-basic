<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdminPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adminposts', function (Blueprint $table) {
        $table->increments('id');
        $table->string('AdminPosts')->nullable();
        $table->integer('User_id')->unsigned();
        $table->timestamps();  
        $table->foreign('User_id')->references('id')->on('admins')->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
