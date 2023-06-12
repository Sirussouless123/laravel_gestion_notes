<?php

use App\Models\Filiere;
use App\Models\Matiere;
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
        Schema::create('filiere_matieres', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Filiere::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Matiere::class)->constrained()->cascadeOnDelete();
            $table->integer('credit');
            $table->integer('masse');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filiere_matieres');
    }
};
