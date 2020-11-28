<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('gender')->nullable();
            $table->unsignedBigInteger('county_id');
            $table->string('address')->nullable();
            $table->string('postalcode')->nullable();
            $table->string('profile')->nullable();
            $table->unsignedBigInteger('department_id');
            $table->string('created_by');
            $table->timestamps();

            //if records in the on()table gets deleted, these associated foreign key will also be deleted
            $table->foreign('department_id')
                    ->references('id')
                    ->on('departments')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->foreign('county_id')
                    ->references('id')
                    ->on('county')
                    ->onDelete('cascade')
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
        Schema::dropIfExists('doctors');
    }
}
