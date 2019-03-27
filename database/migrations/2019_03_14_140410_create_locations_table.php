<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('title');
            $table->string('main_image')->nullable();
            $table->string('complete_address', 500);
            $table->text('overview')->nullable();
            $table->text('unit_amenities')->nullable();
            $table->text('building_amenities')->nullable();
            $table->string('payment_of_rent')->nullable();
            $table->string('security_deposit')->nullable();
            $table->string('address_map_src', 2000)->nullable();
            $table->text('regulations')->nullable();
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
        Schema::dropIfExists('locations');
    }
}
