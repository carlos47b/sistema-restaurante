<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employee extends Model
{
    use HasFactory;

    /**
     * Un Empleado (mesero) TIENE MUCHAS Órdenes
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
