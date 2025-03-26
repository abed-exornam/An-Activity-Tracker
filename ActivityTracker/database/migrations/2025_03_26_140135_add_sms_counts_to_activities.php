<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::table('activities', function (Blueprint $table) {
            $table->integer('sms_count')->nullable()->after('name');
            $table->integer('log_sms_count')->nullable()->after('sms_count');
        });
    }

    public function down() {
        Schema::table('activities', function (Blueprint $table) {
            $table->dropColumn(['sms_count', 'log_sms_count']);
        });
    }
};
