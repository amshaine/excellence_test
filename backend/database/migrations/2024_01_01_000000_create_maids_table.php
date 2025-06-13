<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('maids', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nationality');
            $table->string('religion')->nullable();
            $table->integer('age')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('experience')->nullable();
            $table->string('place_of_experience')->nullable();
            $table->string('language')->nullable();
            $table->string('skills')->nullable();
            $table->string('package')->nullable();
            $table->string('living_option')->nullable();
            $table->string('domestic_worker')->nullable();
            $table->string('office_fee')->nullable();
            $table->string('monthly_payment')->nullable();
            $table->string('photo')->nullable();
            $table->string('video')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('maids');
    }
}; 