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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name')->nullable();
            $table->longText('description')->nullable();
            $table->float('price')->nullable();
            $table->float('special_price')->nullable();
            $table->tinyInteger('price_type')->default(0)->comment('0=>Fixed 1=>Percentage');
            $table->timestamp('sp_start')->nullable();
            $table->timestamp('sp_end')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0=>default');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
