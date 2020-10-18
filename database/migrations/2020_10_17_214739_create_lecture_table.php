<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLectureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lecture', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('lecture_goal_desc');
            $table->date('lecture_start_date');
            $table->date('lecture_end_date');
            $table->boolean('use_nickname')->default(false);
            $table->boolean('use_classes')->default(false);
            $table->json('classes');
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
        Schema::dropIfExists('lecture');
    }
}
