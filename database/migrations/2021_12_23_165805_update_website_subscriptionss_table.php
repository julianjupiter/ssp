<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateWebsiteSubscriptionssTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('website_subscriptions', function (Blueprint $table) {
            $table->dropColumn('subscription_sent_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('website_subscriptions', function (Blueprint $table) {
            $table->timestamp('subscription_sent_at')->nullable()->after('website_id');
        });
    }
}
