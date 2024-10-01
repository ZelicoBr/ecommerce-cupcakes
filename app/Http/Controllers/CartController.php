<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cupcake;

class CartController extends Controller
{
    public function addToCart(Request $request) {
        $cupcake = Cupcake::find($request->cupcake_id);
    
        if (!$cupcake) {
            return redirect('/cupcakes')->with('error', 'Cupcake não encontrado.');
        }
    
        // Inicializa o carrinho na sessão
        $cart = session()->get('cart', []);
    
        // Adiciona o cupcake ao carrinho
        if (isset($cart[$cupcake->id])) {
            $cart[$cupcake->id]['quantidade']++;
        } else {
            $cart[$cupcake->id] = [
                "nome" => $cupcake->nome,
                "preco" => $cupcake->preco,
                "quantidade" => 1,
                "imagem" => $cupcake->imagem, 
            ];
        }
    
        // Atualiza o carrinho na sessão
        session()->put('cart', $cart);
    
        return redirect('/cart')->with('success', 'Cupcake adicionado ao carrinho!');
    }
    
    
    

    public function viewCart() {
        $cart = session()->get('cart');
        return view('cart.index', compact('cart'));
    }

    public function updateCart(Request $request) {
        $cart = session()->get('cart');
    
        // Verifica se a quantidade é zero e remove o item
        if (isset($cart[$request->cupcake_id])) {
            if ($request->quantidade <= 0) {
                unset($cart[$request->cupcake_id]);
            } else {
                $cart[$request->cupcake_id]['quantidade'] = $request->quantidade;
            }
        }
    
        session()->put('cart', $cart);
    
        return redirect('/cart')->with('success', 'Carrinho atualizado com sucesso!');
    }
    
    public function removeFromCart($id) {
        $cart = session()->get('cart');
    
        if (isset($cart[$id])) {
            unset($cart[$id]);
        }
    
        session()->put('cart', $cart);
    
        return redirect('/cart')->with('success', 'Cupcake removido do carrinho!');
    }
    

}

