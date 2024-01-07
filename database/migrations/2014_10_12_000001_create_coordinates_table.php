<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('coordinates', function (Blueprint $table) {
            $table->id();
            $table->float('latitude');
            $table->float('longitude');
            $table->string('address')->nullable();

            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->timestamps();

            $table->index(['created_at', 'user_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('coordinates');
    }
};
