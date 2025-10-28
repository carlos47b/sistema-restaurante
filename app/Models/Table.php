<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany; // <-- Importante

class Table extends Model
{
    use HasFactory;

    /**
     * Define la relación "hasMany" (uno a muchos) con el modelo Order.
     */
    public function orders(): HasMany
    {
        // Esta mesa TIENE MUCHAS órdenes (Orders)
        return $this->hasMany(Order::class);
    }
}
