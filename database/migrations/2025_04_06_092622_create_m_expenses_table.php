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
        Schema::create('m_expenses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_users');
            $table->decimal('amount',15,2);
            $table->unsignedBigInteger('id_m_source');
            $table->text('description');
            $table->date('date');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_expenses');
    }
};
