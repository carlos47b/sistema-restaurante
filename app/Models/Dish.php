<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dish extends Model
{
    use HasFactory;

    /**
     * Define la relación "belongsTo" (pertenece a) con el modelo Category.
     * Un platillo pertenece a una única categoría.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Define la relación "hasMany" (uno a muchos) con el modelo OrderDetail.
     * Un platillo puede estar en muchos detalles de órdenes.
     */
    public function orderDetails(): HasMany
    {
        return $this->hasMany(OrderDetail::class);
    }
}
