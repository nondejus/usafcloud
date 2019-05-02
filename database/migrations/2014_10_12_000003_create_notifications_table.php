<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('notifiable_id')->index();
            $table->string('notifiable_type')->index();

            // Notification Item
            $table->string('title')->nullable();
            $table->text('content')->nullable();
            $table->string('action_text')->nullable();
            $table->string('action_url')->nullable();

            // View/Read
            $table->boolean('viewed')->default(false);
            $table->boolean('read')->default(false);

            // Snoozable
            $table->boolean('snoozed')->default(false);
            $table->timestamp('snoozed_until')->nullable();

            // Meta
            $table->json('payload')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}
