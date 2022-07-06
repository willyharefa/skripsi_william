<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assestments', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id');
            $table->integer('teacher_id');
            $table->integer('bindo');
            $table->integer('bingg');
            $table->integer('bdaer');
            $table->integer('sbd');
            $table->integer('ppkn');
            $table->integer('mtk');
            $table->integer('pjok');
            $table->integer('ipa');
            $table->integer('ips');
            $table->integer('pd');
            $table->integer('academic_year_id');
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
        Schema::dropIfExists('assestments');
    }
};
