<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('settlement_zipcode', function (Blueprint $table) {
            $table->id();
            $table->integer('zipcode_id');
            $table->integer('settlement_id');
            $table->integer('municipality_id');
            $table->integer('zone_id');
            $table->integer('key');
            $table->unsignedBigInteger('settlementtype_id')->nullable();
            $table->foreign('settlementtype_id')->references('id')->on('settlementtypes');
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
        //
    }
};
