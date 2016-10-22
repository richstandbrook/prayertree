<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetPrayerRequestsForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('prayer_requests', function ($table) {
            $table->foreign('contact_id')->references('id')->on('contacts');
            $table->foreign('prayer_tree_id')->references('id')->on('prayer_trees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prayer_requests', function ($table) {
            $table->dropForeign('prayer_requests_contact_id_foreign');
            $table->dropForeign('prayer_requests_prayer_tree_id_foreign');
        });
    }
}
