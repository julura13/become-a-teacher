<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequirementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requirements', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pathway_id');
            $table->string('pathway_name');
            $table->bigInteger('course_1_id');
            $table->string('course_1_name');
            $table->bigInteger('course_2_id')->nullable();
            $table->string('course_2_name')->nullable();
            $table->bigInteger('course_3_id')->nullable();
            $table->string('course_3_name')->nullable();
            // $table->string('course_ids');
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
        Schema::dropIfExists('requirements');
    }
}
