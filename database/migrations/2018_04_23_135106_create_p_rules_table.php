<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_property_rules', function (Blueprint $table) {
            $table->integer('ad_id')->unsigned();
            $table->integer('property_rule_id')->unsigned();
            $table->foreign('ad_id')->references('id')->on('ads')->onDelete('cascade');
            $table->foreign('property_rule_id')->references('id')->on('property_rules')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ad_property_rules');
    }
}
