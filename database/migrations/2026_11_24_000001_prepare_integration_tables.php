<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('categories')) {
            Schema::create('categories', function (Blueprint $table) {
                $table->id();
                $table->string('name')->unique();
                $table->timestamps();
            });
        }

        if (! Schema::hasColumn('books', 'category_id')) {
            Schema::table('books', function (Blueprint $table) {
                $table->foreignId('category_id')
                    ->nullable()
                    ->constrained('categories')
                    ->restrictOnDelete();
            });
        }

        if (! Schema::hasColumn('users', 'role')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('role')->default('petugas');
            });
        }
    }

    public function down(): void
    {
        // 
    }
};