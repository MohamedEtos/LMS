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
        Schema::create('lession_to_days', function (Blueprint $table) {
            $table->id();

            $table->string('lessionName');
            $table->text('lessionURL');

            $table->bigInteger('dayId')->unsigned();
            $table->foreign('dayId')->references('id')->on('week_to_days')->onDelete('cascade')->onUpdate('cascade');

            $table->bigInteger('weekId')->unsigned();
            $table->foreign('weekId')->references('id')->on('courses_weeks')->onDelete('cascade')->onUpdate('cascade');

            $table->bigInteger('coursesId')->unsigned();
            $table->foreign('coursesId')->references('id')->on('courses')->onDelete('cascade')->onUpdate('cascade');

            $table->bigInteger('quizId')->unsigned();
            $table->foreign('quizId')->references('id')->on('days_quizzes')->onDelete('cascade')->onUpdate('cascade');

            $table->bigInteger('pdfId')->unsigned();
            $table->foreign('pdfId')->references('id')->on('days_pdfs')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lession_to_days');
    }
};
