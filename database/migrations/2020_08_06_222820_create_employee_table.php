<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('birth_date');
            $table->char('sex',1);
            $table->integer('salary');
            $table->unsignedBigInteger('super_id')->nullable();
            $table->foreign('super_id')->references('id')->on('employee')->onDelete('set null');
            $table->unsignedBigInteger('branch_id')->nullable();
            // $table->foreign('branch_id')->references('id')->on('branch')->onDelete('cascade');
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
        Schema::dropIfExists('employee');
    }
}
