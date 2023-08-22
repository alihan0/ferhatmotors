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
        Schema::create('adverts', function (Blueprint $table) {
            $table->id();
            $table->integer('user');
            $table->string('username');
            $table->string('brand');
            $table->string('model');
            $table->string('package')->nullable();
            $table->string('motor')->nullable();
            $table->string('km');
            $table->integer('year');
            $table->string('gear');
            $table->string('fuel');
            $table->string('color');
            $table->string('casetype');
            $table->integer('sales_type');
            $table->integer('owner');
            $table->string('ownername');
            $table->string('sahibinden_url');
            $table->string('arabam_url');
            $table->string('ownername');
            $table->decimal('damage', 9,2);
            $table->decimal('buy_price', 9,2);
            $table->decimal('sell_price', 9,2);
            $table->decimal('sold_price', 9,2)->nullable();
            $table->integer('profit')->nullable();
            $table->date('buy_date');
            $table->date('sold_date')->nullable();
            $table->integer('seller')->nullable();
            $table->string('sellername')->nullable();
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adverts');
    }
};
