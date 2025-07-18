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
        Schema::create('electric_monthly_bills', function (Blueprint $table) {
            $table->id();
            $table->string('month_year')->nullable();
            $table->decimal('monthly_bill', 10, 2)->nullable();
            $table->foreignId('electric_meter_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('electric_monthly_bills');
    }
};
