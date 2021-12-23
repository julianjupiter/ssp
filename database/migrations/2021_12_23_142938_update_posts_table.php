<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->integer('website_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('website_id', 'fk_posts_website_id')->references('id')->on('websites');
            $table->foreign('user_id', 'fk_posts_user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('fk_posts_website_id');
            $table->dropColumn('website_id');
            $table->dropForeign('fk_posts_user_id');
            $table->dropColumn('user_id');
        });
    }
}
