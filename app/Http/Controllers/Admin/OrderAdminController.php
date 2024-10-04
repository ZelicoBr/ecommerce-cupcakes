<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderAdminController extends Controller
{
    public function index() {
        // Obtém todos os pedidos com os itens associados
        $orders = Order::with('items.cupcake')->get();
        return view('admin.orders.index', compact('orders'));
    }
}

