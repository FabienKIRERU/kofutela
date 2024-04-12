<?php

use App\Models\Area;
use App\Models\Quarter;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Quarter::class)->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->longText('description');
            $table->integer('surface');
            $table->integer('rooms');
            $table->integer('bedrooms')->nullable();
            $table->integer('floor')->nullable();
            $table->integer('price');
            $table->string('address');
            $table->boolean('sold');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
