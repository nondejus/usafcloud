<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Examples
 * - Enlisted Airmen
 * - Noncommissioned Officer
 * - Noncommissioned Officer Special
 * - Commissioned Officer
 * - Company Grade Officer
 * - Field Officer
 * - General Officer
 */

class CreateMilitaryRankClassificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('military_rank_classifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->index();
            $table->unsignedBigInteger('display_order')->index()->default(0);
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
        Schema::dropIfExists('military_rank_classifications');
    }
}
