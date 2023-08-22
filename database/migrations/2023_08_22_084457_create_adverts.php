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
            $table->string('gear')->nullable();
            $table->string('fuel')->nullable();
            $table->string('color')->nullable();
            $table->string('casetype')->nullable();
            $table->integer('sales_type');
            $table->integer('owner');
            $table->string('ownername');
            $table->string('sahibinden_url')->nullable();
            $table->string('arabam_url')->nullable();
            $table->decimal('damage', 9,2)->nullable();
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
