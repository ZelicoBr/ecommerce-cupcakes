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
    Schema::create('itens_pedido', function (Blueprint $table) {
        $table->id();
        $table->foreignId('id_pedido')->constrained('pedidos');
        $table->foreignId('id_cupcake')->constrained('cupcakes');
        $table->integer('quantidade');
        $table->decimal('preco_unitario', 10, 2);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_pedidos');
    }
};
