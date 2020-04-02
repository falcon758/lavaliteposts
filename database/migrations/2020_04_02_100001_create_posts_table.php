<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration
{
    /*
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {

        /*
         * Table: posts
         */
        Schema::create('posts', function ($table) {
            $table->increments('id');
            $table->string('name', 200)->nullable();
            $table->string('slug', 200)->nullable();
            $table->string('content', 200)->nullable();
            $table->integer('user_id')->nullable();
            $table->string('user_type', 200)->nullable();
            $table->integer('posts_id')->nullable();
            $table->softDeletes();
            $table->nullableTimestamps();
        });
    }

    /*
    * Reverse the migrations.
    *
    * @return void
    */

    public function down()
    {
        Schema::drop('posts');
    }
}
