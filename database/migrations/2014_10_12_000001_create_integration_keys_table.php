<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('integration_keys', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('key');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('integration_keys');
    }
};
