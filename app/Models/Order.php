<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'total'];

    // Relação com o usuário
    public function user() {
        return $this->belongsTo(User::class); // Verifique se está apontando para o modelo User
    }

    // Relação com os itens do pedido
    public function items() {
        return $this->hasMany(OrderItem::class);
    }
}
