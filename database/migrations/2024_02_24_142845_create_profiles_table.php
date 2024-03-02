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
        Schema::create('profiles', function (Blueprint $table) {
            // $table->id();
            $table->unsignedBigInteger('user_id')->constrained('users');
            $table->string('phone');
            $table->string('website')->nullable();
            $table->string('bio')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->string('gender');
            $table->string('user_handle');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
