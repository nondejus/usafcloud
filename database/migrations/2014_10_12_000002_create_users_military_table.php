<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersMilitaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_military', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('user_id')->index()->unique();

            $table->unsignedBigInteger('branch_id')->nullable();
            $table->unsignedBigInteger('rank_id')->nullable();
            $table->boolean('prior_service')->default(false);
            $table->boolean('prior_enlisted')->default(false);

            // Meta
            $table->timestamps();

            // Keys
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('branch_id')
                ->references('id')
                ->on('military_branches')
                ->onUpdate('cascade');

            $table->foreign('rank_id')
                ->references('id')
                ->on('military_ranks')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_military');
    }
}
