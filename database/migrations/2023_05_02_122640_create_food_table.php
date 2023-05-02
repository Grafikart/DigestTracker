<?php

use App\Models\Food;
use App\Models\Movement;
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
        Schema::create('food', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('food_movement', function (Blueprint $table) {
            $table->foreignIdFor(Movement::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Food::class)->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_movement');
        Schema::dropIfExists('food');
    }
};
