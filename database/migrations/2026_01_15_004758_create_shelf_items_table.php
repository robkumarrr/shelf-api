<?php

use App\ShelfItemStatus;
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
        Schema::create('shelf_items', function (Blueprint $table) {
            $table->id();
            $table->morphs('itemable');
            $table->integer('rating')->nullable();
            $table->date('released_on')->nullable();
            $table->date('acquired_on')->nullable();
            $table->date('last_used_on')->nullable();
            $table->enum('status', ShelfItemStatus::cases())->nullable();
            $table->decimal('purchase_price', 8, 2)->nullable();
            $table->string('purchase_location')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shelf_items');
    }
};
