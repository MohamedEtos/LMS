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
        Schema::create('days_pdfs', function (Blueprint $table) {
            $table->id();
            $table->string('pdfName');
            $table->string('pdfLink');
            $table->bigInteger('dayId')->unsigned();
            $table->foreign('dayId')->references('id')->on('week_to_days')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('days_pdfs');
    }
};
