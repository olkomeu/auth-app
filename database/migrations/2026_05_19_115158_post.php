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
    Schema::create('posts', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('text');
        $table->string('image')->nullable();
        $table->foreignId('categorias_id')->constrained('categorias')->onDelete('cascade');
        
        $table->string('marca')->nullable();
        $table->string('preco')->nullable();
        
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
