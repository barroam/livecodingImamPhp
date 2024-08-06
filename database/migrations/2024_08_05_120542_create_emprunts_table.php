<?php

use App\Models\User;
use App\Models\Categorie;
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
        Schema::create('emprunts', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->oneDelete('cascade');
            $table->foreignIdFor(Categorie::class)->oneDelete('cascade');
            $table->date('date_emprunt');
            $table->date('date_retour_prevue');
            $table->date('date_retour_reelle')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emprunts');
    }
};
