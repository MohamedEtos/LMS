<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('week_to_days', function (Blueprint $table) {
            $table->id();
            $table->integer('NumberOfDays');
            $table->string('VideoName');
            $table->string('VideoUrl')->nullable();
            $table->bigInteger('weekId')->unsigned();
            $table->foreign('weekId')->references('id')->on('courses_weeks')->onDelete('cascade')->onUpdate('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('week_to_days');
    }
};
