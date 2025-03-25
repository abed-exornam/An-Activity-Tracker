<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('activities', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // Activity name
        $table->text('description')->nullable(); // Optional description
        $table->enum('status', ['pending', 'done'])->default('pending'); // Status
        $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
        $table->timestamps(); // Created_at & Updated_at
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
