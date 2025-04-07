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
        Schema::create('m_savings_targets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_users');
            $table->decimal('target_amount',15,2);
            $table->date('target_date');
            $table->string('title');
            $table->text('description');
            $table->timestamps();
            $table->softdeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_savings_targets');
    }
};
