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
    Schema::create('activity_logs', function (Blueprint $table) {
        $table->id();
        $table->foreignId('activity_id')->constrained()->onDelete('cascade'); // Activity being logged
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Who updated the activity
        $table->string('action'); // Action taken (e.g., "Marked as Done")
        $table->text('remark')->nullable(); // Optional remark
        $table->timestamps(); // Created_at & Updated_at
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_logs');
    }
};
