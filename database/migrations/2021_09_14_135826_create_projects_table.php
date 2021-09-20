<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('people');
        
            $table->unsignedBigInteger('region_id');
            $table->foreign('region_id')->references('id')->on('regions');           
            $table->integer('num_tower');
           
          
            $table->date('expected_delivery');
         
           
            $table->integer('period_of_warranty');
            $table->string('genre');
            $table->integer('date_of_check');
            $table->integer('cost');
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
        Schema::dropIfExists('projects');
    }
}
