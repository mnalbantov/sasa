<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePtypesAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_property_type', function (Blueprint $table) {
            $table->integer('ad_id')->unsigned();
            $table->integer('property_type_id')->unsigned();
            $table->foreign('ad_id')->references('id')->on('ads')->onDelete('cascade');
            $table->foreign('property_type_id')->references('id')->on('property_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ad_property_type');
    }
}
