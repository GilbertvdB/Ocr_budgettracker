<?php

use App\Models\Budget;
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
        Schema::create('share_budget_invitations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Budget::class)->constrained()->cascadeOnDelete();
            $table->integer('from_user');
            $table->integer('to_user')->nullable();
            $table->string('to_email')->nullable();
            $table->string('status')->default('pending');
            $table->string('token')->unique()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('share_budget_invitations');
    }
};
