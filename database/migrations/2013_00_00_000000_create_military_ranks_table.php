<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMilitaryRanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('military_ranks', function (Blueprint $table) {
            // Primary Key
            $table->bigIncrements('id');

            $table->string('name')->index();
            $table->string('abbr')->index();
            $table->string('pay_grade')->index()->nullable();
            $table->unsignedBigInteger('display_order')->index()->default(0);
            $table->unsignedBigInteger('classification_id')->index();
            $table->unsignedBigInteger('branch_id')->index();

            // Meta
            $table->boolean('active')->default(true);
            $table->timestamps();

            // Keys
            $table->foreign('classification_id')
                ->references('id')
                ->on('military_rank_classifications')
                ->onUpdate('cascade');

            $table->foreign('branch_id')
                ->references('id')
                ->on('military_branches')
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
        Schema::dropIfExists('military_ranks');
    }
}
