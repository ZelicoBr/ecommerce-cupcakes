<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'cupcake_id', 'quantidade', 'preco'];

    // Relacionamento com o pedido
    public function order() {
        return $this->belongsTo(Order::class);
    }

    // Relacionamento com o cupcake
    public function cupcake() {
        return $this->belongsTo(Cupcake::class);
    }
}
