<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_notifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('user_id')->index();
            $table->string('url')->nullable();
            $table->string('title')->nullable();
            $table->text('content')->nullable();

            // View/Read
            $table->boolean('viewed')->default(false);
            $table->boolean('mark_read')->default(false);

            // Snoozable
            $table->boolean('snoozed')->default(false);
            $table->timestamp('snoozed_until')->nullable();

            // Meta
            $table->json('payload')->nullable();
            $table->timestamps();

            // Keys
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_notifications');
    }
}
