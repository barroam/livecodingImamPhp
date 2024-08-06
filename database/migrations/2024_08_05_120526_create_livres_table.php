<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Categorie; // Assure-toi que le modèle est importé

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('livres', function (Blueprint $table) {
            $table->id();
            $table->string('isbn')->unique();
            $table->string('titre');
            $table->string('auteur');
            $table->string('image');
            $table->date('date_publication');
            $table->integer('quantite');
            $table->boolean('disponible')->default(true);
            $table->foreignIdFor(Categorie::class)->constrained()->onDelete('cascade'); // Correction ici
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livres');
    }
};
