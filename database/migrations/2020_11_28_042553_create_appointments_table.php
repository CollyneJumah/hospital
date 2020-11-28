<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('doctor_id');
            $table->string('appointment_date');
            $table->string('appointment_time');
            $table->string('email');
            $table->string('phone');
            $table->text('remark');
            $table->integer('status')->default(1);
            $table->string('created_by');
            $table->timestamps();

            $table->foreign('patient_id')
                    ->references('id')
                    ->on('patients')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->foreign('department_id')
                    ->references('id')
                    ->on('departments')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->foreign('doctor_id')
                    ->references('id')
                    ->on('doctors')
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
        Schema::dropIfExists('appointments');
    }
}
