<?php

use App\Models\School;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('diplomas', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(School::class)->constrained('schools');
            $table->string('name');
            $table->string('level');
            $table->string('field');
            $table->integer('duration');
            $table->decimal('price');
            $table->date('start_date');
            $table->date('application_deadline');
            $table->text('conditions');
            $table->text('description');
            $table->boolean('is_active');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('diplomas');
    }
};
