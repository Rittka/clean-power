<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotworkingEquipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notworking_equipments', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('tower_equipment_id');
            $table->foreign('tower_equipment_id')->references('id')->on('tower_equipments');
            $table->unsignedBigInteger('check_id');
            $table->foreign('check_id')->references('id')->on('checks');
            $table->unsignedBigInteger('maintenance_id');
            $table->foreign('maintenance_id')->references('id')->on('maintenances');
           
            $table->integer('num_of_eqiupment');


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
        Schema::dropIfExists('notworking_equipments');
    }
}
