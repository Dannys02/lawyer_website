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
        if (!Schema::hasTable('socialmedia')) {
            Schema::create('socialmedia', function (Blueprint $table) {
                $table->id();
                $table->string('facebook');
                $table->string('instagram');
                $table->string('wa');
                $table->string('tiktok');
                $table->string('maps');
                $table->string('address');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('socialmedia');
    }
};
