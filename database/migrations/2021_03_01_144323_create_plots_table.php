<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plots', function (Blueprint $table) {
            $table->increments('id');
            $table->string('plot_name');
            $table->unsignedInteger('properties_id');
            $table->foreign('properties_id')->references('id')->on('properties');
            $table->unsignedInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users');
            $table->string('plot_address');
            $table->string('plot_number');
            $table->string('plot_coordinate');
            $table->string('plot_size');
            $table->string('plot_price');
            $table->enum('status', ['sold', 'available', 'reserved']);
            $table->enum('process', ['initiated', 'pending', 'completed'])->nullable();
            $table->integer('active')->default(0);
            $table->enum('stage', ['alkalo', 'sketch_plan', 'physical_plan', 'areal_council', 'chief_approval', 'capital_gains', 'DHL/Client_pickup'])->nullable();
            $table->json('plot_imgs');
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
        Schema::dropIfExists('plots');
    }
}
