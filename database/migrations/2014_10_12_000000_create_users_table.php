<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            // Primary Key
            $table->uuid('id');

            // Name Info
            $table->string('first_name')->index();
            $table->string('last_name')->index();
            $table->string('middle_name')->index()->nullable();
            $table->string('suffix')->index()->nullable();
            $table->string('nickname')->index()->nullable();

            // Primary Email
            $table->string('email')->unique()->index();
            $table->timestamp('email_verified_at')->nullable();

            // Misc
            $table->date('date_of_birth')->index()->nullable();
            $table->unsignedBigInteger('gender_id')->index()->nullable();
            $table->text('avatar')->nullable();

            // Security Info
            $table->string('password')->nullable();
            $table->boolean('password_reset_required')->default(false);
            $table->timestamp('last_password_reset')->nullable()->default(now());
            $table->timestamp('last_login')->nullable();

            // Meta
            $table->rememberToken();
            $table->timestamps();

            // Keys
            $table->primary('id');
            $table->foreign('gender_id')
                ->references('id')
                ->on('genders')
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
        Schema::dropIfExists('users');
    }
}
