<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate-Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderDetail extends Model
{
    use HasFactory;

    /**
     * Un Detalle de Orden PERTENECE A una Orden
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Un Detalle de Orden PERTENECE A un Platillo
     */
    public function dish(): BelongsTo
    {
        return $this->belongsTo(Dish::class);
    }
}
