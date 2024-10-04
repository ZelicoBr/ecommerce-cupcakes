<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersAndOrderItemsTables extends Migration
{
    public function up()
    {
        // Tabela de pedidos
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->decimal('total', 10, 2);
            $table->timestamps();

            // Chave estrangeira para o usuário
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        // Tabela de itens do pedido
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('cupcake_id');
            $table->integer('quantidade');
            $table->decimal('preco', 10, 2);
            $table->timestamps();

            // Chave estrangeira para o pedido
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            // Chave estrangeira para os cupcakes
            $table->foreign('cupcake_id')->references('id')->on('cupcakes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('orders');
    }
}
