<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subunits', function (Blueprint $table) {
            $table->id();
            $table->string('subunit');
            $table->string('ratio');
            $table->unsignedBigInteger('unit_id');
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade');
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
        Schema::dropIfExists('sub_units');
    }
}
