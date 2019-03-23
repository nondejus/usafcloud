<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGoogleColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('gsuite_user')->default(false);
            $table->string('gsuite_email')->nullable();
            $table->timestamp('gsuite_created_at')->nullable();
            $table->boolean('gsuite_finished_provisioning')->default(false);
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
            $table->dropColumn('gsuite_user');
            $table->dropColumn('gsuite_email');
            $table->dropColumn('gsuite_created_at');
            $table->dropColumn('gsuite_finished_provisioning');
        });
    }
}
