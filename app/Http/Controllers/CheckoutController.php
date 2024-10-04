<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index() {
        // Verifica se há itens no carrinho
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect('/cart')->with('error', 'Seu carrinho está vazio.');
        }

        // Exibe a página de checkout com os itens do carrinho
        return view('checkout.index', ['cart' => $cart]);
    }

    public function processCheckout(Request $request) {
        // Pega o carrinho da sessão
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect('/cart')->with('error', 'Seu carrinho está vazio.');
        }

        // Calcula o total do pedido
        $total = array_sum(array_map(fn($item) => $item['preco'] * $item['quantidade'], $cart));

        // Cria o pedido
        $order = Order::create([
            'user_id' => Auth::id(),
            'total' => $total,
        ]);

        // Cria os itens do pedido
        foreach ($cart as $id => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'cupcake_id' => $id,
                'quantidade' => $item['quantidade'],
                'preco' => $item['preco'],
            ]);
        }

        // Limpa o carrinho
        session()->forget('cart');

        return redirect('/')->with('success', 'Pedido realizado com sucesso!');
    }
}
