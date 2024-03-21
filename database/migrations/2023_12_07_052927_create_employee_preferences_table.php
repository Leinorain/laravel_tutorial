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
        Schema::create('employee_preferences', function (Blueprint $table) {
            $table->foreignId('employee_id')->constrained('employees');
            $table->boolean('is_happy');
            $table->unsignedSmallInteger('favorite_year');
            $table->unsignedDecimal('preferred_hourly_rate', 10, 2);
            $table->string('ip_address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_preferences');
    }
};
