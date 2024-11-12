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
        Schema::create('report_item', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('safety_report_id');
            $table->unsignedBigInteger('safety_item_id');
            $table->boolean('status');
            $table->text('comment')->nullable();

            $table->foreign('safety_report_id')->references('id')->on('safety_reports')->onDelete('cascade');
            $table->foreign('safety_item_id')->references('id')->on('safety_items')->onDelete('cascade');

            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report_item');
    }
};
