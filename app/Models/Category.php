<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany; // <-- Importante

class Category extends Model
{
    use HasFactory;

    /**
     * Define la relación "hasMany" (uno a muchos) con el modelo Dish.
     */
    public function dishes(): HasMany
    {
        // Esta categoría TIENE MUCHOS platillos (Dishes)
        return $this->hasMany(Dish::class);
    }
}
