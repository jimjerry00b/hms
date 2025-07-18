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
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('image')->nullable();
            $table->string('nid')->nullable();
            $table->string('flat_id')->nullable();
            // $table->foreignId('flat_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('house_id')->constrained()->onDelete('cascade');
            $table->boolean('is_active')->default(true);
            $table->string('move_in_date')->nullable();
            $table->string('move_out_date')->nullable();
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenants');
    }
};
