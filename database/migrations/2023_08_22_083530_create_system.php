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
        Schema::create('system', function (Blueprint $table) {
            $table->id();
            $table->string('site_name');
            $table->string('site_url');
            $table->string('login_cover');
            $table->integer('site_status');
            $table->integer('add_expense');
            $table->date('delivery_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('system');
    }
};
