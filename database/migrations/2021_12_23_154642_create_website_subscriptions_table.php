<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsiteSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('website_subscriptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');            
            $table->string('email');   
            $table->integer('website_id')->unsigned();
            $table->timestamp('subscription_sent_at')->nullable();
            $table->timestamps();
            $table->foreign('website_id', 'fk_website_subscriptions_website_id')->references('id')->on('websites');
            $table->unique(['email', 'website_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('website_subscriptions');
    }
}
